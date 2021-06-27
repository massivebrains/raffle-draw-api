<?php

namespace App\Services;

use App\Contracts\Repository\IDrawWinner;
use App\Contracts\Repository\IGameSession;
use App\Contracts\Repository\IPackageOptions;
use App\Contracts\Repository\IPackages;
use App\Contracts\Repository\IPayment;
use App\Contracts\Repository\ISysSettingsRepository;
use App\Contracts\Repository\ITicket;
use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IWallet;
use App\Contracts\Repository\IWalletDebitLog;
use App\Contracts\Services\IBuyTicketService;
use App\Contracts\Services\IEmailService;
use App\DTOs\CreateGameSessionDTO;
use App\DTOs\CreatePaymentDTO;
use App\DTOs\CreateTicketDTO;
use App\DTOs\CreateWalletDebitDTO;
use App\DTOs\DrawTicketDTO;
use App\DTOs\DrawWinnersDTO;
use App\DTOs\ShuffleTicketDTO;
use App\DTOs\UpdateDrawDTO;
use App\MailTemplate\NewTicketTemplate;
use App\MailTemplate\WinningTicketTemplate;
use App\Plugins\PUGXShortId\Shortid;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class BuyTicketService extends BaseService implements IBuyTicketService
{

    private $user;
    private $userRepo;
    private $packageRepo;
    private $packageOptionRepo;
    private $request;
    private $payload;
    private $walletRepo;
    private $walletDebitLogRepo;
    private $gameSessionRepo;
    private $paymentRepo;
    private $ticketRepo;
    private $systemRepo;
    private $drawWinnerRepo;
    private $EmailService;

    public function __construct(
        IUser $userRepo,
        Request $request,
        IPackages $packageRepo,
        IWallet $walletRepo,
        IWalletDebitLog $walletDebitLogRepo,
        IPackageOptions $packageOptionRepo,
        IGameSession $gameSessionRepo,
        IEmailService $EmailService,
        IPayment $paymentRepo,
        ITicket $ticketRepo,
        ISysSettingsRepository $systemRepo,
        IDrawWinner $drawWinnerRepo
    ) {
        $this->userRepo = $userRepo;
        $this->packageRepo = $packageRepo;
        $this->packageOptionRepo = $packageOptionRepo;
        $this->walletRepo = $walletRepo;
        $this->walletDebitLogRepo = $walletDebitLogRepo;
        $this->gameSessionRepo = $gameSessionRepo;
        $this->paymentRepo = $paymentRepo;
        $this->ticketRepo = $ticketRepo;
        $this->systemRepo = $systemRepo;
        $this->drawWinnerRepo = $drawWinnerRepo;
        $this->EmailService = $EmailService;
        $this->request = $request;

        $this->user = $this->request->user('api');
    }


    public function create()
    {
        $this->payload = $this->request->input();
        $this->package_option_id = $this->request->package_option_id;
        $this->user = $this->request->user('api');

        return $this->buyTicket($this->request->package_option_id, $this->user->id);
    }

    public function findSelf()
    {
        $result = $this->ticketRepo->findByUserID($this->user->id);
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }


    public function getDrawIndexes($limit): array
    {
        $drawIndexArr = [];
        for ($i = 1; $i < $limit + 1; $i++) {
            $drawIndexArr[] = $i;
        }
        return  $drawIndexArr;
    }

    public function getDrawnTicketsUUID(Collection $drawnTickets): array
    {
        $drawIndexArr = [];
        foreach ($drawnTickets as $ticket) {
            $drawIndexArr[] = $ticket->uuid;
        }
        return  $drawIndexArr;
    }


    public function messageAllWinners(Collection $drawnResult, $sessionID)
    {
        foreach ($drawnResult as $ticket) {

            //send Mails
            $detail = [
                'name' => $ticket->user->username,
                'email' => $ticket->user->email,
                'ticket' =>  $ticket->ticket_short_code,
                'session_id' => $sessionID
            ];
            $htmlMail = WinningTicketTemplate::getHtml($detail);
            $this->EmailService->sendMail($detail['email'], 'Congratulations! :: Ticket Picked.', $htmlMail);
        }
    }

    public function getWinningTicketsdetailed(Collection $drawnResult): array
    {
        $winningTicketDetailedArr = [];
        foreach ($drawnResult as $ticket) {

            $uuid = str_replace("-", "", Str::uuid());

            $arr = [
                'uuid' => $uuid,
                'ticket_id' => $ticket->id,
                'draw_index' => $ticket->draw_index,
                'session_id' => $ticket->session_id,
                'drawn_by' => $this->user->id,
                'package_id' => $ticket->package_id,
                'owner_id' => $ticket->user_id,
            ];

            $winningTicketDetailedArr[] = $arr;
        }
        return $winningTicketDetailedArr;
    }


    public function drawTicket(DrawTicketDTO $drawInputData)
    {

        $sessionID = $drawInputData->session_id;
        $dbGameSession = $this->gameSessionRepo->find($sessionID);

        if (!$dbGameSession) {
            $response_message = $this->customHttpResponse(400, 'No session with that ID exist.');
            return $response_message;
        }

        if (!$dbGameSession->is_currently_shuffled) {
            $response_message = $this->customHttpResponse(400, 'You have to re-shuffle before another pick.');
            return $response_message;
        }

        DB::beginTransaction();
        try {

            $systemSettings = $this->systemRepo->getSystemSettings();
            $ticketSelectPerDraw = $systemSettings->ticket_select_per_draw;

            //make an array of indexes to select
            $drawIndexArr = $this->getDrawIndexes($ticketSelectPerDraw);
            $drawnResult = $this->ticketRepo->findByDrawIndex($drawIndexArr);

            //make an array of selected tickets uuids to update
            $drawnTicketsUUID = $this->getDrawnTicketsUUID($drawnResult);

            $totalResult = count($drawnTicketsUUID);

            if ($totalResult) {

                $updateDrawInput = UpdateDrawDTO::fromRequest(['user_id' => $this->user->id]);
                $this->ticketRepo->updateTicketDraw($drawnTicketsUUID, $updateDrawInput);

                $this->gameSessionRepo->updateDraw($sessionID, $totalResult);


                $winningTicketDetailedArr = $this->getWinningTicketsdetailed($drawnResult);


                $this->drawWinnerRepo->create($winningTicketDetailedArr);

                $this->messageAllWinners($drawnResult, $sessionID);
            }

            DB::commit();

            $response_message = $this->customHttpResponse(200, 'Tickets drawn successfully.Congrats winner(s)!', $drawnResult);
            return $response_message;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info("Error with db ticket drawing query: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error Drawing Ticket.');
            return $response_message;
        }
    }



    public function shuffleTicket(ShuffleTicketDTO $shuffleInputData)
    {
        $sessionID = $shuffleInputData->session_id;
        $dbGameSession = $this->gameSessionRepo->find($sessionID);

        if (!$dbGameSession) {
            $response_message = $this->customHttpResponse(400, 'No session with that ID exist.');
            return $response_message;
        }

        DB::beginTransaction();
        try {

            $this->ticketRepo->shuffleTicket($sessionID);

            $this->gameSessionRepo->updateShuffle($sessionID);

            DB::commit();

            $response_message = $this->customHttpResponse(200, 'Tickets Shuffled successfully.');
            return $response_message;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info("Error with db ticket shuffling query: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error Shuffling.');
            return $response_message;
        }
    }


    public function generateTicketCode()
    {
        return  Shortid::generate(10, "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZAQ");
    }



    public function buyTicket(string $packageOptionID, int $userID, int $routineID = null)
    {

        /**
         * 1. check wallet balance
         * 2. check and create/get game session
         * 3. debit user (process payment) for the package price.
         * 4. generate ticket
         */

        $packagePricing = $this->packageOptionRepo->find($packageOptionID);

        if (!$packagePricing) {
            $response_message = $this->customHttpResponse(400, 'The package option you choose does not exist');
            return $response_message;
        }

        $sufficientWallet = $this->walletRepo->hasSufficientBalance($userID, $packagePricing->price);
        if (!$sufficientWallet) {
            $response_message = $this->customHttpResponse(400, 'Insufficient balance');
            return $response_message;
        }

        //check and get existing session
        $packageInternalID = $packagePricing->package_id;
        $getActiveSession = $this->gameSessionRepo->getActiveSession($packageInternalID);

        if (!$getActiveSession) {
            //create new session
            $package = $this->packageRepo->findByInternalID($packageInternalID);

            $daysBeforeDraw = $package->period;
            $packageClosingTime = $package->closes_at;

            $data = [
                'package_id' => $packageInternalID,
                'initiated_by' => $userID,
                'period' => $daysBeforeDraw,
                'closes_at' => $packageClosingTime,
                'expected_winners' => $package->expected_winners,

            ];

            $createSessionInput = CreateGameSessionDTO::fromRequest($data);
            $newSession = $this->gameSessionRepo->create($createSessionInput);

            $activeSession = $newSession;
        } else {
            $activeSession = $getActiveSession;
        }

        $activeSessionID = $activeSession->id;

        //3. debit user - this part will be wrapped in a transaction.


        DB::beginTransaction();
        try {

            $walletID = $sufficientWallet->uuid;
            $walletInternalID = $sufficientWallet->id;
            $packagePrice = $packagePricing->price;

            $e = $this->walletRepo->debitWallet($walletID, $packagePrice);


            $ticketData = [
                'user_id' => $userID,
                'wallet_id' => $walletInternalID,
                'amount' => $packagePrice,
                'activity_type_id' => 2, //where 2 = "game play" - references the sys_activity_type db table.
                'session_id' => $activeSessionID,
                'package_option_id' => $packagePricing->getOriginal('id'),
                'package_id' => $packageInternalID,
                'ticket_qty' => $packagePricing->ticket_qty,
                'is_bulk' => $packagePricing->ticket_qty > 1 ? 1 : null,
                'routine_id' => $routineID,
                'is_auto_gen' => !is_null($routineID) ? 1 : null,
            ];



            $createInputData = CreatePaymentDTO::fromRequest($ticketData);
            $paymentData = $this->paymentRepo->create($createInputData);

            $ticketData['payment_id'] = $paymentData->id;
            $createInputData = CreateWalletDebitDTO::fromRequest($ticketData);
            $data = $this->walletDebitLogRepo->create($createInputData);




            //4. Generate Ticket

            $generatedTicketsArr = [];
            for ($i = $packagePricing->ticket_qty; $i > 0; $i--) {

                $code = $this->generateTicketCode();
                $ticketData['ticket_short_code'] = $code;
                $ticketData['payment_id'] = $paymentData->id;

                $createInputData = CreateTicketDTO::fromRequest($ticketData);
                $data = $this->ticketRepo->create($createInputData);

                $generatedTicketsArr['tickets'][] = $code;
            }


            //5. Update sells if existing session
            if ($getActiveSession) {
                $sessionID = $getActiveSession->uuid;
                $this->gameSessionRepo->updateSells($sessionID);
            }

            $this->packageOptionRepo->updateSells($packagePricing->uuid);


            //send Mails
            $detail = [
                'name' => $this->user->username,
                'tickets' =>  $generatedTicketsArr['tickets'],
                'price' => $packagePrice,
                'session_id' => $activeSession->uuid
            ];
            $htmlMail = NewTicketTemplate::getHtml($detail);
            $this->EmailService->sendMail($this->user->email, 'Payment Successful :: Tickets generated.', $htmlMail);

            DB::commit();


            $response_message = $this->customHttpResponse(200, 'Ticket(s) Generated successful. Goodluck!', $generatedTicketsArr);
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }
}

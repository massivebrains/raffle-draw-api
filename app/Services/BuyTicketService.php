<?php

namespace App\Services;

use App\Contracts\Repository\IGameSession;
use App\Contracts\Repository\IPackageOptions;
use App\Contracts\Repository\IPackages;
use App\Contracts\Repository\IPayment;
use App\Contracts\Repository\ITicket;
use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IWallet;
use App\Contracts\Repository\IWalletDebitLog;
use App\Contracts\Services\IBuyTicketService;
use App\DTOs\CreateGameSessionDTO;
use App\DTOs\CreatePackageDTO;
use App\DTOs\CreatePaymentDTO;
use App\DTOs\CreateTicketDTO;
use App\DTOs\CreateWalletDebitDTO;
use App\DTOs\UpdatePackageDTO;
use App\Plugins\PUGXShortId\Shortid;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


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

    public function __construct(
        IUser $userRepo,
        Request $request,
        IPackages $packageRepo,
        IWallet $walletRepo,
        IWalletDebitLog $walletDebitLogRepo,
        IPackageOptions $packageOptionRepo,
        IGameSession $gameSessionRepo,
        IPayment $paymentRepo,
        ITicket $ticketRepo
    ) {
        $this->userRepo = $userRepo;
        $this->packageRepo = $packageRepo;
        $this->packageOptionRepo = $packageOptionRepo;
        $this->walletRepo = $walletRepo;
        $this->walletDebitLogRepo = $walletDebitLogRepo;
        $this->gameSessionRepo = $gameSessionRepo;
        $this->paymentRepo = $paymentRepo;
        $this->ticketRepo = $ticketRepo;
        $this->request = $request;
    }


    public function recordExist($id)
    {
        return $this->packageRepo->find($id);
    }


    public function create()
    {
        $this->payload = $this->request->input();
        $this->package_option_id = $this->request->package_option_id;
        $this->user = $this->request->user('api');

        return $this->processCreate();
    }



    public function find($id)
    {
        $result = $this->packageRepo->find($id);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function generateTicketCode()
    {
        return  Shortid::generate(10, "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZAQ");
    }



    public function processCreate()
    {

        /**
         * 1. check wallet balance
         * 2. check and create/get game session
         * 3. debit user (process payment) for the package price.
         * 4. generate ticket
         */

        $packagePricing = $this->packageOptionRepo->find($this->package_option_id);

        if (!$packagePricing) {
            $response_message = $this->customHttpResponse(400, 'The option you choose does not exist');
            return $response_message;
        }

        $sufficientWallet = $this->walletRepo->hasSufficientBalance($this->user->id, $packagePricing->price);
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
                'initiated_by' => $this->user->id,
                'period' => $daysBeforeDraw,
                'closes_at' => $packageClosingTime

            ];

            $createSessionInput = CreateGameSessionDTO::fromRequest($data);
            $newSession = $this->gameSessionRepo->create($createSessionInput);

            $activeSessionID = $newSession->id;
        } else {
            $activeSessionID = $getActiveSession->id;
        }


        //3. debit user - this part will be wrapped in a transaction.


        DB::beginTransaction();
        try {

            $walletID = $sufficientWallet->uuid;
            $walletInternalID = $sufficientWallet->id;
            $packagePrice = $packagePricing->price;

            $e = $this->walletRepo->debitWallet($walletID, $packagePrice);


            $ticketData = [
                'user_id' => $this->user->id,
                'wallet_id' => $walletInternalID,
                'amount' => $packagePrice,
                'activity_type_id' => 2, //where 2 = "game play" - references the sys_activity_type db table.
                'session_id' => $activeSessionID,
                'package_option_id' => $packagePricing->getOriginal('id'),
                'package_id' => $packageInternalID,
                'ticket_qty' => $packagePricing->ticket_qty,
                'is_bulk' => $packagePricing->ticket_qty > 1 ? 1 : null,
            ];



            $createInputData = CreateWalletDebitDTO::fromRequest($ticketData);
            $data = $this->walletDebitLogRepo->create($createInputData);


            $createInputData = CreatePaymentDTO::fromRequest($ticketData);
            $paymentData = $this->paymentRepo->create($createInputData);

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

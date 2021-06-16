<?php

namespace App\Services;

use App\Contracts\Repository\IUserAccountDetail;
use App\Contracts\Repository\IWallet;
use App\Contracts\Repository\IWalletDebitLog;
use App\Contracts\Repository\IWithdrawalRepository;
use App\Contracts\Services\IWithdrawService;
use App\DTOs\WithdrawDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class WithdrawService extends BaseService implements IWithdrawService
{

    private $user;
    private $request;
    private $walletRepo;
    private $walletDebitLogRepo;
    private $userAccountDetailRepo;
    private $withdrawalRepo;

    public function __construct(
        Request $request,
        IWallet $walletRepo,
        IWalletDebitLog $walletDebitLogRepo,
        IUserAccountDetail $userAccountDetailRepo,
        IWithdrawalRepository $withdrawalRepo
    ) {
        $this->walletRepo = $walletRepo;
        $this->walletDebitLogRepo = $walletDebitLogRepo;
        $this->userAccountDetailRepo = $userAccountDetailRepo;
        $this->withdrawalRepo = $withdrawalRepo;
        $this->request = $request;

        $this->user =  $this->request->user('api');
    }


    public function withdraw()
    {


        /**
         * 1. check supplied user bank account id is valid
         * 2. Debit wallet
         * 3. Create withdraw 
         * 4. Log debit
         * 5. TODO : Try calling 3rd payment payment service for withdrawal.
         *           This is the last step because we want to queue the 
         *           withdrawal request which can be processed by a CRON / schedule 
         *           and when done, the COMPLETED_AT field is set.
         */


        //1. check supplied user bank account  id is valid
        $userAccount = $this->userAccountDetailRepo->find($this->request->user_bank_acc_id);

        $userWallet = $this->walletRepo->findByUserID($this->user->id);

        if (!$userAccount) {
            $response_message = $this->customHttpResponse(400, 'User bank account provided does not exist');
            return $response_message;
        }


        if ($userWallet->amount < $this->request->amount) {
            $response_message = $this->customHttpResponse(400, 'Insufficient balance. You can try reducing the requested amount.');
            return $response_message;
        }


        DB::beginTransaction();
        try {



            $walletID = $userWallet->uuid;
            $walletInternalID = $userWallet->id;


            $withdrawData = [
                'user_id' => $this->user->id,
                'amount' => $this->request->amount,
                'bank_acc_id' => $userAccount->getOriginal('id'),
                'wallet_id' => $walletInternalID,
            ];


            // 2. Debit wallet
            $createWithdrawInput = WithdrawDTO::fromService($withdrawData);
            $e = $this->walletRepo->debitWallet($walletID, $this->request->amount);

            // 3. Create withdraw 
            $withdrawRes = $this->withdrawalRepo->create($createWithdrawInput);

            // 4. Log wallet debit
            $createWithdrawInput->activity_type_id = 11; //where 11 = Fund Wallet (Deposit) activity type.
            $createWithdrawInput->withdrawal_id = $withdrawRes->id;
            $data = $this->walletDebitLogRepo->createWithdraw($createWithdrawInput);


            DB::commit();


            $response_message = $this->customHttpResponse(200, 'Withdrawal successfully');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error (Withdrawal).');
            return $response_message;
        }
    }
}

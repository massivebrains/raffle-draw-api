<?php

namespace App\Services;

use App\Contracts\Repository\IGameSession;
use App\Contracts\Repository\IPackageOptions;
use App\Contracts\Repository\IPackages;
use App\Contracts\Repository\IPayment;
use App\Contracts\Repository\IPaymentProviders;
use App\Contracts\Repository\ITicket;
use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IWallet;
use App\Contracts\Repository\IWalletCreditLog;
use App\Contracts\Repository\IWalletDebitLog;
use App\Contracts\Services\IBuyTicketService;
use App\Contracts\Services\IFundWalletService;
use App\DTOs\CreateGameSessionDTO;
use App\DTOs\CreatePackageDTO;
use App\DTOs\CreatePaymentDTO;
use App\DTOs\CreateTicketDTO;
use App\DTOs\CreateWalletDebitDTO;
use App\DTOs\FundWalletDTO;
use App\DTOs\UpdatePackageDTO;
use App\Plugins\PUGXShortId\Shortid;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class FundWalletService extends BaseService implements IFundWalletService
{

    private $user;
    private $request;
    private $walletRepo;
    private $walletCreditLogRepo;

    public function __construct(
        Request $request,
        IWallet $walletRepo,
        IWalletCreditLog $walletCreditLogRepo,
        IPaymentProviders $paymentProviderRepo
    ) {
        $this->walletRepo = $walletRepo;
        $this->walletCreditLogRepo = $walletCreditLogRepo;
        $this->paymentProviderRepo = $paymentProviderRepo;
        $this->request = $request;

        $this->user =  $this->request->user('api');
    }


    public function fundAccount(FundWalletDTO $tnxData)
    {


        /************************************************************
         * ATTENTION !!!!!
         * VERIFY USER PAYMENT WITH THE 3RD PARTY PAYMENT PROVIDER THAT THE USER PROVIDED 
         * ACTUALLY MADE A PAYMENT BEFORE GIVING VALUE HERE.
         ********************************************************************/

        //  DO THAT HERE

        /************************************************************
         * CLOSE - ATTENTION !!!!!
         * VERIFY USER PAYMENT WITH THE 3RD PARTY PAYMENT PROVIDER THAT THE USER PROVIDED 
         * ACTUALLY MADE A PAYMENT BEFORE GIVING VALUE HERE.
         ********************************************************************/


        /**
         * 1. check supplied payment provider id is valid
         * 2. Credit wallet and Log Credit
         */


        //1. check supplied payment provider id is valid
        $paymentProvider = $this->paymentProviderRepo->find($tnxData->payment_provider_id);

        if (!$paymentProvider) {
            $response_message = $this->customHttpResponse(400, 'The payment provider specified does not exist');
            return $response_message;
        }



        //2. Credit wallet and Log Credit


        DB::beginTransaction();
        try {

            $userWallet = $this->walletRepo->findByUserID($this->user->id);

            $walletID = $userWallet->uuid;
            $walletInternalID = $userWallet->id;

            $e = $this->walletRepo->creditWallet($walletID, $tnxData->amount);

            $tnxData->wallet_id = $walletInternalID;
            $tnxData->payment_provider_id = $paymentProvider->getOriginal('id');
            $data = $this->walletCreditLogRepo->create($tnxData);


            DB::commit();


            $response_message = $this->customHttpResponse(200, 'Account funded successfully');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }
}

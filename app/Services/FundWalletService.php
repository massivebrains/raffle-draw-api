<?php

namespace App\Services;

use App\Contracts\Repository\IPaymentProviders;
use App\Contracts\Repository\IWallet;
use App\Contracts\Repository\IWalletCreditLog;
use App\Contracts\Services\IFundWalletService;
use App\Contracts\Services\ISMSService;
use App\DTOs\FundWalletDTO;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;



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

    public function find($id)
    {
        $result = $this->walletRepo->find($id);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->walletRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }

    public function findSelf()
    {
        $result = $this->walletRepo->findByUserID($this->user->id);
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }


    public function fundAccount(FundWalletDTO $tnxData)
    {


        /************************************************************
         * ATTENTION !!!!!
         * VERIFY USER PAYMENT WITH THE 3RD PARTY PAYMENT PROVIDER THAT THE USER PROVIDED 
         * ACTUALLY MADE A PAYMENT BEFORE GIVING VALUE HERE.
         ********************************************************************/

        try {

            $reqAmount  = $tnxData->amount;
            $reqTxRefID  = $tnxData->payment_reference;
            $reqTxID  = $tnxData->payment_tnx_id;

            $BaseEndPoint = config('services.flutter_verify');
            $fwSecret = config('services.flutter_secret');
            $PageResponse = Curl::to("$BaseEndPoint/$reqTxID/verify")
                ->withHeaders(["Authorization: Bearer $fwSecret"])
                ->returnResponseObject()
                ->asJsonResponse()
                ->get();

            $responseData = $PageResponse->content->data;

            if ($PageResponse->status !== 200) {
                $response_message = $this->customHttpResponse($PageResponse->status, $PageResponse->content->message);
                return $response_message;
            }

            //checking for these four(4) important parameters as suggested in the Flutterwave doc. 
            if (
                $responseData->status !== "successful" ||
                $responseData->tx_ref !== $reqTxRefID ||
                $responseData->currency !== "NGN" ||
                $responseData->amount < $reqAmount
            ) {
                $response_message = $this->customHttpResponse(400, 'Transaction details mismatch.', $PageResponse->content);
                return $response_message;
            }
        } catch (Exception $th) {
            Log::info($th);
            $response_message = $this->customHttpResponse(401, 'Error contacting the provider. Check your network connection.');
            return $response_message;
        }

        /************************************************************
         * CLOSE - ATTENTION !!!!!
         * VERIFY USER PAYMENT WITH THE 3RD PARTY PAYMENT PROVIDER THAT THE USER PROVIDED 
         * ACTUALLY MADE A PAYMENT BEFORE GIVING VALUE HERE.
         ********************************************************************/


        /**
         * 1. check supplied payment provider id is valid
         * 2. check if value has already been given for the provided tnx credentials
         * 3. Credit wallet and Log Credit
         */


        //1. check supplied payment provider id is valid
        $paymentProvider = $this->paymentProviderRepo->find($tnxData->payment_provider_id);

        if (!$paymentProvider) {
            $response_message = $this->customHttpResponse(400, 'The payment provider specified does not exist');
            return $response_message;
        }

        //2. check if value has already been given for the provided tnx credentials
        $valueGiven = $this->walletCreditLogRepo->tnxExist($reqTxID, $reqTxRefID);

        if ($valueGiven) {
            $response_message = $this->customHttpResponse(400, 'The transaction details supplied has been processed already');
            return $response_message;
        }



        //3. Credit wallet and Log Credit


        DB::beginTransaction();
        try {

            $userWallet = $this->walletRepo->findByUserID($this->user->id);

            $walletID = $userWallet->uuid;
            $walletInternalID = $userWallet->id;

            $e = $this->walletRepo->creditWallet($walletID, $tnxData->amount);

            $tnxData->wallet_id = $walletInternalID;
            $tnxData->tnx_id = $tnxData->payment_tnx_id;
            $tnxData->activity_type_id = 12; //where 12 = Fund Wallet (Deposit) activity type.
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

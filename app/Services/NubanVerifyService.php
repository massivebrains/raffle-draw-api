<?php

namespace App\Services;

use App\Contracts\Services\INubanVerifyService;
use App\DTOs\NubanVerifyDTO;
use Exception;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;


class NubanVerifyService extends BaseService implements INubanVerifyService
{

    public function __construct()
    {
    }

    public function verifyByAccountNoAndCode(NubanVerifyDTO $data)
    {
        $accNo = $data->acc_no;
        $bankCode = $data->bank_code;

        try {

            $BaseEndPoint = config('services.nuban_verify');
            Log::info($BaseEndPoint);
            $PageResponse = Curl::to($BaseEndPoint)
                ->withData(array('acc_no' => $accNo, 'bank_code' => $bankCode))
                ->asJsonResponse()
                ->get();

            $response_message = $this->customHttpResponse(200, 'Data retrieved successfully.', $PageResponse);
            return $response_message;
        } catch (Exception $th) {
            Log::info($th);
            $response_message = $this->customHttpResponse(401, 'Error contacting the provider. Check your network connection.');
            return $response_message;
        }
    }
}

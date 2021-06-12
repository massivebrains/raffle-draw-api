<?php


namespace App\Api\V1\Controllers;

use App\Api\V1\Controllers\BaseController;
use App\Contracts\FormRequest\INubanVerifyRequest;
use App\Contracts\Services\INubanVerifyService;
use Illuminate\Http\Request;
use App\DTOs\NubanVerifyDTO;


class NubanVerifyController extends BaseController
{
    public function verify(Request $request, INubanVerifyRequest $verifyRequest, INubanVerifyService $verifyAccountService)
    {

        $validation = $verifyRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details, fill required fields.', $validation->errors());
            return $response_message;
        }


        $verificationData = NubanVerifyDTO::fromRequest($request);
        return $verifyAccountService->verifyByAccountNoAndCode($verificationData);
    }
}

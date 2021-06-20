<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\IVerificationRequest;
use App\Contracts\Services\IVerificationService;
use Illuminate\Http\Request;


class VerificationController extends BaseController
{

    private $request;
    private $verificationService;

    public function __construct(Request $request, IVerificationService $verificationService)
    {
        $this->request = $request;
        $this->verificationService = $verificationService;
    }


    public function resendEmail(Request $request, IVerificationRequest $createRequest)
    {
        $validation = $createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details check required fields.', $validation->errors());
            return $response_message;
        }

        return $this->verificationService->create($request->email);
    }

    public function verifyEmail($code)
    {
        return $this->verificationService->verify($code);
    }
}

<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\IPasswordRecoveryNewPasswordRequest;
use App\Contracts\FormRequest\IPasswordRecoverySendEmailRequest;
use App\Contracts\Services\IPasswordRecoveryService;
use Illuminate\Http\Request;


class PasswordRecoveryController extends BaseController
{

    private $request;
    private $passwordRecoveryService;

    public function __construct(Request $request, IPasswordRecoveryService $passwordRecoveryService)
    {
        $this->request = $request;
        $this->passwordRecoveryService = $passwordRecoveryService;
    }


    public function sendEmail(Request $request, IPasswordRecoverySendEmailRequest $createRequest)
    {
        $validation = $createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details check required fields.', $validation->errors());
            return $response_message;
        }

        return $this->passwordRecoveryService->create($request->email);
    }

    public function verifyCode($code)
    {
        return $this->passwordRecoveryService->verify($code);
    }

    public function setNewPassword(Request $request, $code, IPasswordRecoveryNewPasswordRequest $createRequest)
    {
        $validation = $createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details check required fields.', $validation->errors());
            return $response_message;
        }

        return $this->passwordRecoveryService->changePassword($code, $request->password);
    }
}

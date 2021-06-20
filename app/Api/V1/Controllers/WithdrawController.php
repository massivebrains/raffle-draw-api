<?php


namespace App\Api\V1\Controllers;

use App\Api\V1\Controllers\BaseController;
use App\Contracts\FormRequest\IWithdrawRequest;
use App\Contracts\Services\IWithdrawService;
use Illuminate\Http\Request;


class WithdrawController extends BaseController
{
    public function withdraw(Request $request, IWithdrawRequest $createRequest, IWithdrawService $withdrawService)
    {

        $validation = $createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details, fill required fields.', $validation->errors());
            return $response_message;
        }

        return $withdrawService->withdraw();
    }
}

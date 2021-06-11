<?php


namespace App\Api\V1\Controllers;

use App\Api\V1\Controllers\BaseController;
use App\Contracts\FormRequest\IFundWalletRequest;
use App\Contracts\Services\IFundWalletService;
use App\DTOs\FundWalletDTO;
use Illuminate\Http\Request;


class FundWalletController extends BaseController
{
    public function fund(Request $request, IFundWalletRequest $fundWalletRequest, IFundWalletService $fundWalletService)
    {

        $validation = $fundWalletRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details, fill required fields.', $validation->errors());
            return $response_message;
        }


        $tnxData = FundWalletDTO::fromRequest($request);
        return $fundWalletService->fundAccount($tnxData);
    }
}

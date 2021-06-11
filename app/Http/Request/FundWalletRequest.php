<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IFundWalletRequest;

class FundWalletRequest extends BaseRequest implements IFundWalletRequest
{

    public function rules()
    {
        $rules = [
            'amount' => 'required | int',
            'payment_provider_id' => 'required | string',
            'payment_ref_code' => 'required | string',
        ];

        return $rules;
    }
}

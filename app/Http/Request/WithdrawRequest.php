<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IWithdrawRequest;

class WithdrawRequest extends BaseRequest implements IWithdrawRequest
{

    public function rules()
    {
        $rules = [
            'amount' => 'required | int',
            'user_bank_acc_id' => 'required | string',
        ];

        return $rules;
    }
}

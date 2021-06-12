<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\ICreateUserAccountDetailRequest;

class CreateUserAccountDetailRequest extends BaseRequest implements ICreateUserAccountDetailRequest
{

    public function rules()
    {
        $rules = [
            'user_id' => 'required | string',
            'acc_name' => 'required | string ',
            'acc_no' => 'required | string | max:10',
            'bank_code' => 'required | string | max:3',
        ];

        return $rules;
    }
}

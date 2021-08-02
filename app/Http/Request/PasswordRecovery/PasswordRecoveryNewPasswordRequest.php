<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IPasswordRecoveryNewPasswordRequest;

class PasswordRecoveryNewPasswordRequest extends BaseRequest implements IPasswordRecoveryNewPasswordRequest
{

    public function rules()
    {
        $rules = [
            'password' => 'required | string',
        ];

        return $rules;
    }
}

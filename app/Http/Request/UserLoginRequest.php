<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IUserLoginRequest;

class UserLoginRequest extends BaseRequest implements IUserLoginRequest
{

    public function rules()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        return $rules;
    }
}

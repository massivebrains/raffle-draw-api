<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IUserRegisterRequest;

class UserRegisterRequest extends BaseRequest implements IUserRegisterRequest
{

    public function rules()
    {
        $rules = [
            'username' => 'required',
            'firstname' => 'required',
            'email' => 'required'
        ];

        return $rules;
    }
}

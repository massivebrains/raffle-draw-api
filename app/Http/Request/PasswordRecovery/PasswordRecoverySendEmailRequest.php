<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IPasswordRecoverySendEmailRequest;

class PasswordRecoverySendEmailRequest extends BaseRequest implements IPasswordRecoverySendEmailRequest
{

    public function rules()
    {
        $rules = [
            'email' => 'required | email',
        ];

        return $rules;
    }
}

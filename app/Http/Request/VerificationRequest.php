<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IVerificationRequest;

class VerificationRequest extends BaseRequest implements IVerificationRequest
{

    public function rules()
    {
        $rules = [
            'email' => 'required | email',
        ];

        return $rules;
    }
}

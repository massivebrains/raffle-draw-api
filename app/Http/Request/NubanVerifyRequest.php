<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\INubanVerifyRequest;

class NubanVerifyRequest extends BaseRequest implements INubanVerifyRequest
{

    public function rules()
    {
        $rules = [
            'acc_no' => 'required',
            'bank_code' => 'required',
        ];

        return $rules;
    }
}

<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IUpdateUserRequest;

class UpdateUserRequest extends BaseRequest implements IUpdateUserRequest
{

    public function rules()
    {
        $rules = [
            'phone' => 'sometimes|required',
            'firstname' => 'sometimes|required',
            'email' => 'sometimes|required'
        ];

        return $rules;
    }
}

<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IUpdateUserAccountDetailRequest;

class UpdateUserAccountDetailRequest extends BaseRequest implements IUpdateUserAccountDetailRequest
{

    public function rules()
    {
        $rules = [
            'acc_name' => 'sometimes | required | int',
        ];

        return $rules;
    }
}

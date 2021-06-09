<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\ICreatePrizeRequest;

class CreatePrizeRequest extends BaseRequest implements ICreatePrizeRequest
{

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'value' => 'required',
            'desc' => 'sometimes|required'
        ];

        return $rules;
    }
}

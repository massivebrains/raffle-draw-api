<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\ICreatePackageRequest;

class CreatePackageRequest extends BaseRequest implements ICreatePackageRequest
{

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'prize_id' => 'required',
            'desc' => 'sometimes|required',
            'expected_winners' => 'sometimes|required',
        ];

        return $rules;
    }
}

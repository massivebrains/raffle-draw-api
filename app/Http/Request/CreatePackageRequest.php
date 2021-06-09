<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\ICreatePackageRequest;

class CreatePackageRequest extends BaseRequest implements ICreatePackageRequest
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

<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\ICreatePackageOptionsRequest;

class CreatePackageOptionsRequest extends BaseRequest implements ICreatePackageOptionsRequest
{

    public function rules()
    {
        $rules = [
            'package_id' => 'required | string',
            'price' => 'required | int',
            'ticket_qty' => 'required | int',
        ];

        return $rules;
    }
}

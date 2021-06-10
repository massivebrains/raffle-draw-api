<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IUpdatePackageOptionsRequest;

class UpdatePackageOptionsRequest extends BaseRequest implements IUpdatePackageOptionsRequest
{

    public function rules()
    {
        $rules = [
            'price' => 'sometimes | required | int',
            'ticket_qty' => 'sometimes | required | int',
        ];

        return $rules;
    }
}

<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IBuyTicketRequest;

class BuyTicketRequest extends BaseRequest implements IBuyTicketRequest
{

    public function rules()
    {
        $rules = [
            'package_option_id' => 'required | string',
        ];

        return $rules;
    }
}

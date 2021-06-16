<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IShuffleTicketRequest;

class ShuffleTicketRequest extends BaseRequest implements IShuffleTicketRequest
{

    public function rules()
    {
        $rules = [
            'session_id' => 'required | string | min:10 | max:36',
        ];

        return $rules;
    }
}

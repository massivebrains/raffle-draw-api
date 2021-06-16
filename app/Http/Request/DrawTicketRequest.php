<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IDrawTicketRequest;

class DrawTicketRequest extends BaseRequest implements IDrawTicketRequest
{

    public function rules()
    {
        $rules = [
            'session_id' => 'required | string | min:10 | max:36',
        ];

        return $rules;
    }
}

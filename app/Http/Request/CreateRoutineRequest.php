<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\ICreateRoutineRequest;

class CreateRoutineRequest extends BaseRequest implements ICreateRoutineRequest
{

    public function rules()
    {
        $rules = [
            'package_option_id' => 'required | string',
            'frequency_id' => 'required | string',
        ];

        return $rules;
    }
}

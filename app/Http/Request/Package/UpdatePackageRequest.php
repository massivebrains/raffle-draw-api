<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IUpdatePackageRequest;
use App\Contracts\FormRequest\IUpdateUserRequest;

class UpdatePackageRequest extends BaseRequest implements IUpdatePackageRequest
{

    public function rules()
    {
        $rules = [
            'name' => 'sometimes|required',
            'prize_id' => 'sometimes|required',
            'desc' => 'sometimes|required',
            'expected_winners' => 'sometimes|required',
        ];

        return $rules;
    }
}

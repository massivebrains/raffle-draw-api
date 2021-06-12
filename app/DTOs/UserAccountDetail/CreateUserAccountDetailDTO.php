<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class CreateUserAccountDetailDTO extends BaseDTO
{

    public string $user_id;

    public string $acc_name;

    public string $acc_no;

    public string $bank_code;


    public static function fromRequest(Request $request)
    {
        return new self([
            'user_id' => $request->user_id,
            'acc_name' => $request->acc_name,
            'acc_no' => $request->acc_no,
            'bank_code' => $request->bank_code,

        ]);
    }
}

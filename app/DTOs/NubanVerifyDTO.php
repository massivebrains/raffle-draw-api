<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class NubanVerifyDTO extends BaseDTO
{
    public string $acc_no;
    public string $bank_code;


    public static function fromRequest(Request $request)
    {
        return new self([
            'acc_no' => $request->acc_no,
            'bank_code' => $request->bank_code,
        ]);
    }
}

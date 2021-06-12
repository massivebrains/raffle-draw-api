<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class FundWalletDTO extends BaseDTO
{
    public string $user_id;
    public string $amount;
    public string $payment_provider_id;
    public string $payment_reference;


    public static function fromRequest(Request $request)
    {
        return new self([
            'user_id' => $request->user('api')->id,
            'amount' => $request->amount,
            'payment_provider_id' => $request->payment_provider_id,
            'payment_reference' => $request->payment_ref_code,
        ]);
    }
}

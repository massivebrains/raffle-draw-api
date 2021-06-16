<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class WithdrawDTO extends BaseDTO
{
    public string $user_id;
    public string $amount;
    public string $bank_acc_id;
    public string $wallet_id;


    public static function fromService($data)
    {
        return new self([
            'user_id' => $data['user_id'],
            'amount' => $data['amount'],
            'bank_acc_id' => $data['bank_acc_id'],
            'wallet_id' => $data['wallet_id'],
        ]);
    }
}

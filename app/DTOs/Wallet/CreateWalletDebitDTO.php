<?php

namespace App\DTOs;


class CreateWalletDebitDTO extends BaseDTO
{
    public string $wallet_id;
    public string $user_id;
    public string $amount;
    public string $activity_type_id;
    public string $session_id;
    public string $package_option_id;


    public static function fromRequest(array $params)
    {
        return new self([
            'user_id' => $params['user_id'],
            'wallet_id' => $params['wallet_id'],
            'amount' => $params['amount'],
            'activity_type_id' => $params['activity_type_id'],
            'session_id' => $params['session_id'],
            'package_option_id' => $params['package_option_id'],
        ]);
    }
}

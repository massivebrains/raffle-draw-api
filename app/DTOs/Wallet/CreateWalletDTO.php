<?php

namespace App\DTOs;


class CreateWalletDTO extends BaseDTO
{
    public string $user_id;

    public static function fromRequest(array $params)
    {
        return new self([
            'user_id' => $params['user_id'],
        ]);
    }
}

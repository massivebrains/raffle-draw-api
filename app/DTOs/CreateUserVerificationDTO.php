<?php

namespace App\DTOs;

use Carbon\Carbon;

class CreateUserVerificationDTO extends BaseDTO
{

    public string $user_id;

    public string $comm_channel_id;

    public string $user_activity_type;

    public string $code;

    public string $expires_at;

    public static function fromRequest(array $params)
    {
        return new self([
            'user_id' => $params['user_id'],
            'comm_channel_id' => 1,                                // where 1 =  email
            'user_activity_type' => 1,                               // where 1 = New Registration.
            'code' => $params['code'],
            'expires_at' => self::getExpiry(),

        ]);
    }

    public static function getExpiry()
    {
        return Carbon::now()->addDay();
    }
}

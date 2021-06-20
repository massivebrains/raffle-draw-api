<?php

namespace App\DTOs;

use Carbon\Carbon;

class UpdateUserEmailVerifyDTO extends BaseDTO
{

    public string $verified_email_at;

    public string $verified_email_expire_at;

    public static function fromRequest()
    {
        return new self([
            'verified_email_at' => Carbon::now(),
            'verified_email_expire_at' => self::getExpiry(),
        ]);
    }

    public static function getExpiry()
    {
        return Carbon::now()->addYear();
    }
}

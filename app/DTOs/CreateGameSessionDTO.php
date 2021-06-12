<?php

namespace App\DTOs;

use Carbon\Carbon;

class CreateGameSessionDTO extends BaseDTO
{

    public string $package_id;

    public string $expires_at;

    public string $initiated_by;

    public static function fromRequest(array $params)
    {
        return new self([
            'package_id' => $params['package_id'],
            'expires_at' => self::getExpiry($params),
            'initiated_by' => $params['initiated_by'],

        ]);
    }

    public static function getExpiry($arr)
    {
        $defaultCloseTime = "17:00:00"; //5pm 
        $daysBeforeExpire = $arr['period'];
        $packageClostTime = $arr['closes_at'] ?: $defaultCloseTime; //Elvis operator here :)

        $expiryDate = Carbon::now()->addDays($daysBeforeExpire);

        $dateOnly = $expiryDate->toDateString();

        $actualExpireDateTime = $dateOnly . " " . $packageClostTime;

        $res = Carbon::parse($actualExpireDateTime)->subHour();

        return $res;
    }
}

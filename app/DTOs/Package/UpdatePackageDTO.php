<?php

namespace App\DTOs;

use App\Contracts\DTO\ICreateUserDTO;

class UpdatePackageDTO extends BaseDTO
{

    public ?string $name;

    public ?string $prize_id;

    public ?string $descr;

    public ?string $expected_winners;


    public static function fromRequest(array $params)
    {
        return new self([
            'name' => self::nullable('name', $params),
            'prize_id' => self::nullable('prize_id', $params),
            'descr' => self::nullable('desc', $params),
            'expected_winners' => self::nullable('expected_winners', $params),
        ]);
    }

    public static function nullable($key, $arr)
    {
        return array_key_exists($key, $arr) ? $arr[$key] : null;
    }
}

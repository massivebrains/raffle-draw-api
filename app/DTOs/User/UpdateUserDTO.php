<?php

namespace App\DTOs;

use App\Contracts\DTO\ICreateUserDTO;

class UpdateUserDTO extends BaseDTO implements ICreateUserDTO
{

    public ?string $password;

    public ?string $phone;

    public ?string $surname;

    public ?string $firstname;

    public ?string $email;

    public static function fromRequest(array $params)
    {
        return new self([
            'password' => self::nullable('password', $params),
            'phone' => self::nullable('phone', $params),
            'firstname' => self::nullable('firstname', $params),
            'surname' => self::nullable('surname', $params),
            'email' => self::nullable('email', $params),
        ]);
    }

    public static function nullable($key, $arr)
    {
        return array_key_exists($key, $arr) ? $arr[$key] : null;
    }
}

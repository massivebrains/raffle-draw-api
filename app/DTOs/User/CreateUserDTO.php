<?php

namespace App\DTOs;

use App\Contracts\DTO\ICreateUserDTO;

class CreateUserDTO extends BaseDTO implements ICreateUserDTO
{
    public string $username;

    public string $password;

    public string $phone;

    public string $surname;

    public string $firstname;

    public string $role;

    public string $email;

    public static function fromRequest(array $params)
    {
        return new self([
            'username' => $params['username'],
            'password' => $params['password'],
            'phone' => $params['phone'],
            'role' => $params['role'],
            'firstname' => $params['firstname'],
            'surname' => $params['surname'],
            'email' => $params['email'],
        ]);
    }
}

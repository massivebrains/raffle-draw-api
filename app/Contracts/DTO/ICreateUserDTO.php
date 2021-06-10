<?php

namespace App\Contracts\DTO;


interface ICreateUserDTO
{
    public static function fromRequest(array $params);
}

<?php

namespace App\DTOs;

use App\Contracts\DTO\ICreateUserDTO;

class CreatePackageDTO extends BaseDTO
{

    public string $name;

    public string $value;

    public ?string $descr;

    public static function fromRequest(array $params)
    {
        return new self([
            'name' => $params['name'],
            'value' => $params['value'],
            'descr' => array_key_exists('desc', $params) ? $params['desc'] : null,

        ]);
    }
}

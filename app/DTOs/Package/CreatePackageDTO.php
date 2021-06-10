<?php

namespace App\DTOs;

use App\Contracts\DTO\ICreateUserDTO;

class CreatePackageDTO extends BaseDTO
{

    public string $name;

    public string $slug;

    public string $prize_id;

    public ?string $descr;

    public ?string $expected_winners;

    public static function fromRequest(array $params)
    {
        return new self([
            'name' => $params['name'],
            'slug' => self::nameToSlug($params['name']),
            'prize_id' => $params['prize_id'],
            'descr' => array_key_exists('desc', $params) ? $params['desc'] : null,
            'expected_winners' => array_key_exists('expected_winners', $params) ? $params['expected_winners'] : null,

        ]);
    }

    public static function nameToSlug($name)
    {
        $arr = explode(" ", $name);
        $sanitized = array_map(function ($elem) {
            return strtolower($elem);
        }, $arr);

        return implode('_', $sanitized);
    }
}

<?php

namespace App\DTOs;


class UpdatePackageOptionsDTO extends BaseDTO
{

    public ?string $price;

    public ?string $ticket_qty;


    public static function fromRequest(array $params)
    {
        return new self([
            'price' => self::nullable('price', $params),
            'ticket_qty' => self::nullable('ticket_qty', $params),
        ]);
    }

    public static function nullable($key, $arr)
    {
        return array_key_exists($key, $arr) ? $arr[$key] : null;
    }
}

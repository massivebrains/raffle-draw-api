<?php

namespace App\DTOs;

class CreatePackageOptionsDTO extends BaseDTO
{

    public string $package_id;

    public int $price;

    public int $ticket_qty;

    public static function fromRequest(array $params)
    {
        return new self([
            'package_id' => $params['package_id'],
            'price' => $params['price'],
            'ticket_qty' => $params['ticket_qty'],

        ]);
    }
}

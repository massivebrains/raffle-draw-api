<?php

namespace App\DTOs;

use Carbon\Carbon;

class UpdateDrawDTO extends BaseDTO
{

    public int $drawn_by;

    public string $drawn_at;

    public static function fromRequest($data)
    {
        return new self([
            'drawn_by' => $data['user_id'],
            'drawn_at' => Carbon::now(),
        ]);
    }
}

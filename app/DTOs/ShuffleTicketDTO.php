<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class ShuffleTicketDTO extends BaseDTO
{

    public string $session_id;

    public static function fromRequest(Request $request)
    {
        return new self([
            'session_id' => $request->session_id,
        ]);
    }
}

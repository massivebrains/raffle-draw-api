<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class CreateRoutineDTO extends BaseDTO
{

    public string $package_option_id;

    public string $frequency_id;

    public string $user_id;

    public static function fromRequest(Request $request, $userID)
    {
        return new self([
            'package_option_id' => $request->package_option_id,
            'frequency_id' => $request->frequency_id,
            'user_id' => $userID,
        ]);
    }
}

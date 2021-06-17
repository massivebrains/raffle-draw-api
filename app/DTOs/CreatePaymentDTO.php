<?php

namespace App\DTOs;


class CreatePaymentDTO extends BaseDTO
{
    public string $user_id;
    public string $amount;
    public string $session_id;
    public string $package_option_id;
    public string $ticket_qty;
    public ?string $routine_id;
    public ?string $is_auto_gen;


    public static function fromRequest(array $params)
    {
        return new self([
            'user_id' => $params['user_id'],
            'amount' => $params['amount'],
            'session_id' => $params['session_id'],
            'package_option_id' => $params['package_option_id'],
            'ticket_qty' => $params['ticket_qty'],
            'routine_id' => $params['routine_id'],
            'is_auto_gen' => $params['is_auto_gen'],
        ]);
    }
}

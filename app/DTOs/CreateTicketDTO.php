<?php

namespace App\DTOs;


class CreateTicketDTO extends BaseDTO
{
    public string $user_id;
    public string $amount;
    public string $session_id;
    public string $package_option_id;
    public string $package_id;
    public string $ticket_short_code;
    public ?string $is_bulk;
    public string $payment_id;


    public static function fromRequest(array $params)
    {
        return new self([
            'user_id' => $params['user_id'],
            'amount' => $params['amount'],
            'session_id' => $params['session_id'],
            'package_option_id' => $params['package_option_id'],
            'package_id' => $params['package_id'],
            'ticket_short_code' => $params['ticket_short_code'],
            'is_bulk' => $params['is_bulk'],
            'payment_id' => $params['payment_id'],
        ]);
    }
}

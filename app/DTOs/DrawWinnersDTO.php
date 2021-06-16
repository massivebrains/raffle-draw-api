<?php

namespace App\DTOs;


class DrawWinnersDTO extends BaseDTO
{

    public int $ticket_id;

    public int $draw_index;

    public int $session_id;

    public int $drawn_by;

    public int $package_id;

    public int $owner_id;

    public static function fromRequest(array $data)
    {
        return new self([

            'draw_index' => $data['draw_index'],
            'ticket_id' => $data['ticket_id'],
            'session_id' => $data['session_id'],
            'drawn_by' => $data['drawn_by'],
            'package_id' => $data['package_id'],
            'owner_id' => $data['owner_id'],
        ]);
    }
}

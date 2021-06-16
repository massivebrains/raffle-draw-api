<?php

namespace App\Contracts\Services;

use App\DTOs\DrawTicketDTO;
use App\DTOs\ShuffleTicketDTO;

interface IBuyTicketService
{
    public function create();
    public function shuffleTicket(ShuffleTicketDTO $shuffleInputData);
    public function drawTicket(DrawTicketDTO $drawInputData);
}

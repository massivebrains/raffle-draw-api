<?php

namespace App\Contracts\Services;

use App\DTOs\DrawTicketDTO;
use App\DTOs\ShuffleTicketDTO;

interface IBuyTicketService
{
    public function create();
    public function shuffleTicket(ShuffleTicketDTO $shuffleInputData);
    public function drawTicket(DrawTicketDTO $drawInputData);
    public function buyTicket(string $packageOptionID, int $userID, int $routineID);
    public function findSelf();
    public function findBySession(string $sessionID);
}

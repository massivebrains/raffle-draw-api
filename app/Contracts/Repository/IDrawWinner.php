<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\DrawWinnersDTO;

interface IDrawWinner extends IRepository
{
    public function create(array $details);
    public function findBySession(int $sessionID);
}

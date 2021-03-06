<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\DrawWinnersDTO;

interface IDrawWinner extends IRepository
{
    public function create(array $details);
    public function findBySession(int $sessionID);
    public function findAllDetailed();
    public function findAllSelf(int $userID);
    public function getStat();
}

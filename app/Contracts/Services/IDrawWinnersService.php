<?php

namespace App\Contracts\Services;

interface IDrawWinnersService
{
    public function findBySession(string $sessionID);
    public function findAll();
    public function findAllSelf();
}

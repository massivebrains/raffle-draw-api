<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;

interface IBanks extends IRepository
{
    public function findByCode(string $code);
}

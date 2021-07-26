<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;

interface ISysStats extends IRepository
{
    public function getSystemStats();
}

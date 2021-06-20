<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;

interface ISysSettingsRepository extends IRepository
{
    public function getSystemSettings();
}

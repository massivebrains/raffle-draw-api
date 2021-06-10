<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Banks;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IBanks;

class BanksEloquentRepository extends  EloquentRepository implements IBanks
{

    public function model()
    {
        return Banks::class;
    }
}

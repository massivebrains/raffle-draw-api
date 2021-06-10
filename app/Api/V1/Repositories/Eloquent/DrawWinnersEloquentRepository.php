<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\DrawWinners;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IDrawWinner;

class DrawWinnersEloquentRepository extends  EloquentRepository implements IDrawWinner
{

    public function model()
    {
        return DrawWinners::class;
    }
}

<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\DrawWinners;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IDrawWinner;
use App\DTOs\DrawWinnersDTO;

class DrawWinnersEloquentRepository extends  EloquentRepository implements IDrawWinner
{

    private $drawModel;

    public function __construct(DrawWinners $drawModel)
    {
        parent::__construct();
        $this->drawModel = $drawModel;
    }


    public function model()
    {
        return DrawWinners::class;
    }


    public function create($details)
    {

        $res = $this->drawModel->insert($details);

        return $res;
    }

    public function findBySession(int $sessionID)
    {
        $res = $this->drawModel
            ->where('session_id', $sessionID)
            ->get();
        return $res;
    }

}

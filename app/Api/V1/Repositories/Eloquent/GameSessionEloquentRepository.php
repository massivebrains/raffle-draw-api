<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\GameSession;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IGameSession;
use App\DTOs\CreateGameSessionDTO;
use Illuminate\Support\Facades\DB;

class GameSessionEloquentRepository extends  EloquentRepository implements IGameSession
{

    private $sessionModel;

    public function __construct(GameSession $sessionModel)
    {
        parent::__construct();
        $this->sessionModel = $sessionModel;
    }


    public function model()
    {
        return GameSession::class;
    }

    public function create(CreateGameSessionDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->sessionModel->create($details);

        return $res;
    }

    public function getActiveSession($packageID)
    {
        $res = $this->sessionModel->select('id', 'uuid')
            ->where('package_id', $packageID)
            ->where(DB::raw('TIMESTAMPDIFF(SECOND,CURRENT_TIMESTAMP,expires_at)'), '>', '0') //has not expired.
            ->first();
        return $res;
    }
}

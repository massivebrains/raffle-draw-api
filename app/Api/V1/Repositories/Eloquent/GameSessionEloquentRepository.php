<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\GameSession;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IGameSession;
use App\DTOs\CreateGameSessionDTO;
use Carbon\Carbon;
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


    public function findAllActive()
    {
        $res = $this->sessionModel
            ->where(DB::raw('TIMESTAMPDIFF(SECOND,CURRENT_TIMESTAMP,expires_at)'), '>', '0') //has not expired.
            ->first();
        return $res;
    }

    public function winnerCompleted($sessionID)
    {
        return $this->sessionModel->select('uuid')
            ->where('uuid', $sessionID)
            ->whereRaw('selected_winners >= expected_winners')
            ->first();
    }



    public function updateShuffle($sessionID)
    {
        return $this->sessionModel->where('uuid', $sessionID)
            ->update([
                'is_currently_shuffled' => 1,
                'shuffle_count' => DB::raw("shuffle_count + 1"),
                'last_shuffled_at' => Carbon::now(),
            ]);
    }

    public function updateSells($sessionID)
    {
        return $this->sessionModel->where('uuid', $sessionID)
            ->update([
                'package_sell_count' => DB::raw("package_sell_count + 1"),
                'last_sell_at' => Carbon::now(),
            ]);
    }

    public function updateDraw($sessionID, $selectedCount)
    {
        return $this->sessionModel->where('uuid', $sessionID)
            ->update([
                'selected_winners' => DB::raw("selected_winners + {$selectedCount}"),
                'last_drawn_at' => Carbon::now(),
                'is_currently_shuffled' => null,
            ]);
    }
}

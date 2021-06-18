<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\RoutineModel;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IRoutine;
use Carbon\Carbon;

class RoutineEloquentRepository extends  EloquentRepository implements IRoutine
{

    public $routineModel;
    public function __construct(RoutineModel $routineModel)
    {
        parent::__construct();
        $this->routineModel =  $routineModel;
    }

    public function model()
    {
        return RoutineModel::class;
    }

    public function create($details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->routineModel->create($details);

        return $res;
    }

    public function findOneByUserID(int $userID, string $routineID)
    {
        $res = $this->routineModel
            ->where('user_id', $userID)
            ->where('uuid', $routineID)
            ->first();
        return $res;
    }


    public function findAllByUserID(int $userID)
    {
        $res = $this->routineModel
            ->where('user_id', $userID)
            ->get();
        return $res;
    }


    public function disable($id)
    {
        return $this->routineModel->where('uuid', $id)
            ->update([
                'disabled_at' => Carbon::now(),
            ]);
    }
}

<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\RoutineFrequencyModel;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IRoutineFrequencyRepo;

class RoutineFrequencyEloquentRepository extends  EloquentRepository implements IRoutineFrequencyRepo
{

    private $routineFreqModel;

    public function __construct(RoutineFrequencyModel $routineFreqModel)
    {
        parent::__construct();
        $this->routineFreqModel = $routineFreqModel;
    }


    public function model()
    {
        return RoutineFrequencyModel::class;
    }
}

<?php

namespace App\Services;

use App\Contracts\Repository\IRoutineFrequencyRepo;
use App\Contracts\Services\IRoutineFrequencyService;


class RoutineFrequencyService extends BaseService implements IRoutineFrequencyService
{

    private $routineFreqRepo;

    public function __construct(IRoutineFrequencyRepo $routineFreqRepo)
    {
        $this->routineFreqRepo = $routineFreqRepo;
    }


    public function findAll()
    {
        $result = $this->routineFreqRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

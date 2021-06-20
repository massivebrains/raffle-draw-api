<?php


namespace App\Api\V1\Controllers;

use App\Api\V1\Controllers\BaseController;
use App\Contracts\Services\IGameSessionService;
use App\Contracts\Services\IRoutineFrequencyService;
use Illuminate\Http\Request;

class RoutineFrequencyController extends BaseController
{

    private $routineFreqService;

    public function __construct(IRoutineFrequencyService $routineFreqService)
    {
        $this->routineFreqService = $routineFreqService;
    }


    public function findAll()
    {
        return $this->routineFreqService->findAll();
    }
}

<?php


namespace App\Api\V1\Controllers;

use App\Api\V1\Controllers\BaseController;
use App\Contracts\Services\IGameSessionService;


class GameSessionController extends BaseController
{

    private $gameSessionService;

    public function __construct(IGameSessionService $gameSessionService)
    {
        $this->gameSessionService = $gameSessionService;
    }


    public function find($id)
    {
        return $this->gameSessionService->find($id);
    }


    public function findAllActive()
    {
        return $this->gameSessionService->findAllActive();
    }


    public function findAll()
    {
        return $this->gameSessionService->findAll();
    }
}

<?php

namespace App\Services;

use App\Contracts\Repository\IGameSession;
use App\Contracts\Services\IGameSessionService;
use Illuminate\Http\Request;


class GameSessionService extends BaseService implements IGameSessionService
{

    private $user;
    private $request;
    private $gameSessionRepo;

    public function __construct(
        Request $request,
        IGameSession $gameSessionRepo
    ) {
        $this->gameSessionRepo = $gameSessionRepo;
        $this->request = $request;

        $this->user =  $this->request->user('api');
    }

    public function find($sessionID)
    {
        $result = $this->gameSessionRepo->find($sessionID);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->gameSessionRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }

    public function findAllActive()
    {
        $result = $this->gameSessionRepo->findAllActive();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

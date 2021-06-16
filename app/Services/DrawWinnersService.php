<?php

namespace App\Services;

use App\Contracts\Repository\IDrawWinner;
use App\Contracts\Repository\IGameSession;
use App\Contracts\Services\IDrawWinnersService;
use Illuminate\Http\Request;


class DrawWinnersService extends BaseService implements IDrawWinnersService
{

    private $user;
    private $request;
    private $drawWinnersRepo;
    private $gameSessionRepo;

    public function __construct(
        Request $request,
        IDrawWinner $drawWinnersRepo,
        IGameSession $gameSessionRepo
    ) {
        $this->drawWinnersRepo = $drawWinnersRepo;
        $this->gameSessionRepo = $gameSessionRepo;
        $this->request = $request;

        $this->user =  $this->request->user('api');
    }

    public function findBySession(string $sessionID)
    {
        $session = $this->gameSessionRepo->find($sessionID);
        if (!$session) {
            $response_message = $this->customHttpResponse(400, 'Session with the id provided does not exist.');
            return $response_message;
        }

        $sessionID = $session->getOriginal('id');

        $result = $this->drawWinnersRepo->findBySession($sessionID);
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->drawWinnersRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

<?php

namespace App\Services;

use App\Contracts\Repository\IDrawWinner;
use App\Contracts\Repository\IGameSession;
use App\Contracts\Services\IDrawWinnersService;
use App\Utils\Config;
use Illuminate\Http\Request;


class DrawWinnersService extends BaseService implements IDrawWinnersService
{

    private $user;
    private $request;
    private $drawWinnersRepo;
    private $gameSessionRepo;
    private $config;

    public function __construct(
        Request $request,
        IDrawWinner $drawWinnersRepo,
        IGameSession $gameSessionRepo,
        Config $config
    ) {
        $this->drawWinnersRepo = $drawWinnersRepo;
        $this->gameSessionRepo = $gameSessionRepo;
        $this->request = $request;
        $this->config = $config;

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

        $mappedResult = [];

        foreach ($result as $item) {

            $item->icon = $this->config->generateIconFullPath($item);
            $mappedResult[] = $item;
        }
        $response_message = $this->customHttpResponse(200, 'Success.', $mappedResult);
        return $response_message;
    }

    public function findAllSelf()
    {
        $result = $this->drawWinnersRepo->findAllSelf($this->user->id);

        $mappedResult = [];

        foreach ($result as $item) {

            $item->icon = $this->config->generateIconFullPath($item);
            $mappedResult[] = $item;
        }

        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }


    public function findAll()
    {
        $result = $this->drawWinnersRepo->findAllDetailed();

        $mappedResult = [];

        foreach ($result as $item) {

            $item->icon = $this->config->generateIconFullPath($item);
            $mappedResult[] = $item;
        }

        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

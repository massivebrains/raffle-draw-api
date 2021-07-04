<?php

namespace App\Services;

use App\Contracts\Repository\IGameSession;
use App\Contracts\Repository\IPackages;
use App\Contracts\Services\IGameSessionService;
use Illuminate\Http\Request;


class GameSessionService extends BaseService implements IGameSessionService
{

    private $user;
    private $request;
    private $gameSessionRepo;
    private $packageRepo;

    public function __construct(
        Request $request,
        IGameSession $gameSessionRepo,
        IPackages $packageRepo
    ) {
        $this->gameSessionRepo = $gameSessionRepo;
        $this->packageRepo = $packageRepo;
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

    public function findOneLatestByPackage($package_id)
    {
        $packageDB = $this->packageRepo->find($package_id);
        if (!$packageDB) {
            $response_message = $this->customHttpResponse(400, 'Package id does not exist');
            return $response_message;
        }

        $packageInternalID = $packageDB->getOriginal('id');
        $result = $this->gameSessionRepo->findOneLatestByPackage($packageInternalID);

        if (!$result) {
            $response_message = $this->customHttpResponse(400, 'No undrawn game session is pending for the selected package. Game in progress or already drawn.');
            return $response_message;
        }
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

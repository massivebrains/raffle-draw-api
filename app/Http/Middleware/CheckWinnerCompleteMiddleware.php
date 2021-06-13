<?php

namespace App\Http\Middleware;

use App\Contracts\FormRequest\IShuffleTicketRequest;
use App\Contracts\Repository\IGameSession;
use Closure;
use App\Http\Middleware\BaseMiddleware;

class CheckWinnerCompleteMiddleware extends BaseMiddleware
{
    private $gameSessionRepo;
    private $createRequest;

    public function __construct(IGameSession $gameSessionRepo, IShuffleTicketRequest $createRequest)
    {
        $this->gameSessionRepo = $gameSessionRepo;
        $this->createRequest = $createRequest;
    }

    public function handle($request, Closure $next)
    {

        $validation = $this->createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        $sessionID = $request->session_id;

        $winnerCompleted = $this->gameSessionRepo->winnerCompleted($sessionID);
        if ($winnerCompleted) {
            $response_message = $this->customHttpResponse(400, 'Action denied. Maximum no of winner(s) for this raffle session has been reached.');
            return $response_message;
        }


        return $next($request);
    }
}

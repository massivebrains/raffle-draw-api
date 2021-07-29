<?php

namespace App\Services;

use App\Contracts\Repository\IDrawWinner;
use App\Contracts\Repository\IPayment;
use App\Contracts\Repository\ISysStats;
use App\Contracts\Repository\ITicket;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\ISysStatsService;

class SysStatsService extends BaseService implements ISysStatsService
{

    private $userRepo;
    private $ticketRepo;
    private $drawWinnerRepo;
    private $paymentRepo;

    public function __construct(IUser $userRepo, ITicket $ticketRepo, IDrawWinner $drawWinnerRepo, IPayment $paymentRepo)
    {
        $this->userRepo = $userRepo;
        $this->ticketRepo = $ticketRepo;
        $this->drawWinnerRepo = $drawWinnerRepo;
        $this->paymentRepo = $paymentRepo;
    }


    public function findAll()
    {
        $userStat = $this->userRepo->getStat();
        $ticketStat = $this->ticketRepo->getStat();
        $winnerStat = $this->drawWinnerRepo->getStat();
        $paymentStat = $this->paymentRepo->getStat();
        $result = [
            'user_stat' => $userStat,
            'ticket_stat' => $ticketStat,
            'winner_stat' => $winnerStat,
            'sales_stat' => $paymentStat
        ];
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

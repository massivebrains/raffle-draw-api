<?php

namespace App\Services;

use App\Contracts\Repository\ISysStats;
use App\Contracts\Services\ISysStatsService;

class SysStatsService extends BaseService implements ISysStatsService
{

    private $sysStatsRepo;

    public function __construct(ISysStats $sysStatsRepo)
    {
        $this->sysStatsRepo = $sysStatsRepo;
    }


    public function findAll()
    {
        $result = $this->sysStatsRepo->getSystemStats();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

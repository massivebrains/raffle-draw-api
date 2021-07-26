<?php


namespace App\Api\V1\Controllers;

use App\Contracts\Services\ISysStatsService;

class SysStatsController extends BaseController
{

    private $sysStatsService;

    public function __construct(ISysStatsService $sysStatsService)
    {
        $this->sysStatsService = $sysStatsService;
    }


    public function findAll()
    {
        return $this->sysStatsService->findAll();
    }
}

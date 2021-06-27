<?php


namespace App\Api\V1\Controllers;

use App\Contracts\Services\ISysSettingsService;

class SysSettingsController extends BaseController
{

    private $sysSettingsService;

    public function __construct(ISysSettingsService $sysSettingsService)
    {
        $this->sysSettingsService = $sysSettingsService;
    }


    public function findAll()
    {
        return $this->sysSettingsService->findAll();
    }
}

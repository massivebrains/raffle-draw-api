<?php

namespace App\Services;

use App\Contracts\Repository\ISysSettingsRepository;
use App\Contracts\Services\ISysSettingsService;

class SysSettingsService extends BaseService implements ISysSettingsService
{

    private $sysSettingsRepo;

    public function __construct(ISysSettingsRepository $sysSettingsRepo)
    {
        $this->sysSettingsRepo = $sysSettingsRepo;
    }


    public function findAll()
    {
        $result = $this->sysSettingsRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\SysSettings;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\ISysSettingsRepository;

class SysSettingsEloquentRepository extends  EloquentRepository implements ISysSettingsRepository
{


    public $systemModel;
    public function __construct(SysSettings $systemModel)
    {
        parent::__construct();
        $this->systemModel =  $systemModel;
    }

    public function model()
    {
        return SysSettings::class;
    }

    public function getSystemSettings()
    {
        return $this->systemModel->first();
    }
}

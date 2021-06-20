<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Cron;
use App\Api\V1\Repositories\EloquentRepository;

class CronRepository extends  EloquentRepository
{

    private $cronModel;

    public function __construct(Cron $cronModel)
    {
        parent::__construct();
        $this->cronModel = $cronModel;
    }


    public function model()
    {
        return Cron::class;
    }

    public function findOne()
    {
        return $this->cronModel->orderBy('id', 'desc')->first();
    }


    public function create()
    {
        return $this->cronModel->create();
    }
}

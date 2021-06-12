<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Banks;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IBanks;

class BanksEloquentRepository extends  EloquentRepository implements IBanks
{

    private $banksModel;

    public function __construct(Banks $banksModel)
    {
        // parent::__construct();
        $this->banksModel = $banksModel;
    }


    public function model()
    {
        return Banks::class;
    }

    public function findByCode(string $code)
    {
        return $this->banksModel->where('code', $code)->first();
    }
}

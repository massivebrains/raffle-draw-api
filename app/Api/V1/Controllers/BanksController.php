<?php


namespace App\Api\V1\Controllers;

use App\Contracts\Services\IBanksService;


class BanksController extends BaseController
{

    private $bankService;

    public function __construct(IBanksService $bankService)
    {
        $this->bankService = $bankService;
    }

    public function find($id)
    {
        return $this->bankService->find($id);
    }


    public function findAll()
    {
        return $this->bankService->findAll();
    }
}

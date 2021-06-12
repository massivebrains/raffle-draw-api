<?php

namespace App\Services;

use App\Contracts\Repository\IBanks;
use App\Contracts\Repository\IPaymentProviders;
use App\Contracts\Services\IBanksService;


class BanksService extends BaseService implements IBanksService
{

    private $banksRepo;

    public function __construct(IBanks $banksRepo)
    {
        $this->banksRepo = $banksRepo;
    }



    public function find($id)
    {
        $result = $this->banksRepo->find($id);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->banksRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

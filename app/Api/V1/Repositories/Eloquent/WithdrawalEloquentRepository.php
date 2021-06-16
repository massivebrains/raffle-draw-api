<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Withdrawal;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IWithdrawalRepository;
use App\DTOs\WithdrawDTO;

class WithdrawalEloquentRepository extends  EloquentRepository implements IWithdrawalRepository
{

    private $withdrawalModel;

    public function __construct(Withdrawal $withdrawalModel)
    {
        parent::__construct();
        $this->withdrawalModel = $withdrawalModel;
    }

    public function model()
    {
        return Withdrawal::class;
    }

    public function create(WithdrawDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->withdrawalModel->create($details);

        return $res;
    }
}

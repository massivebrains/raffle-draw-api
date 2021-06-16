<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\WalletDebitLog;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IWalletDebitLog;
use App\DTOs\CreateWalletDebitDTO;
use App\DTOs\WithdrawDTO;

class WalletDebitLogEloquentRepository extends  EloquentRepository implements IWalletDebitLog
{

    public $debitLogModel;
    public function __construct(WalletDebitLog $debitLogModel)
    {
        parent::__construct();
        $this->debitLogModel =  $debitLogModel;
    }

    public function model()
    {
        return WalletDebitLog::class;
    }


    public function create(CreateWalletDebitDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->debitLogModel->create($details);

        return $res;
    }


    public function createWithdraw(WithdrawDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->debitLogModel->create($details);

        return $res;
    }
}

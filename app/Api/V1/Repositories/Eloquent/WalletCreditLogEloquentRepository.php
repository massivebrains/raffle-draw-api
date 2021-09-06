<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\WalletCreditLog;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IWalletCreditLog;
use App\DTOs\FundWalletDTO;

class WalletCreditLogEloquentRepository extends  EloquentRepository implements IWalletCreditLog
{

    public $walletCreditLog;
    public function __construct(WalletCreditLog $walletCreditLog)
    {
        parent::__construct();
        $this->walletCreditLog =  $walletCreditLog;
    }

    public function model()
    {
        return WalletCreditLog::class;
    }

    public function create(FundWalletDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->walletCreditLog->create($details);

        return $res;
    }

    public function tnxExist($tnxID, $tnxRef)
    {
        $res = $this->walletCreditLog
            ->where('payment_reference', $tnxRef)
            ->where('tnx_id', $tnxID)
            ->first();
        return $res;
    }
}

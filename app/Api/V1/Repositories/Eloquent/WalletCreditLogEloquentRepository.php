<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\WalletCreditLog;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IWalletCreditLog;

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

    public function create($detail)
    {
        $newEntity = new WalletCreditLog();
        $newEntity->uuid = $detail['uuid'];
        $newEntity->wallet_id = $detail['wallet_id'];
        $newEntity->user_id = $detail['user_id'];
        $newEntity->amount = $detail['amount'];
        $newEntity->cashflow_channel_id = $detail['cashflow_channel_id'];
        $detail['order_id'] !== null ? $newEntity->order_id = $detail['order_id'] : null; //optional field
        $detail['escrow_id'] !== null ? $newEntity->escrow_id = $detail['escrow_id'] : null; //optional field
        $detail['wallet_address'] !== null ? $newEntity->wallet_address = $detail['wallet_address'] : null; //optional field
        $detail['network_type_id'] !== null ? $newEntity->network_type = $detail['network_type_id'] : null; //optional field
        $detail['txn_id'] !== null ? $newEntity->txn_id = $detail['txn_id'] : null; //optional field
        $newEntity->save();

        return $newEntity->id;
    }
}

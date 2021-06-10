<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Wallet;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IWallet;
use App\DTOs\CreateWalletDTO;
use Illuminate\Support\Facades\DB;

class WalletEloquentRepository extends  EloquentRepository implements IWallet
{

    public $walletModel;
    public function __construct(Wallet $walletModel)
    {
        parent::__construct();
        $this->walletModel =  $walletModel;
    }

    public function model()
    {
        return Wallet::class;
    }


    public function getWalletInfo($userID, $assetID)
    {
        $res = DB::table('wallet_p2p as a')
            ->select(
                'a.id',
                'a.uuid',
                'a.user_id as owner',
                'a.amount',
            )
            ->where("a.user_id", '=', $userID)
            ->where("a.asset_id", '=', $assetID)
            ->lockForUpdate()
            ->first();

        return $res;
    }


    public function hasSufficientBalance($userID, $amount)
    {
        $res = $this->walletModel->select(
            'id',
            'uuid',
            'user_id as owner',
            'amount',
        )
            ->where("user_id", '=', $userID)
            ->where("amount", '>=', $amount)
            ->lockForUpdate()
            ->first();

        return $res;
    }



    public function create(CreateWalletDTO $attributes)
    {
        $newEntity = new Wallet();
        $newEntity->uuid = $attributes->uuid;
        $newEntity->user_id = $attributes->user_id;
        $newEntity->save();

        return $newEntity->id;
    }



    public function debitWallet($walletUUID, $amount)
    {
        return Wallet::where('uuid', $walletUUID)
            ->update([
                'amount' => DB::raw("amount - {$amount}"),
                'last_amount_debited' => "{$amount}",
            ]);
    }

    public function creditWallet($walletUUID, $amount)
    {
        return Wallet::where('uuid', $walletUUID)
            ->update([
                'amount' => DB::raw("amount + {$amount}"),
                'last_amount_credited' => "{$amount}",
            ]);
    }


    /** {@inheritdoc}*/
    public function Update(string $id, array $attributes)
    {
    }
}

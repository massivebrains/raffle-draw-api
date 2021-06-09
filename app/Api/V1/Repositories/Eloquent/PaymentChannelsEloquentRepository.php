<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\PaymentChannels;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IPaymentChannels;

class PaymentChannelsEloquentRepository extends  EloquentRepository implements IPaymentChannels
{

    private $PM;

    public function __construct(PaymentChannels $PM)
    {
        parent::__construct();
        $this->PM = $PM;
    }


    public function model()
    {
        return PaymentChannels::class;
    }

    public function slugToID($slug)
    {
        $res = $this->PM->select('id')
            ->where('slug', '=', $slug)
            ->first();
        return $res;
    }
}

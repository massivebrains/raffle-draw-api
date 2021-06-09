<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Payment;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IPayment;

class PaymentEloquentRepository extends  EloquentRepository implements IPayment
{

    public $adsPTL;
    public function __construct(Payment $adsPTL)
    {
        parent::__construct();
        $this->adsPTL =  $adsPTL;
    }


    public function model()
    {
        return Payment::class;
    }

    public function slugToID($slug)
    {
        $res = $this->adsPTL->select('id')
            ->where('slug', '=', $slug)
            ->first();
        return $res;
    }
}

<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\PaymentProviders;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IPaymentProviders;

class PaymentProvidersEloquentRepository extends  EloquentRepository implements IPaymentProviders
{

    private $PP;

    public function __construct(PaymentProviders $PP)
    {
        parent::__construct();
        $this->PP = $PP;
    }


    public function model()
    {
        return PaymentProviders::class;
    }
}

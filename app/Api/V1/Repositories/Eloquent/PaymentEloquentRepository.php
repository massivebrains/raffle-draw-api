<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Payment;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IPayment;
use App\DTOs\CreatePaymentDTO;

class PaymentEloquentRepository extends  EloquentRepository implements IPayment
{

    public $paymentModel;
    public function __construct(Payment $paymentModel)
    {
        parent::__construct();
        $this->paymentModel =  $paymentModel;
    }


    public function model()
    {
        return Payment::class;
    }

    public function create(CreatePaymentDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->paymentModel->create($details);

        return $res;
    }
}

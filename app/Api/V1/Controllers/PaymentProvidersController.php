<?php


namespace App\Api\V1\Controllers;

use App\Contracts\Services\IPaymentProvidersService;

class PaymentProvidersController extends BaseController
{

    private $paymentProviderService;

    public function __construct(IPaymentProvidersService $paymentProviderService)
    {
        $this->paymentProviderService = $paymentProviderService;
    }

    public function find($id)
    {
        return $this->paymentProviderService->find($id);
    }


    public function findAll()
    {
        return $this->paymentProviderService->findAll();
    }
}

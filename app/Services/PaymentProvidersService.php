<?php

namespace App\Services;

use App\Contracts\Repository\IPaymentProviders;
use App\Contracts\Services\IPaymentProvidersService;


class PaymentProvidersService extends BaseService implements IPaymentProvidersService
{

    private $paymentProviderRepo;

    public function __construct(IPaymentProviders $paymentProviderRepo)
    {
        $this->paymentProviderRepo = $paymentProviderRepo;
    }



    public function find($id)
    {
        $result = $this->paymentProviderRepo->find($id);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->paymentProviderRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }
}

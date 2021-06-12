<?php

namespace App\Contracts\Services;

interface IPaymentProvidersService
{
    public function find(string $id);
    public function findAll();
}

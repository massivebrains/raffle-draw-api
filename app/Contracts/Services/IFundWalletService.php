<?php

namespace App\Contracts\Services;

use App\DTOs\FundWalletDTO;

interface IFundWalletService
{
    public function fundAccount(FundWalletDTO $data);
    public function find(string $id);
    public function findAll();
    public function findSelf();
}

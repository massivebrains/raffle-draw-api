<?php

namespace App\Contracts\Services;

use App\DTOs\FundWalletDTO;
use App\DTOs\NubanVerifyDTO;

interface IFundWalletService
{
    public function fundAccount(FundWalletDTO $data);
}

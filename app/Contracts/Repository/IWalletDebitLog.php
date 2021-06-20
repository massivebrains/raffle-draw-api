<?php

namespace App\Contracts\Repository;

use App\DTOs\CreateWalletDebitDTO;
use App\DTOs\WithdrawDTO;

interface IWalletDebitLog
{
    /**
     * Creates a user.
     * @param CreateWalletDebitDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateWalletDebitDTO $attributes);
    public function createWithdraw(WithdrawDTO $attributes);
}

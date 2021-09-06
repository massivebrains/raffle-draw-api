<?php

namespace App\Contracts\Repository;

use App\DTOs\FundWalletDTO;

interface IWalletCreditLog
{
    /**
     * Creates a user.
     * @param FundWalletDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(FundWalletDTO $attributes);
    public function tnxExist(string $tnxID, string $tnxRef);
}

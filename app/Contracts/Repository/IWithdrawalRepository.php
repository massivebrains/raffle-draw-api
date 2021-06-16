<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\WithdrawDTO;

interface IWithdrawalRepository extends IRepository
{
    /**
     * Creates .
     * @param WithdrawDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(WithdrawDTO $attributes);
}

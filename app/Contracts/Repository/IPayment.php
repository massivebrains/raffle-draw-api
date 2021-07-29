<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreatePaymentDTO;

interface IPayment extends IRepository
{
    /**
     * Creates a user.
     * @param CreatePaymentDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreatePaymentDTO $attributes);
    public function getStat();
}

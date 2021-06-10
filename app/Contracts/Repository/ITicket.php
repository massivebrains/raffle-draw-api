<?php

namespace App\Contracts\Repository;

use App\DTOs\CreateTicketDTO;

interface ITicket
{
    /**
     * Creates a user.
     * @param CreateTicketDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateTicketDTO $attributes);
}

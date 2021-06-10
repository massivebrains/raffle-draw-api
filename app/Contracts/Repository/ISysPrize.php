<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreatePrizeDTO;

interface ISysPrize extends IRepository
{
    /**
     * Creates a user.
     * @param CreatePrizeDTO $attributes Array of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreatePrizeDTO $attributes);

    /**
     * Update a user details.
     * @param string $id ID of the user to update.
     * @param array $attributes Array of the details to be updated.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function update(string $id, array $attributes);
}

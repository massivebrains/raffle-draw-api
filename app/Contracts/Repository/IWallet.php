<?php

namespace App\Contracts\Repository;

use App\DTOs\CreateWalletDTO;

interface IWallet
{
    /**
     * Creates a user.
     * @param CreateWalletDTO $attributes Array of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateWalletDTO $attributes);

    /**
     * Update a user details.
     * @param string $id ID of the user to update.
     * @param array $attributes Array of the details to be updated.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function Update(string $id, array $attributes);
}

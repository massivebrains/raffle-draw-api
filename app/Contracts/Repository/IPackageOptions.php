<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreatePackageOptionsDTO;
use App\DTOs\UpdatePackageOptionsDTO;

interface IPackageOptions extends IRepository
{
    /**
     * Creates a user.
     * @param CreatePackageDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreatePackageOptionsDTO $attributes);

    /**
     * Update a user details.
     * @param string $id ID of the user to update.
     * @param array $attributes Array of the details to be updated.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function update(string $id, UpdatePackageOptionsDTO $attributes);

    public function updateSells(string $packageOptionID);
    public function findByPackage(string $packageID);
}

<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreatePackageDTO;
use App\DTOs\UpdatePackageDTO;

interface IPackages extends IRepository
{
    /**
     * Creates a user.
     * @param CreatePackageDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreatePackageDTO $attributes);

    /**
     * Update a user details.
     * @param string $id ID of the user to update.
     * @param array $attributes Array of the details to be updated.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function update(string $id, UpdatePackageDTO $attributes);

    public function findByInternalID(string $id);
    public function findDetailed(string $id);
    public function findAllDetailed();
}

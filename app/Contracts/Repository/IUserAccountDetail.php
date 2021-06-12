<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreateUserAccountDetailDTO;

interface IUserAccountDetail extends IRepository
{
    /**
     * Creates a user.
     * @param CreatePackageDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateUserAccountDetailDTO $attributes);
}

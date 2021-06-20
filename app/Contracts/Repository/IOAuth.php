<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreateUserDTO;
use App\DTOs\OAuthDTO;
use App\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

interface IOAuth extends IRepository
{
    /**
     * Creates entity.
     * @param OAuthDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(OAuthDTO $attributes);

    public function updateSecret(string $userId, string $secret);
}

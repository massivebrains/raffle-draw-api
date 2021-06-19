<?php

namespace App\Contracts\Repository;

use App\DTOs\CreateUserVerificationDTO;

interface IUserVerification
{
    /**
     * Creates.
     * @param CreateUserVerificationDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateUserVerificationDTO $attributes);

    public function disableAllActiveUnused(int $userID);

    public function validCode(string $code);

    public function markUsed(string $code, int $userID);
}

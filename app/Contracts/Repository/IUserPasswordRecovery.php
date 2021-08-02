<?php

namespace App\Contracts\Repository;

use App\DTOs\CreateUserVerificationDTO;

interface IUserPasswordRecovery
{

    public function create(CreateUserVerificationDTO $attributes);

    public function disableAllActiveUnused(int $userID);

    public function validCode(string $code);

    public function markUsed(string $code, int $userID);
}

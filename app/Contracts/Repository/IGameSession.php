<?php

namespace App\Contracts\Repository;

use App\DTOs\CreateGameSessionDTO;

interface IGameSession
{

    /**
     * Creates a user.
     * @param CreateGameSessionDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateGameSessionDTO $attributes);


    public function getActiveSession(string $packageID);
}

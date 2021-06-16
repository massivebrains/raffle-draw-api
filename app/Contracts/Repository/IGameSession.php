<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreateGameSessionDTO;

interface IGameSession extends IRepository
{

    /**
     * Creates a user.
     * @param CreateGameSessionDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateGameSessionDTO $attributes);


    public function getActiveSession(string $packageID);

    public function winnerCompleted(string $sessionID);

    public function updateShuffle(string $sessionID);

    public function updateSells(string $sessionID);

    public function updateDraw(string $sessionID, int $selectedCount);
}

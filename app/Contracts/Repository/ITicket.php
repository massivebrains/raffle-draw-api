<?php

namespace App\Contracts\Repository;

use App\DTOs\CreateTicketDTO;
use App\DTOs\UpdateDrawDTO;

interface ITicket
{
    /**
     * Creates a user.
     * @param CreateTicketDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateTicketDTO $attributes);
    public function shuffleTicket(string $sessionID);
    public function findByDrawIndex(array $drawIndexes);
    public function updateTicketDraw(array $ticketIDs, UpdateDrawDTO $updateDrawData);
    public function findByUserID(int $userID);
    public function findBySessionID(string  $sessionID);
}

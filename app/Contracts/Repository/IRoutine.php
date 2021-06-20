<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreateRoutineDTO;

interface IRoutine extends IRepository
{
    /**
     * Creates a user.
     * @param CreateRoutineDTO $attributes Object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateRoutineDTO $data);

    public function findOneByUserID(int $userID, string $routineID);

    public function findAllByUserID(int $userID);
    public function disable(int $id);
}

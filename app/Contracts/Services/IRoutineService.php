<?php

namespace App\Contracts\Services;

use App\DTOs\CreateRoutineDTO;

interface IRoutineService
{
    public function create(CreateRoutineDTO $data);
    public function softDelete(string $id);
    public function find(int $userID, string $routineID);
    public function findAll(int $userID);
    public function disable(string $id);
}

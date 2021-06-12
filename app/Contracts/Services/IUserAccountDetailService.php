<?php

namespace App\Contracts\Services;

use App\DTOs\CreateUserAccountDetailDTO;

interface IUserAccountDetailService
{
    public function create(CreateUserAccountDetailDTO $data);
    public function find(string $id);
    public function findAll();
    public function softDelete(string $id);
}

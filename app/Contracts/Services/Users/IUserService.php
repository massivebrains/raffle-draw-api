<?php

namespace App\Contracts\Services;

interface IUserService
{
    public function create();
    public function update(string $id);
}

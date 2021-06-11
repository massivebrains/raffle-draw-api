<?php

namespace App\Contracts\Services;

interface IBanksService
{
    public function find(string $id);
    public function findAll();
}

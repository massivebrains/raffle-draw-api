<?php

namespace App\Contracts\Services;

interface IPrizeService
{
    public function create();
    public function softDelete(string $id);
    public function find(string $id);
    public function findAll();
}

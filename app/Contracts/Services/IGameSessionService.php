<?php

namespace App\Contracts\Services;

interface IGameSessionService
{
    public function find(string $id);
    public function findAll();
    public function findAllActive();
    public function findOneLatestByPackage(string $package_id);
}

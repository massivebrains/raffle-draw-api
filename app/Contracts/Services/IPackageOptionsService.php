<?php

namespace App\Contracts\Services;

interface IPackageOptionsService
{
    public function create();
    public function update(string $id);
    public function find(string $id);
    public function findByPackage(string $packageId);
    public function findAll();
    public function softDelete(string $id);
}

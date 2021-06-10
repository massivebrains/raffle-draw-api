<?php

namespace App\Contracts\Services;

interface IPackageService
{
    public function create();
    public function update(string $id);
    public function find(string $id);
    public function findAll();
    public function softDelete(string $id);
}

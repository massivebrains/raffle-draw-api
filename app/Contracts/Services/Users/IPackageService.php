<?php

namespace App\Contracts\Services;

interface IPackageService
{
    public function create();
    public function softDelete(string $id);
}

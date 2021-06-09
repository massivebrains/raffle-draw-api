<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;

interface IPackages extends IRepository
{
    public function create();
    public function delete(string $id);
}

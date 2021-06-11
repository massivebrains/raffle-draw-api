<?php

namespace App\Contracts\Services;

interface IUserAccountDetailService
{
    public function create();
    public function update(string $id);
    public function find(string $id);
    public function findAll();
    public function softDelete(string $id);
}

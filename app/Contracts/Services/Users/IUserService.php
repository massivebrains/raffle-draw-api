<?php

namespace App\Contracts\Services;

interface IUserService
{
    public function create();
    public function update(string $id);
    public function find(string $id);
    public function findAll();
    public function findAllAdmin();
    public function findAllPlayers();
    public function softDelete(string $userID);
}

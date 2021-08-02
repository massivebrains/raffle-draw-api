<?php

namespace App\Contracts\Services;

interface IPasswordRecoveryService
{
    public function create(string $email);
    public function verify(string $code);
    public function changePassword(string $code, string $password);
}

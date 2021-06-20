<?php

namespace App\Contracts\Services;

interface IVerificationService
{
    public function create(string $email);
    public function verify(string $code);
}

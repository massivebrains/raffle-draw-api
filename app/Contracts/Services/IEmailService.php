<?php

namespace App\Contracts\Services;

interface IEmailService
{
    public function sendMail(string $recipient, string $subject, string $body);
}

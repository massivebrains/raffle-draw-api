<?php

namespace App\Contracts\Services;

interface ISMSService
{
    public function sendMessage(string $recipient, string $message);
}

<?php

namespace App\Contracts\Services;

use App\DTOs\NubanVerifyDTO;

interface INubanVerifyService
{
    public function verifyByAccountNoAndCode(NubanVerifyDTO $data);
}

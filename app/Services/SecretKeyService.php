<?php

namespace App\Services;

use Illuminate\Support\Str;


class SecretKeyService
{
    public function generateSecretKey()
    {
        return hash('sha256', Str::random(60));
    }
}

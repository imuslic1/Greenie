<?php

namespace App\Repositories;

use App\Models\Connection;
use App\Models\Partner;

class PartnerRepository
{
    public function getPartnerBySecretKey($secretKey) {
        $partner = Partner::where('secret_key', $secretKey)->first();

        return $partner;
    }
}

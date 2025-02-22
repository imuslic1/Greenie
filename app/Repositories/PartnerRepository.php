<?php

namespace App\Repositories;

use App\Models\Partner;

class PartnerRepository
{
    public function getPartnerBySecretKey($secretKey) {
        $partner = Partner::where('secret_key', $secretKey)->first();

        return $partner;
    }

    public function getAllPartners() {
        $partners = Partner::all();

        return $partners;
    }
}

<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Models\Transaction;

class PartnerRepository
{
    public function getAllPartners() {
        $partners = Partner::all();

        return $partners;
    }
}

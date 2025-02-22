<?php

namespace App\Repositories;

use App\Models\RefferalCode;
use App\Models\Transaction;

class ReferralCodeRepository
{
    public function updateReferralCode($code) {
        $referralCode = RefferalCode::where('code', $code)->first();
        $referralCode->active = false;
        $referralCode->save();

        return $referralCode;
    }
}

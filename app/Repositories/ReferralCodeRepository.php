<?php

namespace App\Repositories;

use App\Models\RefferalCode;
use App\Models\Transaction;

class ReferralCodeRepository
{
    public function updateReferralCode($code, $partnerId) {
        $referralCode = RefferalCode::where('code', $code)->first();

        if (!$referralCode || $referralCode->offer?->partner_id !== $partnerId || !$referralCode->active) { return null;}

        $referralCode->active = false;
        $referralCode->save();

        return $referralCode;
    }

    public function addReferralCode($userId, $partnerId, $offerId) {
        $referralCode = RefferalCode::create([
            'code' => bin2hex(random_bytes(16)),
            'partner_id' => $partnerId,
            'offer_id' => $offerId,
            'active' => true,
            'user_id' => $userId
        ]);

        return $referralCode;
    }
}

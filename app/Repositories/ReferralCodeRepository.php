<?php

namespace App\Repositories;

use App\Models\RefferalCode;

class ReferralCodeRepository
{
    public function updateReferralCode($code, $partnerId)
    {
        $referralCode = RefferalCode::where('code', $code)->first();

        if (!$referralCode || $referralCode->offer?->partner_id !== $partnerId || !$referralCode->active) {
            return null;
        }

        $referralCode->active = false;
        $referralCode->save();

        return $referralCode;
    }

    public function checkIfCodeExists($code)
    {
        $referralCode = RefferalCode::where('code', $code)->exists();

        return $referralCode;
    }

    public function addReferralCode($userId, $partnerId, $offerId, $code) {
        $referralCode = RefferalCode::create([
            'code' => $code,
            'partner_id' => $partnerId,
            'offer_id' => $offerId,
            'active' => true,
            'user_id' => $userId
        ]);

        return $referralCode;
    }

    public function getAllReferralCodes()
    {
        return RefferalCode::all();
    }
}

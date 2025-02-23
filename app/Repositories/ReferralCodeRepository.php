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

        $offer = $referralCode->offer;

        $referralCode->delete();

        return $offer;
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

    public function getReferralCodesByPartnerAndUser($partnerId, $userId)
    {
        return RefferalCode::where('user_id', $userId)
                ->join('offers', 'offers.id', '=', 'refferal_codes.offer_id')
                ->join('partners', 'partners.id', '=', 'offers.partner_id')
                ->where('partners.id', $partnerId)
                ->get();
    }
}

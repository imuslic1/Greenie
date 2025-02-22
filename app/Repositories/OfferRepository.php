<?php

namespace App\Repositories;

use App\Models\Connection;
use App\Models\Partner;
use App\Models\Offer;

class OfferRepository
{
    public function addOffer($data)
    {
        $offer = new Offer();
        $offer->partner_id = $data['partner_id'];
        $offer->amount = $data['amount'];
        $offer->discount_percentage = $data['discount_percentage'];
        $offer->save();

        return $offer;
    }

    public function getAllOffers()
    {
        return Offer::all();
    }
}

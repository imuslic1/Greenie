<?php

namespace App\Repositories;

use App\Models\Connection;
use App\Models\Partner;
use App\Models\Offer;

class OfferRepository
{
    public function add($data)
    {
        $offer = new Offer();
        $offer->title = $data['title'];
        $offer->description = $data['description'];
        $offer->price = $data['price'];
        $offer->save();

        return $offer;
    }

    public function getAllOffers()
    {
        return Offer::all();
    }
}

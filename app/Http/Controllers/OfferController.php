<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Offer $offer) {
        return view('offers.index', compact('offer'));
    }

    public function store(Offer $offer, Request $request) {
        $user = $request->user();
        $partner = $offer->partner;

        $user->offers()->attach($offer->id, [
            'partner_id' => $partner->id,
            'status' => 'pending',
        ]);

        return redirect()->route('offers', $offer);

    }
}

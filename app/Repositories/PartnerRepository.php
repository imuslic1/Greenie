<?php

namespace App\Repositories;

use App\Models\Partner;

class PartnerRepository
{
    public function getPartnerBySecretKey($secretKey)
    {
        $partner = Partner::where('secret_key', $secretKey)->first();

        return $partner;
    }

    public function getAllPartners()
    {
        $partners = Partner::all();

        return $partners;
    }

    public function checkIfSlugExists($slug)
    {
        $partner = Partner::where('slug', $slug)->exists();

        return $partner;
    }

    public function addPartner($data, $slug, $secretKey)
    {
        $partner = new Partner();
        $partner->name = $data['name'];
        $partner->email = $data['email'];
        $partner->domain = $data['domain'];
        $partner->slug = $slug;
        $partner->secret_key = $secretKey;
        $partner->save();

        return $partner;
    }
}

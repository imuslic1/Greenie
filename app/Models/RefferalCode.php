<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefferalCode extends Model
{
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}

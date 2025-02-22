<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "domain",
        "slug",
        "secret_key",
        "logo"
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\RefferalCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefferalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RefferalCode::factory()
            ->count(15)
            ->create();
    }
}

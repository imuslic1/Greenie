<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyUsers = User::where('is_company', true)->get();

        foreach ($companyUsers as $companyUser) {
            Company::create([
                'name' => $companyUser->name . ' Company',
                'email' => $companyUser->email,
                'domain' => null,
                'user_id' => $companyUser->id,
            ]);
        }
    }
}

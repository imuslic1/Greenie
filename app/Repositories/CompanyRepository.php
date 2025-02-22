<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function getAllCompanies() {
        $companies = Company::all();

        return $companies;
    }
}

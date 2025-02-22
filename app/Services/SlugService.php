<?php

namespace App\Services;

use Illuminate\Support\Str;

class SlugService
{

    public function getOriginalSlug($name, $repositoryClass)
    {
        $slug = Str::slug($name, '-');
        $originalSlug = $slug;
        $count = 1;

        while ($repositoryClass->checkIfSlugExists($slug)) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

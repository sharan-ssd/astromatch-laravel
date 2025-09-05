<?php

namespace App\Services;

use Illuminate\Support\Facades\DB; 

class PlanetService
{
    public function getPlanets()
    {
        return DB::table('ab5_planet_table')
            ->select(
                'planetID',
                'planetName',
                'planetName_ta',
                'planetName_hi',
                'planetName_te',
                'planetName_kn',
                'planetName_ml',
                'primaryRemedyColor',
                'secondaryRemedyColor'
            )
            ->get();
    }
}

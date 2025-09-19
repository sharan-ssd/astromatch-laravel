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

    function getRasiOption() {
        $query = "SELECT rasiID,rasiName,rasiName_ta,rasiName_hi,rasiName_te,rasiName_kn,rasiName_ml FROM ab8_rasi_table";
        return DB::select($query);
    }

}

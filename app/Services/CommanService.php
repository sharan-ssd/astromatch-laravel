<?php

namespace App\Services;

use Illuminate\Support\Facades\DB; 

class CommanService
{
    public function getConfig() {
        $configOptions = DB::table('ab1_config_table')
        ->where('isActive', 'Y')
        ->orderByDesc('configID')
        ->first(); 

        return $configOptions;
    }
}

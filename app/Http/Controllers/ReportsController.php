<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommanService;
use App\Services\PlanetService;

class ReportsController extends Controller
{
    function completeReport() {
        $commanService = new CommanService();
        $planetService = new PlanetService();

        $configOptions = $commanService->getConfig();
        $planetOptions = $planetService->getPlanets();
        $rasiOptions = $planetService->getRasiOption();
        
        return view('frontend.reports.marriagereportcomplete', compact('configOptions', 'planetOptions','rasiOptions'));
    }
}

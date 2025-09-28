<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommanService;
use App\Services\PlanetService;

class ReportsController extends Controller
{
    function completeReport() {
        return $this->render_raw_php(resource_path('views/frontend/marriagereport-plain.php'), ['message' => 'This is raw PHP.']);
        $commanService = new CommanService();
        $planetService = new PlanetService();

        $configOptions = $commanService->getConfig();
        $planetOptions = $planetService->getPlanets();
        $rasiOptions = $planetService->getRasiOption();

        return view('frontend.reports.match_maker_report', compact('configOptions', 'planetOptions','rasiOptions'));
    }

    function render_raw_php($file_path, $data = []) {
        ob_start();
        extract($data); // Makes array keys available as variables
        include $file_path;
        return ob_get_clean();
    }
}

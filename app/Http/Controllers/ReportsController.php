<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommanService;
use App\Services\PlanetService;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class ReportsController extends Controller
{

    function basicReport_poll(Request $request) {
        $xavier_id = $request->xavier_id;
        $xavier_report =  DB::select("select * from xavier_reports 
                                        left join ab_savedMatch_table on ab_savedMatch_table.sno = xavier_reports.match_id
                                        where xavier_id = $xavier_id and status = 'completed'
                                    ");

        if ($xavier_report){
            return response()->json([
                'xavier_report'  => $xavier_report[0],
            ]);
        }
        
        try {
            if (Cache::lock('queue-worker-lock', 10)->get()) {
                Artisan::call('queue:work', [
                    '--tries' => 3,
                    '--once' => true,
                ]);
            }
        } catch (\Throwable $th) {
           //ignore
        }
        
        return response()->json([
            "error" => "Xavier report not found or not ready at the moment",
        ]);
    }
    
    function basicReport() {
        return view('frontend.reports.marriagereport-plain');
    }

    function completeReport() {
        return view('frontend.reports.marriageReportComplete-plain');
    }

    function premimum_report_intent() {
        return redirect('/payfor-horoscope');
    }

    public function basicReportPDF(Request $request)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(120);

        $data = $request->all();
        $mpdf = new Mpdf([
            'tempDir' => storage_path('app/mpdf-temp'),
            'simpleTables' => true,    
            'useSubstitutions' => false,
            'curlAllowUnsafeSslRequests' => true,
        ]);
      
        $html = view('frontend.reports.marriagereport-plain-pdf', $data)->render();

        $mpdf->WriteHTML($html);

        return response($mpdf->Output('', 'S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="marriagereport.pdf"');
    }


    public function premimumReportPDF(Request $request)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(120);

        $data = $request->all();
        $mpdf = new Mpdf([
            'tempDir' => storage_path('app/mpdf-temp'),
            'simpleTables' => true,    
            'useSubstitutions' => false,
            'curlAllowUnsafeSslRequests' => true,
        ]);
      
        $html = view('frontend.reports.marriageReportComplete-plain-pdf', $data)->render();

        $mpdf->WriteHTML($html);

        return response($mpdf->Output('', 'S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="marriagereport.pdf"');
    }

    function render_raw_php($file_path, $data = []) {
        ob_start();
        extract($data); // Makes array keys available as variables
        include $file_path;
        return ob_get_clean();
    }


}

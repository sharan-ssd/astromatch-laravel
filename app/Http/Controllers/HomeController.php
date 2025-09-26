<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LanguageService;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Jobs\ReportGeneratorJob;
use App\Jobs\ProcessSomething;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $languageService;

    public function __construct(LanguageService $languageService){
        $this->languageService = $languageService;
        view()->share('languages', $this->languageService->getLanguages());
        view()->share('selectedLang', session('languageSelected', 'english'));
    }

    public function changeLanguage(Request $request){
        if ($request->isMethod('post') && $request->languageSelected) {
            $request->session()->put('languageSelected', $request->languageSelected);
            return redirect()->back();
        }
    }

    public function index(Request $request) {
        return view('frontend.home.home');
    }


    public function submitHoroscope(Request $request)
    {   
        session(['cachedHoroscope' => $request->all()]);
        session()->save();

        if (!Auth::check()) {
            return redirect()->route('google.login');
        }

        return redirect('/process-horoscope');
    }

    public function processHoroscope()
    {
        \Log::info('ProcessHoroscope method entered');

        if (!Auth::check()) {
            \Log::warning('User not authenticated in processHoroscope');
            return redirect('/');
        }

        if (session('cachedHoroscope')) {
            $xavier_report = ReportGeneratorJob::dispatch(auth()->user(), session()->pull('cachedHoroscope'));
            $xavier_report_id = $xavier_report->xavier_id ?? null;
            
            session(['xavier_report_id' => $xavier_report_id]);
            session()->save();
        }
        else{
            \Log::warning('No cachedHoroscope found in session');
            $xavier_report_id = session('xavier_report_id');
        }

        if (!$xavier_report_id) {
            \Log::error('No xavier_report_id found after dispatching ReportGeneratorJob');
            return redirect('/')->with('error', 'Unable to process your horoscope at this time. Please try again later.');
        }

        $plans = DB::select('select * from ab_report_plans');

        return view('frontend.plans.plan_listing',compact('plans', 'xavier_report_id'));
    }


    public function redirectToReportgenration(Request $request, $saved_horoscope){
        dd($saved_horoscope);
        // todo: should we process after payment or before?
        if (! session()->has('report_unique_id')) {
            session(['report_unique_id' => uniqid()]);
            session()->save();
        }
        $unique_id = session('report_unique_id');
    
        ReportGeneratorJob::dispatch(auth()->user()); 
        return view('frontend.plans.plan_listing');
    }


    public function profile(Request $request) {
        return view('frontend.profile.profile');
    }

    public function editprofile(Request $request) {
        return view('frontend.profile.editprofile');
    }


    public function horoscopelist(Request $request) {

        $userId = Auth::id();
        $query = "SELECT astroProfileID,astroProfileName,gender,DATE_FORMAT(dateOfBirth,'%d/%m/%Y') AS DOB,TIME_FORMAT(timeOfBirth,'%h:%i:%s %p') AS TOB, placeOfBirthCity, placeOfBirthState, placeOfBirthCountry 
        FROM ab15b_astroProfile_table WHERE isSoftDeleted='N' AND isAllianceProfile='Y' AND associatedUserID=" . $userId . "  ORDER BY astroProfileID DESC";
        $profiles = DB::select($query);

        return view('frontend.home.horoscopelist', compact('profiles'));
    }

}

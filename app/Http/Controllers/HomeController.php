<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LanguageService;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Jobs\ReportGeneratorJob;
use App\Jobs\ProcessSomething;
use App\Http\Controllers\PaymentController;
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

        $sessionData = session()->all();
        \Log::info('Full session dump:', $sessionData);

        if (!session('cachedHoroscope')) {
            \Log::warning('No cachedHoroscope found in session');
            return redirect('/');
        }

        $saved_horoscope = session()->pull('cachedHoroscope');
        \Log::info("Horoscope Data: " . json_encode($saved_horoscope));
        session(['cachedHoroscope' => $saved_horoscope]);
        session()->save();

        ReportGeneratorJob::dispatch(auth()->user(), $saved_horoscope);

        return view('frontend.plans.plan_listing');
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
        return view('frontend.home.profile');
    }

    public function editprofile(Request $request) {
        return view('frontend.profile.editprofile');
    }


    public function horoscopelist(Request $request) {
        return view('frontend.home.horoscopelist');
    }

}

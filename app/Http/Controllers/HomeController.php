<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LanguageService;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Jobs\ReportGeneratorJob;
use App\Http\Controllers\PaymentController;
class HomeController extends Controller
{
    protected $languageService;

    public function __construct(LanguageService $languageService){
        $this->languageService = $languageService;
        view()->share('languages', $this->languageService->getLanguages());
        view()->share('selectedLang', session('languageSelected', 'english'));
    }

    public function index(Request $request) {
        if ($request->isMethod('post') && $request->languageSelected) {
            $request->session()->put('languageSelected', $request->languageSelected);
            return redirect('/');
        }

        return view('frontend.home.home');
    }

    public function submitHoroscope(Request $request) {

        if (!Auth::check()) {
            $request->session()->put('cachedHoroscope', $request->all());
            return redirect()->route('google.login');
        }

        if (!Auth::check() && !session('cachedHoroscope')) {
            return redirect('/');
        }

        // todo : process validation
        
        $saved_horoscope = session('cachedHoroscope');
        $request->session()->forget('cachedHoroscope');
            
        return $this->redirectToReportgenration($request, $saved_horoscope);
    }


    public function redirectToReportgenration(Request $request, $saved_horoscope){
        // todo: do report processing
        // todo: should we process after payment or before?
        ReportGeneratorJob::dispatch(auth()->user()); 
        return view('frontend.plans.plan_listing');
    }


    public function profile(Request $request) {
        return view('frontend.home.profile');
    }


    public function horoscopelist(Request $request) {
        return view('frontend.home.horoscopelist');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LanguageService;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class HomeController extends Controller
{
    protected $languageService;

    public function __construct(LanguageService $languageService){
        $this->languageService = $languageService;
    }

    public function index(Request $request) {
        if ($request->isMethod('post') && $request->languageSelected) {
            $request->session()->put('languageSelected', $request->languageSelected);
        }

        $languages = $this->languageService->getLanguages();
        $selectedLang = session('languageSelected', 'english');

        return view('frontend.home.home', compact('languages', 'selectedLang'));
    }

    public function submitHoroscope(Request $request) {

        if (!Auth::check()) {
            $request->session()->put('cachedHoroscope', $request->all());
            return redirect()->route('google.login');
        }

        if (session('cachedHoroscope')) {
            return redirect('reports/success');
        }

        $request->session()->forget('cachedHoroscope');

        return $this->index();
    }

}

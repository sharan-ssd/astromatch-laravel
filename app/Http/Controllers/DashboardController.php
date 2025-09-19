<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\LanguageService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{   
    protected $languageService;

    public function __construct(LanguageService $languageService){
        $this->languageService = $languageService;
        view()->share('languages', $this->languageService->getLanguages());
        view()->share('selectedLang', session('languageSelected', 'english'));
    }

    public function index(Request $request)
    {
        $userId = Auth::id();

        $maleProfileCount = DB::table('ab15b_astroProfile_table')
            ->where([
                ['isSoftDeleted', '=', 'N'],
                ['isAllianceProfile', '=', 'Y'],
                ['isPaymentDone', '=', 'Y'],
                ['gender', '=', 'Male'],
                ['associatedUserID', '=', $userId],
            ])
            ->count('astroProfileID');

        // Female profile count
        $femaleProfileCount = DB::table('ab15b_astroProfile_table')
            ->where([
                ['isSoftDeleted', '=', 'N'],
                ['isAllianceProfile', '=', 'Y'],
                ['isPaymentDone', '=', 'Y'],
                ['gender', '=', 'Female'],
                ['associatedUserID', '=', $userId],
            ])
            ->count('astroProfileID');

        // Matches count
        $matchCount = DB::table('ab_savedMatch_table')
            ->where('userID', $userId)
            ->count('matchDate');

        // Recent matches
        $recentMatches = DB::table('ab_savedMatch_table')
            ->leftJoin('ab15b_astroProfile_table', 'ab15b_astroProfile_table.astroProfileID', '=', 'ab_savedMatch_table.mainProfileID')
            ->leftJoin('ab15b_astroProfile_table AS ProfileTable', 'ProfileTable.astroProfileID', '=', 'ab_savedMatch_table.allianceProfileID')
            ->where('ab_savedMatch_table.isPaymentDone', '=', 'Y')
            ->where('ab_savedMatch_table.userID', '=', $userId)
            ->orderByDesc('sno')
            ->limit(10)
            ->get([
                'ab15b_astroProfile_table.astroProfileName AS mainProfile',
                'ProfileTable.astroProfileName AS allianceProfile',
                DB::raw("DATE_FORMAT(matchDate,'%d/%m/%Y %h:%i %p') AS matchDate"),
                'matchMakingMethod'
            ]);

        // Send to view
        return view('frontend.dashboard.dashboard', compact(
            'maleProfileCount',
            'femaleProfileCount',
            'matchCount',
            'recentMatches'
        ));
    }
}

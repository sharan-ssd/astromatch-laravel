<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\AstroProfile;

class ProfileController extends Controller
{   
    public function editProfile()
    {
        $userId = Auth::id();

        // fetch user details from custom table
        $userInfo = UserInfo::where('associatedUserID', $userId)->first();

        if (!$userInfo) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return view('frontend.profile.editprofile', compact('userInfo'));
    }


    public function savedhoroscope()
    {
        // Only profiles with payment done + alliance profile marked
        $maleProfiles = AstroProfile::activeAlliance()
                        ->where('gender', 'Male')
                        ->get();

        $femaleProfiles = AstroProfile::activeAlliance()
                        ->where('gender', 'Female')
                        ->get();

        // Pass to view
        return view('frontend.home.savedhoroscope', compact('maleProfiles', 'femaleProfiles'));
    }
}
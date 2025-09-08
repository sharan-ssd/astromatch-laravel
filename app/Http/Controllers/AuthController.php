<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'userName'              => $googleUser->getName(),
                    'googleID'              => $googleUser->getId(),
                    'profilePicture'        => $googleUser->getAvatar(),
                    'password'              => bcrypt(str()->random(16)),
                    'isEmailVerified'       => true,
                ]
            );

            Auth::login($user);
            
            if(session('cachedHoroscope')){
                return app(HomeController::class)->redirectToReportgenration(request());
            }
            else{
                return redirect()->intended('/');
            }

            
        } catch (\Exception $e) {
            dd($e);
            return redirect('/')->with('error', 'Something went wrong with Google login!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

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
                    'name'     => $googleUser->getName(),
                    'google_id'=> $googleUser->getId(),
                    'avatar'   => $googleUser->getAvatar(),
                    'password' => bcrypt(str()->random(16)), // random password
                ]
            );

            Auth::login($user);
            
            if(session('cachedHoroscope')){
                return app(HomeController::class)->submitHoroscope(request());
            }
            else{
                return redirect()->intended('/');
            }

            
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Something went wrong with Google login!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

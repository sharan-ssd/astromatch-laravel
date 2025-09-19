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

    /*public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
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
                return redirect('/submit-horoscope');
            }
            else{
                return redirect()->intended('/');
            }

            
        } catch (\Exception $e) {
            dd($e);
            return redirect('/')->with('error', 'Something went wrong with Google login!');
        }
    }*/

    public function handleGoogleCallback()
    {
        try {
            //$googleUser = Socialite::driver('google')->stateless()->user();
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'userName'        => $googleUser->getName(),
                    'googleID'        => $googleUser->getId(),
                    'profilePicture'  => $googleUser->getAvatar(),
                    'password'        => bcrypt(str()->random(16)),
                    'isEmailVerified' => true,
                ]
            );

            Auth::login($user);

            \Log::info('Session at Google callback: ', session()->all());

            if (session('cachedHoroscope')) {
                return redirect('/process-horoscope');
            }           

            return redirect()->intended('/');

        } catch (\Exception $e) {
            \Log::error($e);
            return redirect('/')->with('error', 'Something went wrong with Google login!');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

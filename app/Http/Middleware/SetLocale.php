<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {   
        // dd(Session::get('locale'));
        $locale = Session::get('locale', config('app.locale'));
        App::setLocale($locale);

        return $next($request);
    }
}

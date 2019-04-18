<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class GetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->input('locale','');
        if( empty($locale))
        {
            $locale = App::getLocale();
            if( Cookie::get('locale'))
            {
                $locale = Cookie::get('locale');
            }
        }
        App::setLocale($locale);
        return $next($request)->withCookie(Cookie::make('locale', $locale, 60));
    }
}

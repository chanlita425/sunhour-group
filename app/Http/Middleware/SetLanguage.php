<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $queryLocale = $request->query('locale');
        if ($queryLocale && in_array($queryLocale, ['en', 'km', 'cn'])) {
            Session::put('locale', $queryLocale);
        }

        $locale = Session::get('locale') ?? 'en';
        App::setLocale($locale);
        return $next($request);
    }
    // public function handle(Request $request, Closure $next) {
    // $locale = $request->segment(1); // Gets 'en' or 'km' from the URL

    // if (in_array($locale, ['en', 'km', 'cn'])) {
    //     app()->setLocale($locale);
    //     session()->put('locale', $locale);
    // } else {
    //     // Default if segment 1 is missing
    //     app()->setLocale(config('app.locale'));
    // }

    // return $next($request);
}

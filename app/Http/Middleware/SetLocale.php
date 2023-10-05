<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // Library for multi languge (https://github.com/mcamara/laravel-localization)

        // $lang = $request->route('lang'); // ar/admin/categories
        $lang = $request->query('lang', session('lang')); // admin/categories?lang=ar
        if ($lang) {
            App::setlocale($lang);
            session()->put('lang', $lang);
        }

        // URL::defaults([
        //     'lang' => App::currentLocale(),
        // ]);

        // Route::current()->forgetParameter('lang');

        return $next($request);
    }
}

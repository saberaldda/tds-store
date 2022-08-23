<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = $request->user();  // Get user object
        // $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (! in_array($user->type, $types)) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);

        // $response = $next($request);         // can do any action on response 
        // return response(strtoupper($response->content()));
    }
}

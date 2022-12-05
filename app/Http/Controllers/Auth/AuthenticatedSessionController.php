<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        Log::stack(['daily','db'])->info("User (".$request->user()->name.") Logged IN By (web)", [
            'User Name'     => $request->user()->name,
            'User Email'    => $request->user()->email,
            'User Type'     => $request->user()->type,
            'Logged At'     => now()->format('Y-m-d H:i:s'),
            'IP Address'    => $request->ip(),
            'By'          => 'web',
        ]);

        return redirect()->intended(RouteServiceProvider::ADMIN);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Log::stack(['daily','db'])->info("User (".$request->user()->name.") Logged OUT By (web)", [
            'User Name'     => $request->user()->name,
            'User Email'    => $request->user()->email,
            'User Type'     => $request->user()->type,
            'Logged At'     => now()->format('Y-m-d H:i:s'),
            'IP Address'    => $request->ip(),
            'By'          => 'web',
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}

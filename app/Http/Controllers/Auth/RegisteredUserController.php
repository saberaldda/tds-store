<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image'    => ['required'],
        ]);

        // sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->storeAs('uploads',
                time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName()),
                'public');
            
            $image_path = 'storage/' . $image_path;

            // merge image to the request
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_photo_path' => $request->image_path,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::ADMIN);
    }
}

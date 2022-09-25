<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $user->load('profile');
        // dd($user);
        if (Auth::id() !== $user->id) {
            return redirect()->route('profile.show', Auth::id());
        }

        return view('admin.profile.show', [
            'title'     => __('User Profile'),
            'user'      => $user,
            'countries' => Country::all(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        // sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            // delete old image
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $image_path = $file->storeAs('uploads',
                time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName()),
                'public');

            // merge image to the request
            $request->merge([
                'profile_photo_path' => $image_path,
            ]);
        }

        $user->update($request->all());

        $profile = Profile::where('user_id', $user->id)->first();
        if (!$profile) {
            Profile::where('user_id', $user->id)->create([
                'user_id'   => $user->id,
                'birthdate' => $request->post('birthdate'),
                'address'   => $request->post('address'),
                'gender'    => $request->post('gender'),
            ]);
        }else{
            Profile::where('user_id', $user->id)->update([
                'birthdate' => $request->post('birthdate'),
                'address'   => $request->post('address'),
                'gender'    => $request->post('gender'),
            ]);
        }

        return redirect()->route('profile.show', Auth::id());
    }

    public function changePass(Request $request, User $user)
    {
        $request-> validate([
            'old_password'          => 'required|min:8',
            'password'              => 'required|min:8|different:old_password',
            'password_confirmation' => 'required|same:password',
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('profile.show', Auth::id())
                ->with('error', __('The Current Password is Invalid'));
        }

        $request->merge([
            'password' => Hash::make($request->post('password')),
            'password_confirmation' => Hash::make($request->post('password_confirmation'))
            ]);
        
        $user->update([
            'password'  => $request->post('password'),
        ]);

        return redirect()->route('profile.show', Auth::id())
            ->with('success', __('The Password Has been Updated'));
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        // for search
        $request = request();
        $query = User::query();

        if ($name = $request->query('name')) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($email = $request->query('email')) {
            $query->where('email', 'LIKE', "%{$email}%");
        }

        $users = $query->with('roles', 'country')->paginate();
        // dd($users);

        return view('admin.users.index', [
            'title' => __("Users List"),
            'users' => $users,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        $countries = Country::all();

        return view('admin.users.create', [
            'user'  => new User(),
            'countries' => $countries,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $request->validate(User::validateRules());

        // sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->storeAs('uploads',
            time() . $file->getClientOriginalName(),
            'public');
            
            // merge image to the request
            $request->merge([
                'profile_photo_path' => $image_path,
            ]);
        }

        $request->merge([
            'password' => Hash::make($request->post('password')),
            'password_confirmation' => Hash::make($request->post('password_confirmation'))
        ]);
        
        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', __('app.users_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $this->authorize('view', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $this->authorize('update', $user);

        $countries = Country::all();

        return view('admin.users.edit', [
            'title'     => __('Edit User'),
            'user'      => $user,
            'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $this->authorize('update', $user);

        $request->validate([
            'name'                  => 'required|max:255',
            'image'                 => 'nullable|image',
            'email'                 => 'required|email',
            'type'                  => 'required',
            'password'              => 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password',
            'country'               => 'nullable',
        ]);

        // sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->storeAs('uploads',
            time() . $file->getClientOriginalName(),
            'public');
            
            // merge image to the request
            $request->merge([
                'profile_photo_path' => $image_path,
            ]);
        }

        if ($request->post('password')) {
            $request->merge([
            'password' => Hash::make($request->post('password')),
            'password_confirmation' => Hash::make($request->post('password_confirmation'))
            ]);
        }else 
            $request->merge(['password' => $user->password,]);
        
        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', __('app.users_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', __('app.users_delete', ['name' => $user->name]));
    }

    public function trash()
    {
        $this->authorize('restore', User::class);

        // for search
        $request = request();
        $query = User::query();

        if ($name = $request->query('name')) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($email = $request->query('email')) {
            $query->where('email', 'LIKE', "%{$email}%");
        }

        $users = $query->with('roles', 'country')->onlyTrashed()->paginate();

        return view('admin.users.trash', [
            'title' => __("Users Trash"),
            'users' => $users,
        ]);
    }

    public function restore(Request $request, $id = null)
    {
        $this->authorize('restore', User::class);

        if ($id) {
            $user = User::onlyTrashed()->findOrFail($id);
            $user->restore();

            return redirect()->route('users.trash')
                ->with('success', __('app.users_restore', ['name' => $user->name]));
        }

        User::onlyTrashed()->restore();
        return redirect()->route('users.trash')
        ->with('success', __('app.users_restore_all'));
    }

    public function forceDelete($id = null)
    {
        $this->authorize('forceDelete', User::class);

        if ($id) {
            $user = User::onlyTrashed()->findOrFail($id);
            $user->forceDelete();

            // delete image
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            return redirect()->route('users.trash')
                ->with('success', __('app.users_forcedelete', ['name' => $user->name]));
        }

        // get all images for trashed users in array
        $trashedUsers = User::onlyTrashed()->get();
        foreach ($trashedUsers as $trashedUser) {
            $arr[] = $trashedUser->profile_photo_path;
        }
        // delete the images in the array
        Storage::disk('public')->delete(array_filter($arr));

        User::onlyTrashed()->forceDelete();
        return redirect()->route('users.trash')
        ->with('success', __('app.users_forcedelete_all'));
    }
}

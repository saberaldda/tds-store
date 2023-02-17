<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Country;
use App\Models\Profile;
use App\Models\Rating;
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

        $users = $query->with('roles', 'country', 'profile.ratings')->paginate();
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
    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);

        // sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->storeAs('uploads',
                time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName()),
                'public');
            
            // merge image to the request
            $request->merge([
                'profile_photo_path' => $image_path,
            ]);
        }

        $request->merge([
            'password' => Hash::make($request->post('password')),
            'password_confirmation' => Hash::make($request->post('password_confirmation')),
            'country_id' => $request->post('country'),
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

        $user = $user->load(['roles', 'country',  'profile.ratings']);
        // $rating = Rating::where([
        //     'rateable_type' => Profile::class,
        //     'rateable_id'   => $user->id,
        // ])->get();

        $rating_average = round($user->profile->ratings->avg('rating'), 1);

        // dd($user);
        return view('admin.users.show', [
            'title' => "User Detail",
            'user'  => $user,
            'rating_average' => $rating_average,
        ]);

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
    public function update(UserRequest $request, user $user)
    {
        $this->authorize('update', $user);

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

        if ($request->post('password')) {
            $request->merge([
            'password' => Hash::make($request->post('password')),
            'password_confirmation' => Hash::make($request->post('password_confirmation')),
            'country_id' => $request->post('country'),
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

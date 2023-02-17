<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('roles', 'country', 'profile.ratings')
            ->when($request->query('name'), function($query, $value) { $query->where('name', 'LIKE', "%{$value}%"); })
            ->when($request->query('email'), function($query, $value) { $query->where('email', 'LIKE', "%{$value}%"); })
            ->paginate();

        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => $users,
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
            'password'              => Hash::make($request->post('password')),
            'password_confirmation' => Hash::make($request->post('password_confirmation')),
            'country_id'            => $request->post('country'),
            'type'                  => 'user',
        ]);
        
        $user = User::create($request->all());
        $user->refresh();

        return response()->json([
            'message'   => 'User Created',
            'status'    => 201,
            'date'      => $user,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->load(['roles', 'country',  'profile.ratings']);

        return response()->json([
            'messsage'  => 'OK',
            'status'    => 200,
            'data'      => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrfail($id);

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
            'password'              => Hash::make($request->post('password')),
            'password_confirmation' => Hash::make($request->post('password_confirmation')),
            'country_id'            => $request->post('country'),
            ]);
        }else 
            $request->merge(['password' => $user->password,]);
        
        $user->update($request->all());
        $user->refresh();

        return response()->json([
            'message'   => 'User Updated',
            'status'    => 201,
            'data'      => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message'   => 'User Trashed',
            'status'    => 200,
        ]);
    }

    public function restore(Request $request, $id = null)
    {
        if ($id) {
            $user = User::onlyTrashed()->findOrFail($id);
            $user->restore();

            return response()->json([
                'message'   => 'User Restore',
                'status'    => 200,
            ]);
        }

        User::onlyTrashed()->restore();

        return response()->json([
            'message'   => 'All Trashed Users Restored',
            'status'    => 200,
        ]);
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

            return response()->json([
                'message'   => 'User Permanent Deleted',
                'status'    => 200,
            ]);
        }

        // get all images for trashed users in array
        $trashedUsers = User::onlyTrashed()->get();
        foreach ($trashedUsers as $trashedUser) {
            $arr[] = $trashedUser->profile_photo_path;
        }
        // delete the images in the array
        Storage::disk('public')->delete(array_filter($arr));

        User::onlyTrashed()->forceDelete();

        return response()->json([
            'message'   => 'All Trashed Users Permanent Deleted',
            'status'    => 200,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::with('users')
            ->when($request->query('name'), function($query, $value) { $query->where('name', 'LIKE', "%{$value}%"); })
            ->paginate();
            
        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => $roles,
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
        $request->validate([
            'name' => 'required',
            'abilities' => 'required',
        ]);

        $abilities = $request->input('abilities', ['']);
        if ($abilities && is_string($abilities)) {
            $abilities = explode(',', $abilities);

            $request->merge([
                'abilities' => $abilities,
            ]);
        }

        $role = Role::create([
            'name' => ucfirst($request->post('name')),
            'abilities' => $request->post('abilities'),
        ]);
        $role->refresh();

        return response()->json([
            'message'   => 'Role Created',
            'status'    => 201,
            'data'      => $role,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id)->load('users');
            
        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'abilities' => 'required',
        ]);

        $abilities = $request->input('abilities', ['']);
        if ($abilities && is_string($abilities)) {
            $abilities = explode(',', $abilities);

            $request->merge([
                'abilities' => $abilities,
            ]);
        }

        $role->update([
            'name' => ucfirst($request->post('name')),
            'abilities' => $request->post('abilities'),
        ]);
        $role->refresh();

        return response()->json([
            'message'   => 'Role Updated',
            'status'    => 201,
            'data'      => $role,
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
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json([
            'message'   => 'Role Deleted',
            'status'    => 200,
        ]);
    }

    public function save(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        $request->validate([
            'users' => 'required',
        ]);

        $users = $request->input('users', ['']);
        if ($users && is_string($users)) {
            $users = explode(',', $users);

            $request->merge([
                'users' => $users,
            ]);
        }

        $role_users = RoleUser::where('role_id', '=', $role->id)->get(); //users in role($id)

        foreach ($role_users as $role_user) {
            if (!in_array($role_user->user_id, $request->users)) {
                RoleUser::where('user_id', '=', $role_user->user_id)->delete();
                // dump($role_user->user_id);
            }
        }

        foreach ($request->users as $user) {
            $role_user = RoleUser::updateOrCreate([
                'role_id' => $role->id,
                'user_id' => $user,
            ]);
        }
        
        $role->refresh()->load('users');

        return response()->json([
            'message'   => 'User.s Assigned',
            'status'    => 200,
            'data'      => $role
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Role::class);

        // for search
        $request = request();
        $query = Role::query();

        if ($name = $request->query('name')) {
            $query->where('name', 'LIKE', "%{$name}%");
        }

        $roles = $query->with('users')->paginate();
        $title = "Roles List";

        // $role = Role::find(1);
        // foreach ($role->users as $user) {
            
        // }
        // dd($user->id);

        return view('admin.roles.index', [
            'roles' => $roles,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);

        $users = User::get();

        return view('admin.roles.create', [
            'role' =>new Role(),
            'users' => $users,
            'title' => 'Create Roles',
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
        $this->authorize('create', Role::class);
        
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array',
        ]);

        $role = Role::create([
            'name' => ucfirst($request->post('name')),
            'abilities' => $request->post('abilities'),
        ]);

        return redirect()->route('roles.index')->with('success', __('app.roles_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('view', $role);

        return $role->users;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);
        
        $users = User::get();

        // $role = Role::findOrFail($id);
        return view('admin.roles.edit', [
            'role' => $role,
            'users' => $users,
            'title' => 'Edit Role',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array',
        ]);

        // $role = Role::findOrFail($id);
        $role->update([
            'name' => ucfirst($request->post('name')),
            'abilities' => $request->post('abilities'),
        ]);

        return redirect()->route('roles.index')->with('success', __('app.roles_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        // $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', __('app.roles_delete', ['name' => $role->name]));
    }

    /**
     * Show view for assign user/s to role.
     *
     * @param  \App\Models\Role $role
     */
    public function assign(Role $role)
    {
        $this->authorize('assignUser', $role);

        // $role = Role::findOrFail($id);
        $users = User::get();
        $role_users = RoleUser::where('role_id', '=', $role->id)->get();

        // dd($role_users);
        return view('admin.roles.assign-user', [
            'role' =>$role,
            'users' => $users,
            'title' => 'Assign User To Role',
            'role_users' => $role_users,
        ]);
    }

    /**
     * Saver assign user/s to role.
     *
     * @param  \App\Models\Role $role
     */
    public function save(Request $request, Role $role)
    {
        $this->authorize('assignUser', $role);
        
        $request->validate([
            'users' => 'required|array',
        ]);

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

        return redirect()->route('roles.index')->with('success', __('User/s Assign'));
    }
}

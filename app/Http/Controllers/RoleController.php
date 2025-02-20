<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('users')->get();
        $users = User::all();
        return view('roles.index', compact('roles', 'users'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        Role::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    public function attachUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->roles()->attach($request->role_id);

        return redirect()->route('roles.index')->with('success', 'Role assigned successfully.');
    }

    public function detachUser(Request $request, Role $role)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $role->users()->detach($request->user_id);
        return back()->with('success', 'User removed from role.');
    }
}

// namespace App\Http\Controllers;

// use App\Models\Role;
// use App\Models\User;
// use Illuminate\Http\Request;

// class RoleController extends Controller
// {
//     public function index()
//     {
//         $roles = Role::with('users')->get();
//         return view('roles.index', compact('roles'));
//     }

//     public function create()
//     {
//         return view('roles.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|unique:roles',
//             'slug' => 'required|unique:roles',
//         ]);

//         Role::create($request->all());
//         return redirect()->route('roles.index')->with('success', 'Role created successfully.');
//     }

//     public function edit(Role $role)
//     {
//         return view('roles.edit', compact('role'));
//     }

//     public function update(Request $request, Role $role)
//     {
//         $request->validate([
//             'name' => 'required|unique:roles,name,' . $role->id,
//             'slug' => 'required|unique:roles,slug,' . $role->id,
//         ]);

//         $role->update($request->all());
//         return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
//     }

//     public function destroy(Role $role)
//     {
//         $role->delete();
//         return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
//     }

//     public function attachUser(Request $request, Role $role)
//     {
//         $request->validate(['user_id' => 'required|exists:users,id']);
//         $role->users()->attach($request->user_id);
//         return back()->with('success', 'User assigned to role.');
//     }

//     public function detachUser(Request $request, Role $role)
//     {
//         $request->validate(['user_id' => 'required|exists:users,id']);
//         $role->users()->detach($request->user_id);
//         return back()->with('success', 'User removed from role.');
//     }
// }

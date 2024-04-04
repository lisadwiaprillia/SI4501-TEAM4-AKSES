<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \Illuminate\Validation\ValidationException;

use App\Models\Role;

class RoleController extends Controller
{
    public function showDetailRole(Request $request)
    {
        $role = Role::find($request->role_id);
        return view('Admin.Role.role-details', ['role' => $role]);
    }

    public function showRole()
    {
        $roles = Role::all()->sortByDesc('created_at',);
        return view('Admin.Role.roles', ['roles' => $roles]);
    }

    public function showCreateRoleForm()
    {
        return view('Admin.Role.create-role');
    }

    public function storeRole(Request $request)
    {
        try {

            $roleData = $request->validate([
                'role_name' => 'required|unique:roles',
                'role_desc' => 'nullable'
            ]);

            $roles = new Role;
            $roles->role_name = $roleData["role_name"];
            $roles->role_desc = $roleData["role_desc"];
            $roles->save();

            Session::flash('success-to-create-role', 'Role ' . $roleData['role_name'] . ' Berhasil Dibuat');

            return back();
        } catch (ValidationException $error) {
            dd($error);
        }
    }
}

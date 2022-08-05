<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin','permission:edit users']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::getPermissions();
        $roles = Role::all();
        return inertia()->render('Users/Permissions/Create', ['roles' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        
        $role = Role::findByParam(['name' =>$inputs['role_title']]);
        if(isset($inputs['role_permissions']) and !empty($inputs['role_permissions']) and is_array($inputs['role_permissions'])){
            $role->syncPermissions($inputs['role_permissions']);
        }
        return redirect()->route('users.index')->with('success', 'Role saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $role['permissions'] = $role->permissions()->pluck('id');
        $roles = Role::all();
        $permissions = Permission::getPermissions();
        return inertia('Users/Permissions/Edit', [
            'role' => $role,
            'roles' => $roles,
            'permissions' => $permissions
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
        $role = Role::find($id);
        if(empty($role)){
            return redirect()->route('users.index')->with('error', __('Sorry, we can not find the role.'));
        }
        $inputs = $request->all();
        $role->update(['name' => $inputs['role_title']]);

        if(!empty($inputs['role_permissions'])){
            $role->syncPermissions($inputs['role_permissions']);
        }

        return redirect()->route('users.index')->with('success', __('Role updated successfully.'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findById($id);
        $permissions = $role->permissions;
        $role->revokePermissionTo($permissions);
        $role->delete();
        return redirect()->route('users.index')->with('message', 'Role destroyed!');
    }
}

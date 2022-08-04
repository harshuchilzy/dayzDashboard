<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
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
        return Inertia::render('Users/Permissions/Create', ['roles' => $roles, 'permissions' => $permissions]);
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
        $permission = Permission::findOrCreate($inputs['permission_title'], config('jetstream.guard'));

        $message = 'Permission saved successfully!';
        if(!$permission->wasRecentlyCreated){
            $message = 'Permission already exist.';
        }
        return redirect()->route('users.index')->with('success', $message);
    }
    
    public function store_role(Request $request)
    {
        $inputs = $request->all();
        
        $role = Role::findByParam(['name' =>$inputs['role_title']]);
        if(isset($inputs['role_permissions']) and !empty($inputs['role_permissions']) and is_array($inputs['role_permissions'])){
            $role->syncPermissions($inputs['role_permissions']);
        }
        return redirect()->route('users.index')->with('success', 'Role saved successfully!');
    }

    public function get_role($id)
    {
        $role = Role::find($id);
        $role['permissions'] = $role->permissions->pluck('id');
        return response()->json($role);
    }

    public function delete_role($id){
        $role = Role::findById($id);
        $permissions = $role->permissions;
        $role->revokePermissionTo($permissions);
        $role->delete();
        return redirect()->route('users.index')->with('message', 'Role destroyed!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Throwable;

class UserController extends Controller
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
    public function index(Request $request)
    {
        if($request->get('page')){
            $search = $request->input('q');
            $per_page = $request->input('per_page');
            if($search){
                $users = User::where('name', 'like', '%'.$search.'%')->orWhere('code', 'like', '%'.$search.'%')->with('roles')->paginate($per_page ? $per_page : 15);
            }else{
                $users = User::with('roles')->paginate($per_page ? $per_page : 15);
            }
            return $users;
        }
        $users = User::with('roles')->get();
        return Inertia::render('Users/Index', [ 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::getPermissions();
        return Inertia::render('Users/Create', [
            'roles' => $roles,
            'permissions' => $permissions
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
        $inputs = $request->all();

        $user = User::firstOrCreate(['email' => $inputs['email']],[
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password'])
        ]);
        
        if($user->wasRecentlyCreated){
            if($inputs['role']){
                $role = Role::findOrCreate($inputs['role'], 'web');
                $user->assignRole($role);
            }
            return redirect()->route('users.index')->with('success', 'User stored succefully.'); 
        }

        return redirect()->route('users.index')->with('error', 'User already exist!');

        
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
        $user = User::find($id);
        if(empty($user)){
            return redirect()->route('users.index')->with('error', __('Can not find the user!'));
        }
        $roles = Role::all();
        $user_roles = $user->getRoleNames();
        $userRoles = array();
        foreach($roles as $role){
            $userRoles[$role->id]['id'] = $role->id;
            $userRoles[$role->id]['name'] = $role->name;
            if(in_array($role->name, $user_roles->toArray())){
                $userRoles[$role->id]['selected'] = true;
            }
        }

        return inertia()->render('Users/Edit', ['user' => $user, 'roles' => $userRoles]);
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
        $inputs = $request->all();
        $user = User::find($id);
        if(empty($user)){
            return redirect()->route('users.index')->with('error', __('Can not find the user!'));
        }
        $user->update($inputs);

        if($inputs['role']){
            $role = Role::findOrCreate($inputs['role'], 'web');
            $user->assignRole($role);
        }
        return redirect()->route('users.index')->with('success', 'User updated succefully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(empty($user)){
            return redirect()->route('users.index')->with('error', __('Can not find the user!'));
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted succefully.'); 
    }
}

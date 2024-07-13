<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){

         $roles = Role::get();
        return view("roles-permissions.roles.index", [  "roles" =>  $roles ]);
    }
    
    public function create(){
        return view("roles-permissions.roles.create");

    }
    
    public function store(Request $request){
        $request->validate([
                'name'=>['required', 'string' , 'unique:roles,name']
        ]);
         $role = Role::create(['name' => $request->name]);

        return redirect('/roles')->with("status", "role is created successfully");

    }

    public function edit(Role  $role){
        // dd( $role);
        return view("roles-permissions.roles.edit", ['role'=> $role]);
    }

    public function update(Request $request ,Role  $role ){
        $request->validate([
            'name'=>['required', 'string' , 'unique:roles,name,'. $role->id]
        ]);
         $role->update(['name' => $request->name]);

        return redirect('/roles')->with("status", "role is updated successfully");
    }

    public function destroy(Role  $role)
    {
        $role->delete();
        return redirect("/roles");
    }

    public function AddPermissionToRole($roleId){
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table("role_has_permissions")
                                ->where('role_has_permissions.role_id' ,$roleId )
                                ->pluck('permission_id')
                                ->all();
        return view("roles-permissions.roles.add-permission",  [
            'role'=> $role,
            "permissions"=>  $permissions ,
            "rolePermissions"=> $rolePermissions
        ]);
    }

    public function storePermissionToRole(Request $request , $roleId){
        $role = Role::findOrFail($roleId);
        // dd($request->permissions);
        $role->syncPermissions($request->permissions);
        return redirect("/roles")->with("status", "Permissions added to the role");

    }
}

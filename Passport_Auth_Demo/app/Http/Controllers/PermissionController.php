<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index(){

        $permissions = Permission::get();
        return view("roles-permissions.permissions.index", [  "permissions" => $permissions ]);
    }
    
    public function create(){
        return view("roles-permissions.permissions.create");

    }
    
    public function store(Request $request){
        $request->validate([
                'name'=>['required', 'string' , 'unique:permissions,name']
        ]);
        $permission = Permission::create(['name' => $request->name]);

        return redirect('/permissions')->with("status", "permission is created successfully");

    }

    public function edit(Permission $permission){
        // dd($permission);
        return view("roles-permissions.permissions.edit", ['permission'=>$permission]);
    }

    public function update(Request $request ,Permission $permission ){
        $request->validate([
            'name'=>['required', 'string' , 'unique:permissions,name,'.$permission->id]
        ]);
        $permission->update(['name' => $request->name]);

        return redirect('/permissions')->with("status", "permission is updated successfully");
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect("/permissions");
    }
}

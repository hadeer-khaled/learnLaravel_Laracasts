<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Resources\UserResource;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $users = User::get();
        return view("roles-permissions.users.index", [  "users" =>  $users ]);
    }
    public function create(Request $request)
    {
        $roles = Role::get();
        return view("roles-permissions.users.create" , ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'string' ],
            'email'=>['required', 'string' , 'unique:users,email'],
            'password'=>['required'],
            'roles'=>['required'],
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),

        ]);

        $user->syncRoles($request->roles);



        return redirect('/users')->with("status", "user is created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }
    public function edit(User  $user)
    {
        $roles = Role::get();
        
        $userRoles = $user->getRoleNames()->toArray();
        // dd( $userRoles);
        return view("roles-permissions.users.edit", ['user'=> $user , 'roles' => $roles , 'userRoles' => $userRoles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($user);
        $validatedData = $request->validate([
            "name"=>['required','string'],
            'email'=>['required', 'string' , 'unique:users,email,'.$user->id],
            "roles"=>['required', 'array'],
        ]);
        // dd($validatedData);
        

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        $user->syncRoles($request->roles);

        
        return redirect('/users')->with("status", "user is updated successfully");



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect("/users");

    }
}

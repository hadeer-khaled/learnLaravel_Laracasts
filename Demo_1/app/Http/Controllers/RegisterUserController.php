<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("create user");
        return view("auth.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("store user");
        // return $request->all();
        $validatedData = request()->validate([
                "name"=> ["required"],
                "email"=> ["required", "email"],
                //'confirmed' ==? search for password_confirmation field and make sure the match the password field
                "password"=> ["required", Password::min(5) , 'confirmed'], 

        ]);

        $user = User::create($validatedData);
        
        Auth::login($user);

        return redirect("/posts");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //

    }
}

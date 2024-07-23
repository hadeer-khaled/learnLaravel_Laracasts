<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterationController extends Controller
{
    public function create(){
        return view("auth.register");
    }
    

    public function store(){
        $validatedData = request()->validate([
            "name"=> ["required"],
            "email"=> ["required", "email"],
            //'confirmed' ==? search for password_confirmation field and make sure that match the password field
            "password"=> ["required", Password::min(5) , 'confirmed'], 

    ]);

    $user = User::create($validatedData);

    Auth::login( $user );

    return redirect("/");


    }
}

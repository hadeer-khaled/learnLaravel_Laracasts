<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create(){
        return view("auth.login");
    }
    
    public function store(){
       
        $validatedAttributes = request()->validate([
            'email' => ['required'],
            'password' => ['required' ]
        ]);
                
        if(! Auth::attempt($validatedAttributes)){
            throw ValidationException::withMessages([
                "email"=> "email or password are wrong",
                "password"=> "email or password are wrong"
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy(){
       
        Auth::logout();
        return redirect("/");
    }
}

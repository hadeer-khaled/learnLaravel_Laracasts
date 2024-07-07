<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        // dd("login user");
        return view("auth.login");
    }

    public function store()
    {
        // dd("store logged user");
        // return request()->all();
        // return view("auth.login");

        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required' ]
        ]);
                
        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                "email"=> "email or password are wrong",
                "password"=> "email or password are wrong"
            ]);
        }

        request()->session()->regenerate();

        return redirect('/posts');

    }


    public function destroy()
    {
       Auth::logout();
       return redirect("/posts");

    }

}

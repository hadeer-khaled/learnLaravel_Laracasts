<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ApiController extends Controller
{


    // POST
    public function register (Request $request){
        $validatedAttributes = $request->validate([
                "name"=> ['required'],
                "email"=>['required', 'email' , 'unique:users'],
                "password"=>['required','confirmed']
            ]);

        $user = User::create($validatedAttributes);

        return response()->json([
            "status"=>200,
            "message"=>"user registered successfully",
            "date"=>$user
        ]);
    }

    // POST
    public function login (Request $request){

        $validatedAttributes = $request->validate([
            "email"=>['required', 'email'],
            "password"=>['required']
        ]);

        $loginStatus = Auth::attempt($validatedAttributes);

        if($loginStatus){
            $user = Auth::user();
            $token = $user->createToken('loginToken')->accessToken ;

            return response()->json([
                "status"=>200,
                "message"=>"user logged in successfully",
                "date"=>$user,
                "token"=>$token
            ],200);
        }

        return response()->json([
            "status"=>401 ,
            "message"=>"credentials don't match",

        ],401);




    }

    // GET
    public function profile (Request $request){

    }
    // GET
    public function logout (Request $request){

    }
}

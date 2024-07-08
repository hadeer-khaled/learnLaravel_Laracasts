<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    }

    // GET
    public function profile (Request $request){

    }
    // GET
    public function logout (Request $request){

    }
}

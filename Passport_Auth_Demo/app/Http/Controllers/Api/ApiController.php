<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Utils\PassportHelpers;
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
            "data"=>$user
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
            // dd($request->password);
            $tokens = PassportHelpers::generateTokens( $request->email,  $request->password);
            $user["access_token"] = $tokens["access_token"];
            $user["refresh_token"] = $tokens["refresh_token"];
            // $accessToken = $user->createToken('loginToken')->accessToken ;
            return response()->json([
                "status"=>200,
                "message"=>"user logged in successfully",
                "data"=>$user,
                // "accessToken"=>$accessToken
                // "tokens"=>$tokens
            ],200);
        }

        return response()->json([
            "status"=>401 ,
            "message"=>"credentials don't match",

        ],401);

    }

    // GET
    public function profile (Request $request){
            $user = Auth::user();

            return response()->json([
                "status"=>200,
                "message"=>"Profile Information",
                "data"=> $user
            ]);
    }
    // GET
    public function logout (Request $request){
        
        $user = Auth::user();

        if ($user) {
            $user->token()->revoke();
    
            return response()->json([
                'status' => 200,
                'message' => 'User logged out successfully',
            ]);
        }
    
        return response()->json([
            'status' => 401,
            'message' => 'User not authenticated',
        ], 401);
    }

    public function getRefreshToken(Request $request){
        $tokens = PassportHelpers::refreshToken( $request->refresh_token);
        return response()->json([
            "status"=>200,
            "message"=>"Token refreshed successfully",
            "data"=> $tokens
        ]);
      
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User ;
class ResetPasswordController extends Controller
{
    // public function forgetPassword(Request $request){
    //     $validatedData= $request->validate([
    //         "email"=>["required", "exists:users,email"]
    //     ]);

    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );
    //     dd($status);
    // }
    public function forgetPassword(){
        return view('forget-password');
    }

    public function sendResetPasswordLink(Request $request){
        $validatedData= $request->validate([
                    "email"=>["required", "exists:users,email"]
        ]);
        $token = Str::random(64);

        DB::table("password_reset_tokens")->insert([
            "email"=>$request->email,
            "token"=> $token
        ]);

        Mail::send("emails.forget-password" , [ 'token' => $token] , function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route("password.forget"));

    }

    public function ResetPassword($token){
        return view('new-password',[ 'token' => $token]);
    }
    public function ResetPasswordPost(Request  $request){
        $validatedData=  $request->validate([
            "email"=>["required", "email", "exists:users,email"],
            "password"=>["required", "confirmed"],
            "password_confirmation"=>["required"]
        ]);
        // dd(  $validatedData);
        $updatePassword= DB::table('password_reset_tokens')->where([
            "email"=>$request->email,
            "token"=> $request->token
        ]);
           
        if (! $updatePassword) {
            return redirect()->to(route("reset-password")) ;
        }
        User::where("email",$request->email)->update(["password" => Hash::make($request->password)]) ;
                    
    }
}

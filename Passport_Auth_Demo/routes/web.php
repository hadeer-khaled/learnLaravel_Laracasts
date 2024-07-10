<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/forget-password', [ResetPasswordController::class , "forgetPassword"])->name('password.forget');
Route::post('/send-reset-password-link', [ResetPasswordController::class , "sendResetPasswordLink"])->name('password.send.reset');
Route::get('/reset-password/{token}',  [ResetPasswordController::class , "ResetPassword"])->name('password.reset');
Route::post('/reset-password',  [ResetPasswordController::class , "ResetPasswordPost"])->name('password.reset.post');

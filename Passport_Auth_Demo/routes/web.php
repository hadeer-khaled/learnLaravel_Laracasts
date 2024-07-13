<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['auth', 'role:super_admin|admin']], function(){

    Route::get('/forget-password', [ResetPasswordController::class , "forgetPassword"])->name('password.forget');
    Route::post('/send-reset-password-link', [ResetPasswordController::class , "sendResetPasswordLink"])->name('password.send.reset');
    Route::get('/reset-password/{token}',  [ResetPasswordController::class , "ResetPassword"])->name('password.reset');
    Route::post('/reset-password',  [ResetPasswordController::class , "ResetPasswordPost"])->name('password.reset.post');
    
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/roles', RoleController::class);
    Route::get('/roles/{roleId}/give-permission',[ RoleController::class , 'AddPermissionToRole'] );
    Route::put('/roles/{roleId}/store-permission',[ RoleController::class , 'storePermissionToRole'] );
    
    Route::resource('/users', UserController::class);
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
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

// Method 1
// Route::get("/posts" , [PostController::class , 'index'])->name('posts.index');
// Route::get("/posts/create" , [PostController::class , 'create'])->name('posts.create');
// Route::get("/posts/{post}" , [PostController::class , 'show'])->name('posts.show');
// Route::post("/posts" , [PostController::class , 'store'])->name('posts.store');
// Route::get('/posts/{post}/edit', [PostController::class , 'edit'] )->name('posts.edit');
// Route::patch('/posts/{post}',  [PostController::class , 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class , 'destroy'])->name('posts.delete');

// Method 2
// Route::controller(PostController::class)->group(function(){
//     Route::get("/posts" , [PostController::class , 'index'])->name('posts.index');
//     Route::get("/posts/create" , [PostController::class , 'create'])->name('posts.create');
//     Route::get("/posts/{post}" , [PostController::class , 'show'])->name('posts.show');
//     Route::post("/posts" , [PostController::class , 'store'])->name('posts.store');
//     Route::get('/posts/{post}/edit', [PostController::class , 'edit'] )->name('posts.edit');
//     Route::patch('/posts/{post}',  [PostController::class , 'update'])->name('posts.update');
//     Route::delete('/posts/{post}', [PostController::class , 'destroy'])->name('posts.delete');
// });

//Method 3
Route::Resource("posts" , PostController::class);

// Route::Resource("posts" , PostController::class , [
    // "only"=>['index' , 'show']
    // "except"=>['index' , 'show']
// ]);


//Auth 
Route::get('/register' ,  [RegisterUserController::class , 'create'])->name("regiter.create");
Route::post('/register' ,  [RegisterUserController::class , 'store'])->name("regiter.store");

Route::get('/login' , [SessionController::class , 'create'])->name("login.create");
Route::post('/login' , [SessionController::class , 'store'])->name("login.store");
Route::post('/logout' , [SessionController::class , 'destroy'])->name("logout");
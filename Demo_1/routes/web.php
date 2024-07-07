<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/posts', function () {
    // dd('test');
    // return view("posts.index");
    // $posts = Post::all();
    $posts = Post::latest()->get(); //order by the created at in asc 
    return $posts ;
});

Route::get('/posts/create', function () {
    // dd('test');
    return view("posts.create");
});
Route::get('/posts/{id}', function ($id) {
    // $post = Post::find($id);
    // return view("posts.show", ["posts" => $post]);
});


Route::post('/posts', function () {
    // dd('test');
    // return "Post submitted succesfully ";
    // return request("title");
    // return request()->all();

    Post::create([
        'title'=>request('title'),
        'content'=>request('content')
    ]);

    return redirect("/posts");
});
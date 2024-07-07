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


// index
Route::get('/posts', function () {
    // dd('test');
    // return view("posts.index");
    // $posts = Post::all();
    $posts = Post::latest()->get(); //order by the created at in asc 
    // return $posts ;
    return view('posts.index' , ["posts"=>$posts]);
});

// create
Route::get('/posts/create', function () {
    // dd('test');
    return view("posts.create");
})->name('posts.create');

// show
Route::get('/posts/{id}', function ($id) {
    // dd($id);
    $post = Post::findOrFail($id);
    return view("posts.show", ["post" => $post]);
});

// store
Route::post('/posts', function () {
    // dd('test');
    // return "Post submitted succesfully ";
    // return request("title");
    // return request()->all();


    request()->validate([
            'title'=>['required', 'min:3'],
            'content'=>['required']
    ]);

    Post::create([
        'title'=>request('title'),
        'content'=>request('content')
    ]);

    return redirect("/posts");
});

// edit
Route::get('/posts/{id}/edit', function ($id) {
    $post = Post::find($id);
    return view("posts.edit", ["post" => $post]);
})->name('posts.edit');


// update
Route::patch('/posts/{id}', function ($id) {

    request()->validate([
        'title'=>['required','min:3'],
        'content'=>['required']
    ]);

 
    $post = Post::findOrFail($id);

    // $post->title = $request->input('title');
    // $post->content = $request->input('content');
    // $post->save();

    $post->update([
        'title'=>request('title'),
        'content'=>request('content'),
    ]);

    return redirect("/posts/".$id);

})->name('posts.update');

// delete
Route::delete('/posts/{id}', function ($id) {
    $post =  Post::findOrFail($id);
    $post->delete();
    return redirect("/posts/");

})->name('posts.delete');
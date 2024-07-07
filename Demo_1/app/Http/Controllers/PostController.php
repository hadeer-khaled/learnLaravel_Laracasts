<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get(); //order by the created at in asc 
        return view('posts.index' , ["posts"=>$posts]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request , Post $post)
    {
        request()->validate([
                'title'=>['required', 'min:3'],
                'content'=>['required']
        ]);

        Post::create([
            'title'=>request('title'),
            'content'=>request('content')
        ]);

        return redirect("/posts");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.edit", ["post" => $post]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
       
            request()->validate([
                'title'=>['required','min:3'],
                'content'=>['required']
            ]);

        
            // $post = Post::findOrFail($id);

            // $post->title = $request->input('title');
            // $post->content = $request->input('content');
            // $post->save();

            $post->update([
                'title'=>request('title'),
                'content'=>request('content'),
            ]);

            return redirect("/posts/".$id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect("/posts/");
    }
}

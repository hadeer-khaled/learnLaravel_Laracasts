<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Http\Resources\PostResource ;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return response()->json([
            "status" => 200,
            "data" => PostResource::collection(Post::all()) 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>['required'],
            "content"=>['required']
        ]);

        $post =Post::create([
            "title"=>$request->input('title'),
            "content"=>$request->input('content'),
            "user_id"=>Auth::user()->id,
        ]);

        return response()->json([
            "status"=>200,
            "message"=> "post created successfully",
            "data"=> new PostResource($post )
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return response()->json([
            "status"=>200,
            "message"=> "post retrieved successfully",
            "data"=> new PostResource($post )
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
         
        $validatedData = $request->validate([
            "title"=>['required'],
            "content"=>['required']
        ]);
    
        $post->update($validatedData);
    
        $post->refresh();
    
        return response()->json([
            "status" => 200,
            "message" => "Post updated successfully",
            "data" => new PostResource($post)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

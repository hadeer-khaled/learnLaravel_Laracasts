<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Resources\UserResource;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
           "status"=>200,
           "data" => UserResource::collection(User::all())
        ]);
    }
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            "name"=>['required'],
            "email"=>['required']
        ]);

        $user->update($validatedData);

        $user->refresh();

        return response()->json([
            "status" => 200,
            "message" => "User updated successfully",
            "data" => new UserResource($user)
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return response()->json([
            "status" => 200,
            "message" => "User deleted successfully",
        ]);

    }
}

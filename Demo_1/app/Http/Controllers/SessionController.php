<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        // dd("login user");
        return view("auth.login");
    }

    public function store()
    {
        // dd("store logged user");
        return request()->all();
        // return view("auth.login");
    }

}

<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function store()
    {
        $user = $this->origami->post('users', request()->all());

        return response()->json($user);
    }

    public function login()
    {
        $this->origami->login(request()->get('email'), request()->get('password'));

        return response()->json();
    }
}
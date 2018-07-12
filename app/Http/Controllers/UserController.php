<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function store()
    {
        $user = $this->origami->post('users', request()->all());

        return response()->json($user);
    }
}
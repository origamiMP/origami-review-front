<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

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

    public function current()
    {
        $currentUser = session('current_user');

        if (!$currentUser && session('api_token')) {
            $currentUser = $this->origami->get('me', ['include' => 'organization']);
            Session::put('current_user', $currentUser);
        }

        return response()->json($currentUser);
    }
}
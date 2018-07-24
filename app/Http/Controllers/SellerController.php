<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    public function index()
    {
        $seller = $this->origami->get('sellers', request()->all());

        return response()->json($seller);
    }

    public function show($id)
    {
        $seller = $this->origami->get('sellers/'.$id, ['include' => 'reviews']);

        return response()->json($seller);
    }

    public function update($id)
    {
        $response = $this->origami->put('sellers/'.$id, request()->all());
        Session::forget('current_user');

        return response()->json($response);
    }
}
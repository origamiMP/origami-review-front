<?php

namespace App\Http\Controllers;

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
}
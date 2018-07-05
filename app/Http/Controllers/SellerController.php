<?php

namespace App\Http\Controllers;

class SellerController extends Controller
{
    public function show($id)
    {
        $seller = $this->origami->get('sellers/'.$id, ['include' => 'reviews']);

        return response()->json($seller);
    }
}
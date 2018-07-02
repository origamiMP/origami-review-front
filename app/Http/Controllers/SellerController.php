<?php

namespace App\Http\Controllers;

class SellerController extends Controller
{
    public function show($id)
    {
        $seller = $this->origami->get('sellers/'.$id);

        return response()->json($seller);
    }
}
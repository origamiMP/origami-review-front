<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class MarketplaceController extends Controller
{
    public function index()
    {
        $marketplaces = $this->origami->get('marketplaces', request()->all());

        return response()->json($marketplaces);
    }

    public function show($id)
    {
        $marketplace = $this->origami->get('marketplaces/'.$id, ['include' => 'reviews.order.seller']);

        return response()->json($marketplace);
    }

    public function update($id)
    {
        $response = $this->origami->put('marketplaces/'.$id, request()->all());
        Session::forget('current_user');

        return response()->json($response);
    }
}
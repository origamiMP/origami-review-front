<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function show($id)
    {
        $order = $this->origami->get('orders/'.$id, ['include' => 'marketplace.marketplace_criteria']);

        return response()->json($order);
    }
}
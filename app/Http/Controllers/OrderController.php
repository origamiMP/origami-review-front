<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function show($id)
    {
        $order = $this->origami->get('orders/'.$id, ['include' => 'marketplace.marketplace_criteria,review,seller']);

        return response()->json($order);
    }

    public function demoSimulate()
    {
        $response = $this->origami->post('orders/simulate', request()->all());

        return response()->json($response);
    }
}
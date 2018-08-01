<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = $this->origami->get('reviews', ['include' => 'review_state']);

        return response()->json($reviews);
    }

    public function show($id)
    {
        $reviews = $this->origami->get('reviews/'.$id, ['include' => 'review_comments,review_state,order.products,order.marketplace,order.seller,order.customer']);

        return response()->json($reviews);
    }

    public function store()
    {
        $response = $this->origami->post('reviews', request()->all());
        return response()->json($response);
    }
}
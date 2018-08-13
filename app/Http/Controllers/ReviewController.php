<?php

namespace App\Http\Controllers;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = $this->origami->get('reviews', ['include' => 'review_state']);

        return response()->json($reviews);
    }

    public function show($id)
    {
        $reviews = $this->origami->get('reviews/'.$id, ['include' => 'review_comments.author,review_state,order.products,order.marketplace,order.seller,order.customer']);

        return response()->json($reviews);
    }

    public function store()
    {
        $response = $this->origami->post('reviews', request()->all());
        return response()->json($response);
    }

    public function accept($id)
    {
        $response = $this->origami->post('reviews/'.$id.'/accept');
        return response()->json($response);
    }

    public function refuse($id)
    {
        $response = $this->origami->post('reviews/'.$id.'/refuse', request()->all());
        return response()->json($response);
    }
}
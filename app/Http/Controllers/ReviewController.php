<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = $this->origami->get('reviews', ['include' => 'review_comments']);

        return response()->json($reviews);
    }

    public function store()
    {
        $response = $this->origami->post('reviews', request()->all());
        return response()->json($response);
    }
}
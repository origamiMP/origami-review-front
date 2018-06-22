<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ReviewController extends Controller
{

    public function store()
    {
        $response = $this->origami->post('users', request()->all());
        return response()->json($response);
    }
}
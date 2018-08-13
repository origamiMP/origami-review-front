<?php

namespace App\Http\Controllers;

class ReviewCommentController extends Controller
{
    public function store($id)
    {
        $response = $this->origami->post('reviews/'.$id.'/comments', request()->all());
        return response()->json($response);
    }
}
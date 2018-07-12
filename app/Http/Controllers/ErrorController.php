<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jsonGetSessionError()
    {
        return view('front.errors._fails');
    }
}
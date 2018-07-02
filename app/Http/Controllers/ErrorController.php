<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class ErrorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jsonGetSessionError()
    {
        $fails = Session::get('fails');
        return view('errors._fails');
    }
}
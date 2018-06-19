<?php

namespace App\Http\Controllers;

use App\Services\OrigamiReviewApi;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $origami;

    /**
     * Create a new controller instance.
     *
     * @param OrigamiReviewApi $origami
     */
    public function __construct(OrigamiReviewApi $origami)
    {
        $this->origami = $origami;
    }

}

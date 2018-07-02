<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrigamiReviewApiException extends HttpException
{
    private $response;
    private $statusCode;

    public function __construct($responses, $statusCode)
    {
        $this->response = $responses;

        foreach($responses as $response) {
            Session::push('fails', $response);
        }
        $this->statusCode = $statusCode;
        parent::__construct($this->statusCode);
    }

    public function getResponse()
    {
        return $this->response;
    }
}
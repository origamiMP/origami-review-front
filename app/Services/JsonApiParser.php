<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Auth;

/**
 * Origami
 *
 * @class to call api
 */
class JsonApiParser
{
    private $response;
    private $arrayReturn;

    /**
     * Constructor
     * @param string $jsonApiResponse
     * @return array
     */
    public function parse(string $jsonApiResponse)
    {
        $this->response = json_decode($jsonApiResponse);
        $this->arrayReturn = $this->response->data->attributes;

        if (isset($this->response->data->relationships))
            $this->arrayReturn = $this->constructRelationship($this->response->data->relationships);

        return $this->arrayReturn;
    }

    private function constructRelationship($relationships, $context = null)
    {
        if (!$context)
            $context = $this->arrayReturn;

        foreach ($relationships as $key => $relationship) {
            if (is_array($relationship->data) > 0) {
                $idxs = array_keys(array_column($this->response->included, 'type'), $key);
                $array = [];
                foreach ($idxs as $cpt => $idx) {
                    $array[$cpt] = $this->response->included[$idx]->attributes;
                    if (isset($this->response->included[$idx]->relationships))
                        $array[$cpt] = $this->constructRelationship($this->response->included[$idx]->relationships, $array[$cpt]);
                }
                $context->$key = $array;
            } else {
                $idx = array_search($key . 's', array_column($this->response->included, 'type'));
                $context->$key = $this->response->included[$idx]->attributes;
                if (isset($this->response->included[$idx]->relationships))
                    $context->$key = $this->constructRelationship($this->response->included[$idx]->relationships, $context->$key);
            }
        }

        return $context;
    }
}
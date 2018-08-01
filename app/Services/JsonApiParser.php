<?php

namespace App\Services;

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
        if (is_array($this->response->data)) {
            foreach ($this->response->data as $data) {
                $arrayTmp = $data->attributes;
                $arrayTmp->id = $data->id;
                if (isset($data->relationships))
                    $arrayTmp = $this->constructRelationship($data->relationships, $arrayTmp);

                $this->arrayReturn[] = $arrayTmp;
            }
        } else {
            $this->arrayReturn = $this->response->data->attributes;
            $this->arrayReturn->id = $this->response->data->id;
            if (isset($this->response->data->relationships))
                $this->arrayReturn = $this->constructRelationship($this->response->data->relationships);
        }

        return $this->arrayReturn;
    }

    private function constructRelationship($relationships, $context = null)
    {
        if (!$context)
            $context = $this->arrayReturn;

        foreach ($relationships as $key => $relationship) {
            if (!isset($this->response->included))
                $context->$key = [];
            elseif (is_array($relationship->data) > 0) {
                $idxs = array_keys(array_column($this->response->included, 'type'), $key);
                $array = [];
                foreach ($idxs as $cpt => $idx) {
                    $array[$cpt] = $this->response->included[$idx]->attributes;
                    $array[$cpt]->id = $this->response->included[$idx]->id;
                    if (isset($this->response->included[$idx]->relationships))
                        $array[$cpt] = $this->constructRelationship($this->response->included[$idx]->relationships, $array[$cpt]);
                }
                $context->$key = $array;
            } else {
                $idx = array_search($key . 's', array_column($this->response->included, 'type'));
                $context->$key = $this->response->included[$idx]->attributes;
                $context->$key->id = $this->response->included[$idx]->id;
                if (isset($this->response->included[$idx]->relationships))
                    $context->$key = $this->constructRelationship($this->response->included[$idx]->relationships, $context->$key);
            }
        }

        return $context;
    }
}

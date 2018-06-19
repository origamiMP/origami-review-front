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
class OrigamiReviewApi
{
    private $api_params;
    private $batch = ['requests' => []];
    private $client;

    private static $debug_request_count = 0;


    /**
     * Constructor
     *
     * @param $api_params
     * @internal param $api ( parameters of api )
     */
    public function __construct()
    {
        $this->api_params = config('api');


        $this->client = new Client([
            'base_uri' => $this->api_params['base_uri']
        ]);

    }

    /**
     * GET request
     *
     * @param  string $resource API resource endpoint
     * @param  array|null $params array of parameters
     * @param bool $batch
     * @return JsonApiParser
     */
    public function get($resource, array $params = null, $batch = false)
    {
        // convert to get params
        if (!$batch) $params = ['query' => $params];
        return $this->callApi('get', $resource, $params, $batch);
    }


    /**
     * POST request
     *
     * @param  string $resource API resource endpoint
     * @param  array|null $params object to post
     * @param bool $batch
     * @return JsonApiParser
     */
    public function post($resource, array $params = null, $batch = false)
    {
        if (!$batch) $params = ['json' => $params];
        return $this->callApi('post', $resource, $params, $batch);
    }


    /**
     * PUT request
     *
     * @param  string $resource API resource endpoint
     * @param  array|null $params object to put
     * @param bool $batch
     * @return JsonApiParser
     */
    public function put($resource, array $params = null, $batch = false)
    {
        if (!$batch) $params = ['json' => $params];
        return $this->callApi('put', $resource, $params, $batch);
    }

    /**
     * PATCH request
     *
     * @param  string $resource API resource endpoint
     * @param  array|null $params object to patch
     * @param bool $batch
     * @return JsonApiParser
     */
    public function patch($resource, array $params = null, $batch = false)
    {
        if (!$batch) $params = ['json' => $params];
        return $this->callApi('patch', $resource, $params, $batch);
    }

    /**
     * DELETE request
     *
     * @param  string $resource API resource endpoint
     * @param  array|null $params array of parameters
     * @param bool $batch
     * @return JsonApiParser
     */
    public function delete($resource, array $params = null, $batch = false)
    {
        if (!$batch) $params = ['query' => $params];
        return $this->callApi('delete', $resource, $params, $batch);
    }

    public function batch()
    {
        $params = ['json' => $this->batch];
        $this->batch = ['requests' => []];
        return $this->callApi('post', 'batch', $params, false);
    }

    /**
     * Call api
     * Generic fonction to make API calls
     *
     * @param string $method
     * @param  string $resource api endpoint
     * @param  array|null $params array of parameters
     * @param $batch
     * @return JsonApiParser
     */
    protected function callApi($method, $resource, array $params = null, $batch)
    {
        if ($batch) {
            if (!empty($this->api_params['version']))
                $resource = $this->api_params['version'] . '/' . $resource;

            $request = [
                'method' => $method,
                'url' => $resource,
                'params' => $params
            ];
            array_push($this->batch['requests'], $request);
            return true;
        } else {
            return $this->make_request($method, $resource, $params);
        }
    }

    /**
     * @param $method
     * @param $resource
     * @param $params
     * @return JsonApiParser
     */
    protected function make_request($method, $resource, $params)
    {
        static::$debug_request_count++;

        // display request debug
        \Log::debug('[API Request][#' . static::$debug_request_count . '] '
            . $method . ' '
            . $resource . ': '
            . (isset($params['json']['file_content']) ? '[FILE_CONTENT: ' . strlen($params['json']['file_content']) . ' char]' : json_encode($params, JSON_PRETTY_PRINT))
        );

        $headers = [
            'Accept' => 'application/json',
            'content-type' => 'application/json'
        ];

        // If route with auth -> put token in Authorization header
        $apiToken = session('api_token');
        if ($apiToken)
            $headers['Authorization'] = 'Bearer ' . $apiToken;

        $params = array_merge(['http_errors' => false, 'headers' => $headers], $params);

        if (!empty($this->api_params['version']))
            $resource = $this->api_params['version'] . '/' . $resource;

        $response = null;

        try {
            $response = $this->client->request($method, $resource, $params);
        } catch (GuzzleException $e) {
        }

        if ($response && $response->getStatusCode() == 401) {
            session()->forget('access_token');
            session()->push('logout_error', 'true');
            Auth::logout();
            abort(401);
        }
        $response = $response->getBody()->getContents();
        return (new JsonApiParser())->parse($response);
    }
}

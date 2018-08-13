<?php

namespace App\Services;

use App\Exceptions\OrigamiReviewApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Session;

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
     * @return array|bool
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
     * @return array|bool
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
     * @return array|bool
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
     * @return array|bool
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
     * @return array|bool
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
     * @return array|bool
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
     * @return array
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

        $statusCode = $response->getStatusCode();
        $response = $response->getBody()->getContents();

        \Log::info(print_r($response, true));

        if (in_array($statusCode, [400, 404, 422, 500]))
            throw new OrigamiReviewApiException(json_decode($response), $statusCode);
        elseif ($statusCode == 401)
            throw new OrigamiReviewApiException([$response], $statusCode);
        elseif ($statusCode == 204)
            return [];

//        dd(json_decode($response));

        return (new JsonApiParser())->parse($response);
    }

    public function login($email, $password)
    {
        $params = [
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'content-type' => 'application/json'
            ],
            'json' => [
                'grant_type' => 'password',
                'client_id' => env('API_CLIENT_ID', 1),
                'client_secret' => env('API_CLIENT_SECRET', 'secret'),
                'username' => $email,
                'password' => $password
            ]
        ];

        $response = $this->client->post('v1/oauth/token', $params);

        $statusCode = $response->getStatusCode();
        $response = json_decode($response->getBody()->getContents());

        if (in_array($statusCode, [400, 401, 404, 422, 500]))
            throw new OrigamiReviewApiException($response, $statusCode);

        Session::put('api_token', $response->access_token);
    }

    public function logout()
    {
        Session::forget('api_token');
        Session::forget('current_user');
    }
}

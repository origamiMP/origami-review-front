<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ReviewController extends Controller
{

    public function store()
    {
        $params = request()->all();
        $client = new Client();
        try {
            $params = [
                'headers' => [
                    'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjhjODM2OWZhNGIwZThkZGE0YzRhODg0MGEyNjIzMTAyZDc3YjBiMGU0NTM3ZGE4MmU4YWI5Yzk1NTA0MDM3NTVmMWVlZmUyNTAxNWRjM2YwIn0.eyJhdWQiOiIyIiwianRpIjoiOGM4MzY5ZmE0YjBlOGRkYTRjNGE4ODQwYTI2MjMxMDJkNzdiMGIwZTQ1MzdkYTgyZThhYjljOTU1MDQwMzc1NWYxZWVmZTI1MDE1ZGMzZjAiLCJpYXQiOjE1MjgyNzQ5NzEsIm5iZiI6MTUyODI3NDk3MSwiZXhwIjoxNTU5ODEwOTcxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.B7X4D3XCjuEkmEJMAaAvxwLn-M4IeuBAuwe8CZDVxetmGOpHMvILLBrlT94s0XSbkv_LLe84FG7FZP7NUKfYsLXUC-do3H-kJKZ0IjsH6KuhPIZfOKcUR2l85e00IzodX9BzEjY8JG1pv2MyKES93NsblXzqqqSL7T1ydwVKkCj0KS9f55m5_FJdfLotMRm4WguGVw_qXL8urgJ3lIxoJLxVkj__zYy8XkvgPWrOuxASxUTZGxFS-huEE9YhQyTNqfQrFSqRLjmS5EqPJjVzS9CuyDzRMowK-J2KOAuIzOqQI0j-VYUipMZPz7otV-ApbYJHNzKvfFw4nN1a6OmKkGiPYHR74CTXR9KntGIarEBSBdcQDR5GXGHivPRYLuw-NdMTFgKumlioTsoBxfOh0R-9WZjPLbS-K4OrTyE7aoYiwGDnN9rmhkX5EhI9iWJTfcGzgVKFW8HIDyUqLigLj_gL4RywHmZS3fkHMuPhxIkb2XzA1wBtbqIUwe78KQCIgZsnRxkhTtjm3cFSnAihKA9KYYmLKFDYV2AfI8N7-5zIp5pGkSkb950IxDK9u68f0KFilRgvUZqzkMzkgyjlbE0Hu664pnDREhhYvZuYmav7-khqnnkI4ScSZnjI06BeJ2zVht0G3ODNCb7w-qa6lBG6X5KngWnpsbbH5ecxiQw',
                    'Accept' => 'application/json',
                    'content-type' => 'application/json'
                ],
                'query' => $params
            ];
            $res = $client->request('POST', 'http://172.18.0.1:8092/v1/users', $params);
            return response()->json(json_decode($res->getBody()->getContents()));
        } catch (GuzzleException $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
}
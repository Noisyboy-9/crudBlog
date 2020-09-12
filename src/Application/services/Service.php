<?php


namespace App\Application\services;

use Psr\Http\Message\ResponseInterface as Response;

class Service
{
    protected function responseWithJson(array $data, Response $response)
    {
        $json = json_encode($data);
        $response->getBody()->write($json);
        return $response->withHeader('Content-type', 'application/json');
    }
}
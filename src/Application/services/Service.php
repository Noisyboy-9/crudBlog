<?php


namespace App\Application\services;

use Psr\Http\Message\ResponseInterface as Response;

class Service
{

    /**
     * handle sending http response with a json format
     *
     *
     * @param array $data
     * @param Response $response
     * @return Response
     */
    protected function responseWithJson(array $data, Response $response)
    {
        $json = json_encode($data);
        $response->getBody()->write($json);
        return $response->withHeader('Content-type', 'application/json');
    }
}
<?php


namespace App\Infrastructure\DatabaseConnections;


use DI\Container;
use MongoDB\Client;

abstract class MongoDB
{
    public $database;

    public function mongoConnection(Container $container)
    {
        $mongo = new Client("mongodb://localhost:27017");
        $this->database = $mongo->selectDatabase('blog');
    }
}
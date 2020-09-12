<?php


namespace App\Infrastructure\Persistance\Blog\MongoDB;


use App\Infrastructure\DatabaseConnections\MongoDB;
use DI\Container;

class BlogMongoDB extends MongoDB
{
    /**
     *  post collection in mongoDB
     *
     * @var $postCollection
     */
    public $postCollection;

    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {
        $this->mongoConnection(new Container());

        $this->postCollection = $this->database->selectCollection('posts');
    }

    public function getAllPosts()
    {
        return $this->postCollection->find();
    }

}
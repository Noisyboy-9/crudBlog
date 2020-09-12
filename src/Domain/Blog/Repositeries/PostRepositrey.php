<?php


namespace App\Domain\Blog\Repositeries;


use App\Infrastructure\Persistance\Blog\MongoDB\BlogMongoDB;

class PostRepositrey extends BlogMongoDB implements PostRepositreyInterface
{

    private $db;

    public function __construct($database)
    {
        $this->database = $database;
    }

    /**
     * get all posts in the db
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->database->getAllPosts()->toArray();
    }
}
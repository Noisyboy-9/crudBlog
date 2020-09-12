<?php


namespace App\Domain\Blog\Repositeries;


use App\Domain\Blog\Post;
use App\Domain\Blog\ValueObjects\PostIdValueObject as IdValueObj;

class PostRepositrey implements PostRepositreyInterface
{

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

    /**
     * get a post by its id
     *
     * @param IdValueObj $idValueObject
     * @return mixed
     */
    public function getById(IdValueObj $idValueObject)
    {
        $id = $idValueObject->getId();
        return $this->database->getPostById($id)->toArray();
    }

    public function create(Post $post)
    {
        return $this->database->createPost($post->getPostArray());
    }
}
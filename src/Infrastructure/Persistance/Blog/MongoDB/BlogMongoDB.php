<?php


namespace App\Infrastructure\Persistance\Blog\MongoDB;


use App\Infrastructure\DatabaseConnections\MongoDB;
use DI\Container;
use MongoDB\BSON\ObjectId;
use MongoDB\Model\BSONDocument;

class BlogMongoDB extends MongoDB
{
    /**
     *  post collection in mongoDB
     *
     * @var $postCollection
     */
    public $postCollection;


    /**
     * BlogMongoDB constructor for making a connection to mongodb
     */
    public function __construct()
    {
        $this->connection();
    }

    /**
     * handle connection to mongo db and select and svae postsCollection as a property
     *
     *
     */
    public function connection()
    {
        $this->mongoConnection(new Container());

        $this->postCollection = $this->database->selectCollection('posts');
    }

    /**
     * get all posts in the db
     *
     * @return BSONDocument
     */
    public function getAllPosts()
    {
        return $this->postCollection->find();
    }

    /**
     * get a post specified by id
     *
     * @param string $id
     * @return mixed
     */
    public function getPostById(string $id)
    {
        $id = new ObjectId($id);
        return $this->postCollection->find(['_id' => $id]);
    }

    /**
     * create a post
     *
     * @param array $post
     * @return array $postWithId
     */
    public function createPost(array $post)
    {
        $insertId = $this->postCollection->insertOne($post)->getInsertedId();
        $post['_id'] = $insertId;
        return $post;
    }
}
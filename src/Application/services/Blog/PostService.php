<?php


namespace App\Application\services\Blog;


use App\Application\services\Service;
use App\Domain\Blog\Repositeries\PostRepositrey;
use App\Infrastructure\Persistance\Blog\MongoDB\BlogMongoDB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PostService extends Service
{
    /**
     * @var PostRepositrey
     */
    private $postRepositrey;

    public function __construct()
    {
        $this->postRepositrey = new PostRepositrey(new BlogMongoDB());
    }

    /**
     * show all posts
     *
     *
     */
    public function index(Request $request, Response $response)
    {
        $posts = $this->postRepositrey->getAll();
        return $this->responseWithJson($posts, $response);
    }
}
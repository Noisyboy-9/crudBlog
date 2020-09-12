<?php


namespace App\Application\services\Blog;


use App\Application\services\Service;
use App\Domain\Blog\Repositeries\PostRepositrey;
use App\Domain\Blog\ValueObjects\PostIdValueObject;
use App\Infrastructure\Persistance\Blog\MongoDB\BlogMongoDB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PostService extends Service
{
    /**
     * @var PostRepositrey
     */
    private $postRepositrey;

    /**
     * PostService constructor for saving the post repostirey as a property.
     */
    public function __construct()
    {
        $this->postRepositrey = new PostRepositrey(new BlogMongoDB());
    }

    /**
     * show all posts
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response)
    {
        $posts = $this->postRepositrey->getAll();
        return $this->responseWithJson($posts, $response);
    }

    /**
     * get a post by id
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     */
    public function show(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $idValueObject = (PostIdValueObject::makeFrom($id));
        $post =  $this->postRepositrey->getById($idValueObject);
        return $this->responseWithJson($post, $response);
    }
}
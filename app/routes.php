<?php
declare(strict_types=1);

use App\Application\services\Blog\PostService;
use Slim\App;

return function (App $app) {
    $app->get('/posts', PostService::class . ':index');
    $app->get('/posts/{id}', PostService::class . ':show');
    /*
     * /posts : get -> get all posts
     * /posts/1 : get -> get just one post
     * /posts : post -> create a post
     * /posts/1 : delete -> delete a post
     * /posts/1 : update a post
     * */
};


<?php
declare(strict_types=1);

use App\Application\services\Blog\PostService;
use Slim\App;

return function (App $app) {
    $app->get('/posts', PostService::class . ':index');
    $app->get('/posts/{id}', PostService::class . ':show');
    $app->post('/posts' , PostService::class . ':store');
    /*
     * /posts : post -> create a post
     * /posts/1 : delete -> delete a post
     * /posts/1 : update a post
     * */
};


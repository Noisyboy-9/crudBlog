<?php
declare(strict_types=1);

use App\Application\Middleware\SessionMiddleware;
use DI\Container;
use Slim\App;

return function (App $app, Container $container) {
    $app->add(SessionMiddleware::class);
    $app->addBodyParsingMiddleware();
};

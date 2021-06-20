<?php

use SmartMedia\Api\Controllers\ProductsController;
use SmartMedia\Api\Db\Dbh;
use SmartMedia\Api\DependencyInjection\DependencyContainer;
use SmartMedia\Api\Router\Router;

require __DIR__.'/../vendor/autoload.php';

$container = new DependencyContainer();
$container->define(Dbh::class, function () {
    return [
        getenv('DATABASE_DSN'),
        getenv('DATABASE_USER'),
        getenv('DATABASE_PASSWORD')
    ];
});

$router = $container->get(Router::class);
$router->setPrefix('/api');

$router->get('/products', function () use ($container) {
    $controller = $container->get(ProductsController::class);
    header('Content-Type: application/json');
    echo $controller->all();
});

$router->match();

<?php
use App\Controllers\HomeController;
use DI\Bridge\Slim\Bridge;
use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

$app = Bridge::create();

$container = $app->getContainer();

$container->set('view', function() {
    return Twig::create(
        __DIR__ . '/../templates',
        [
            'cache' => __DIR__ . '/../cache'
        ]
    );
});

$container->set(HomeController::class, function (ContainerInterface $container) {
    $view = $container->get('view');

    return new HomeController($view);
});

$app->get('/', [HomeController::class, 'home']);

$app->run();

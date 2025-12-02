<?php declare(strict_types=1);


use App\Factories\PostFactory;
use App\Interfaces\PostFactoryInterface;
use App\Interfaces\PostRepositoryInterface;
use App\Repositories\JsonPostRepository;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$container = new League\Container\Container();

// Twig Environment
$container->add(Environment::class, function () {
    $loader = new FilesystemLoader(TEMPLATES_PATH);
    return new Environment($loader);
});
//$container->add(\App\Models\Article::class);
$container->add(PostFactoryInterface::class, PostFactory::class);

$container->add(PostRepositoryInterface::class, JsonPostRepository::class)
    ->addArguments([PostFactoryInterface::class]);

$container->add(\App\Views\ArticleView::class)
    ->addArguments([Environment::class]);

$container->add(\App\Views\CalculateView::class)
    ->addArguments([Environment::class]);

$container->add(\App\Controllers\ArticleController::class)
    ->addArguments([\App\Interfaces\PostRepositoryInterface::class])
    ->addArguments([\App\Views\ArticleView::class]);

$container->add(\App\Controllers\CalculateController::class)
//    ->addArguments([\App\Interfaces\PostRepositoryInterface::class])
    ->addArguments([\App\Views\CalculateView::class]);

$strategy = (new ApplicationStrategy)->setContainer($container);
$router = (new Router)->setStrategy($strategy);

//$router->middleware(new AuthMiddleware);

return $router;
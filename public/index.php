<?php



require __DIR__.'/../vendor/autoload.php';
require_once '../config/settings.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();



$router = require '../app/bootstrap.php';

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);


$router->get('/', 'App\Controllers\ArticleController::showHomePage');
$router->get('/articles', 'App\Controllers\ArticleController::showArticlesList');
$router->get('/article/{id}', 'App\Controllers\ArticleController::article');
$router->get('/calc/{result}', 'App\Controllers\CalculateController::showResult');



$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

//$router->get('/', function () use($twig){
//    $twig->render('/pages/index.php', []);
//});
//$router->get('/calc', function () {
//    include_once('../templates/pages/calc.php');
//});
//$router->get('/articles', $article_controller, 'showArticlesList');
//$uri = $_SERVER['REQUEST_URI'];
//switch ($uri) {
//    case '/':
////        include_once ('./templates/pages/index.php');
//        $article_controller->showArticlesList();
//        break;
//    case '/articles':
//        $article_controller->showArticlesList();
//        break;
//    case '/calc':
//        include_once ('../templates/pages/calc.php');
//        break;
//    default:
//        $article_controller->showArticlesList();//
//        break;
//}

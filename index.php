<?php declare(strict_types=1);

require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';

use App\Http\Controllers\LessonsController;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;

$router->map('GET', '/', [new LessonsController(), 'getLessons']);

$response = $router->dispatch($request);


(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
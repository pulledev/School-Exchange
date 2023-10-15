<?php

declare(strict_types=1);

//Autoloader is loaded
require_once "vendor/autoload.php";


use Laminas\HttpHandlerRunner\Emitter\EmitterInterface;
use League\Route\RouteCollectionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use SchoolExchange\Core\Auth\Register;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$_ENV

$builder = new \DI\ContainerBuilder();

$builder->addDefinitions(__DIR__.'/dependencies.php');

$container = $builder->build();

$router = $container->get(RouteCollectionInterface::class);
$request = $container->get(ServerRequestInterface::class);
$emitter = $container->get(EmitterInterface::class);








// map a route
$router->map('GET', '/', function (ServerRequestInterface $request) use($container): ResponseInterface {

    $renderer = $container->get(\SchoolExchange\Core\Renderer\TemplateRendererInterface::class);
    $body = $renderer->render('index', ['test' => 'Hello World 2']);

    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write($body);
    return $response;
});

$router->map('GET', '/account/create', Register::class);
$router->map('POST', '/account/create', Register::class);



$response = $router->dispatch($request);

// send the response to the browser
$emitter->emit($response);
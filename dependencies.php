<?php


use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\EmitterInterface;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\RouteCollectionInterface;
use League\Route\Router;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use SchoolExchange\Core\Renderer\MustacheTemplateRenderer;
use SchoolExchange\Core\Renderer\TemplateRendererInterface;

return [
    'templatePath' => __DIR__.'/templates',

    ServerRequestInterface::class => function(){
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    },
    RouteCollectionInterface::class => function(ContainerInterface $container){
        $strategy = (new League\Route\Strategy\ApplicationStrategy)->setContainer($container);
        return (new Router())->setStrategy($strategy);
    },
    EmitterInterface::class => function(){
        return new SapiEmitter();
    },
    TemplateRendererInterface::class => function(ContainerInterface $container)
    {
        $mustache = new Mustache_Engine([
           'loader' => new Mustache_Loader_FilesystemLoader($container->get('templatePath')),
            'partials_loader' => new Mustache_Loader_FilesystemLoader($container->get('templatePath')),
            'escape' => function ($value){
                return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
            }
        ]);
        return new MustacheTemplateRenderer($mustache);

    }
];



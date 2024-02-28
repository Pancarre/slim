<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

include_once 'Classe.php';

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/alunno', function (Request $request, Response $response, $args) {
    $classe = new Classe();
    $response->getBody()->write($classe->toString());
    return $response;
});

$app->get('/alunno/{parameter}', function (Request $request, Response $response, $args) {
    $classe = new Classe();

    if($classe->getAlunno($args['parameter']) == null){

        $response->getBody()->write("alunno non esiste");
        return $response->withStatus(404);

    }

    else{

        $response->getBody()->write($classe->getAlunno($args['parameter'])->toString());
        return $response->withStatus(200);

    }

    $response->getBody()->write($classe->toString());
    return $response;
});

$app->run();

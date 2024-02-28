<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

include_once 'Classe.php';
include_once 'HomeController.php';
include_once 'AlunniController.php';
require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', 'HomeController:home');

$app->get('/alunno', 'AlunniController:index');

$app->get('/alunno/{parameter}', 'AlunniController:showAlunno');

$app->run();

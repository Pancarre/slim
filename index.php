<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

include_once 'Classe.php';
include_once './controller/HomeController.php';
include_once './controller/AlunniController.php';
include_once './controller/ApiAlunniController.php';
require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', 'HomeController:home');
$app->get('/alunno', 'AlunniController:index');
$app->get('/alunno/{parameter}', 'AlunniController:showAlunno');
$app->post('/alunno','AlunniController:createAlunno');
$app->put('/alunno/{parameter}','AlunniController:updateAlunno');
$app->delete('/alunno/{parameter}','AlunniController:createAlunno');


$app->get('/api/alunno', 'ApiAlunniController:index');
$app->get('/api/alunno/{parameter}', 'ApiAlunniController:showAlunno');




$app->run();

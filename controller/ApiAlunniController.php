<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    include_once 'alunno.php';

    class ApiAlunniController{

        function index(Request $request, Response $response, $args){

            $classe = new Classe();
            
            $response->getBody()->write(json_encode($classe));

            return $response->withHeader('Content-Type', 'application/json');

        }


        function showAlunno(Request $request, Response $response, $args){

            $classe = new Classe();

            if($classe->getAlunno($args['parameter']) == null){

                $response->getBody()->write("alunno non esiste");
                return $response->withStatus(404);

            }

            else{

                $response->getBody()->write(json_encode($classe->getAlunno($args['parameter'])));
                return $response->withStatus(200);

            }

            $response->getBody()->write($classe->toString());
            return $response;

        }

        





    }






?>
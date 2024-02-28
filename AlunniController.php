<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    include_once 'Classe.php';
    

    class AlunniController{

        public function index(Request $request, Response $response, $args){

            $classe = new Classe();
            $response->getBody()->write($classe->toString());
            return $response;
        }

        public function showAlunno(Request $request, Response $response, $args){

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

        }


    }



?>
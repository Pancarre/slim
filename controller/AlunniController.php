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


        }


        public function createAlunno(Request $request, Response $response, $args){

            $body = $request->getBody()->getContents();
            $parsedBody = json_decode($body,true);

            $nome = $parsedBody['nome'];
            $cognome = $parsedBody['cognome'];
            $eta = $parsedBody['eta'];

            $alunno = new alunno($nome,$cognome,$eta);

            $response ->getBody()->write($alunno->toString());
            return $response -> withHeader('Content-Type','application/json')->withStatus(201);

        }

        public function updateAlunno(Request $request, Response $response, $args){

            $classe = new Classe();
            $body = $request->getBody()->getContents();
            $parsedBody = json_decode($body,true);

            

            if($classe->getAlunno($parsedBody["nome"]) == null){

                $response->getBody()->write("alunno non esiste");
                return $response->withStatus(404);

            }

            else{

                $nome = $parsedBody['nome'];
                $cognome = $parsedBody['cognome'];
                $eta = $parsedBody['eta'];

                $alunno = $classe->getAlunno($parsedBody["nome"]);
                $updatedAlunno = new alunno($nome,$cognome,$eta);
                $response->getBody()->write($alunno->toString . "<br>" . $updatedAlunno);
                return $response->withStatus(200);

            }


        }

    }



?>
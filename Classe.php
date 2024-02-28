<?php


    include_once 'alunno.php';


    class Classe{


        public $alunni;

        public function __construct(){

            $this->alunni = [
                new alunno("Ale","Pan",20),
                new alunno("alex","bot",19),
                new alunno("mab","iri",20)
            ];

        }

        public function toString() {
            $s = "";
        
            foreach ($this->alunni as $a) {
                $s = $s . $a->toString() . "<br>";
            }
        
            return $s;
        }
        
        public function getAlunno($nome){

            foreach($this->alunni as $a){

                if($a->getNome() == $nome){

                    return $a;

                }


            }

            return null;

        }




    }

?>
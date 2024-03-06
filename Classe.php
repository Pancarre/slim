<?php


    include_once 'alunno.php';


    class Classe implements jsonSerializable{


        public $alunni;

        public function __construct(){

            $this->alunni = [
                new alunno("Ale","Pan",20),
                new alunno("alex","bot",19),
                new alunno("mab","iri",20)
            ];

        }

        public function jsonSerialize(){

            return $this->alunni;

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

                if($a->get_name() == $nome){

                    return $a;

                }


            }

            return null;

        }

        public function getAlunni(){

            return $this->alunni;

        }

        public function insertAlunno($alunno){

            array_push($this->alunni, $alunno);

        }


    }

?>
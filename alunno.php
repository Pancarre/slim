<?php
    class alunno implements jsonSerializable{

        protected $nome;
        protected $cognome;
        protected $eta;    

        public function __construct($nome, $cognome, $eta){

            $this->nome = $nome;
            $this->cognome = $cognome;
            $this->eta = $eta;

        }


        function get_name(){
            return $this->nome;
       }

       function get_surname(){
           return $this->surname;
       }

       function get_age(){
           return $this->age;
       }

        public function toString(){

            return "nome :" . $this->nome . " cognome: " . $this->cognome . " eta: " . $this->eta;

        }

        public function jsonSerialize(){

            return [
                'nome'=>$this->nome,
                'cognome'=>$this->cognome,
                'eta'=>$this->eta
            ];

        }


    }

    

?>
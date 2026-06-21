<?php
    namespace MODEL;

    class Funcionario{
        private ?int $id;
        private ?string $nome;
        private ?string $telefone;

        public function __construct(){

        }

        public function getId(){
            return $this->id;
        }

        public function setId(int $id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome(string $nome){
            $this->nome = $nome;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone(string $telefone){
            $this->telefone = $telefone;
        }
    }
?>
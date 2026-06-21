<?php
    namespace DAL;

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/conexao.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/funcionario.php";

    class Funcionario{
        public function Select(){
            $sql = "Select * from funcionario";
            $con = Conexao::conectar();
            $registro = $con->query($sql);
            $con = Conexao::desconectar();

            foreach($registro as $linha){
                $funcionario = new \MODEL\Funcionario();
                $funcionario->setId($linha['id']);
                $funcionario->setNome($linha['nome']);
                $funcionario->setTelefone($linha['telefone']);

                $listaFuncionario[] = $funcionario;
            }

            return $listaFuncionario;
        }

        public function Insert(\MODEL\Funcionario $funcionario){
            $sql = "INSERT INTO funcionario(nome, telefone)
                    VALUES('{$funcionario->getNome()}', '{$funcionario->getTelefone()}');";
            $con = Conexao::conectar();
            $result = $con->query($sql);
            $con = Conexao::desconectar();

            echo $result->errorCode();

            return $result;
        }
    }
?>
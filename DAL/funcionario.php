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

        public function Selectbyid(int $id){
        $sql = "Select * from funcionario where id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $funcionario = new \MODEL\Funcionario();
        $funcionario->setId($linha['id']);
        $funcionario->setNome($linha['nome']);
        $funcionario->setTelefone($linha['telefone']);

        return $funcionario;
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

        public function Delete(int $id){
        $sql = "DELETE FROM funcionario WHERE id=?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
        }

        public function Update(\MODEL\Funcionario $funcionario){
            $sql = "UPDATE funcionario SET nome = ?, telefone = ? WHERE id = ?;";
            $con = Conexao::conectar();
            $query = $con->prepare($sql);
            $result = $query->execute(array($funcionario->getNome(), $funcionario->getTelefone(), $funcionario->getId()));
            $con = Conexao::desconectar();

            return $result;
        }
    }
?>
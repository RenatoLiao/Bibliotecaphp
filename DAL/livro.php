<?php
    namespace DAL;

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/conexao.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/livro.php";

    class Livro{
        public function Select(){
            $sql = "Select * from livro";
            $con = Conexao::conectar();
            $registro = $con->query($sql);
            $con = Conexao::desconectar();

            foreach($registro as $linha){
                $livro = new \MODEL\Livro();
                $livro->setId($linha['id']);
                $livro->setDescricao($linha['descricao']);
                $livro->setQuantidade($linha['quantidade']);

                $listalivro[] = $livro;
            }

            return $listalivro;
        }

        public function Selectbyid(int $id){
        $sql = "Select * from livro where id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $livro = new \MODEL\Livro();
        $livro->setId($linha['id']);
        $livro->setDescricao($linha['descricao']);
        $livro->setQuantidade($linha['quantidade']);

        return $livro;
        }

        public function Insert(\MODEL\Livro $livro){
            $sql = "INSERT INTO livro(descricao, quantidade)
                    VALUES('{$livro->getDescricao()}', '{$livro->getQuantidade()}');";
            $con = Conexao::conectar();
            $result = $con->query($sql);
            $con = Conexao::desconectar();

            echo $result->errorCode();

            return $result;
        }

        public function Delete(int $id){
        $sql = "DELETE FROM livro WHERE id=?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
        }

        public function Update(\MODEL\Livro $livro){
            $sql = "UPDATE livro SET descricao = ?, quantidade = ? WHERE id = ?;";
            $con = Conexao::conectar();
            $query = $con->prepare($sql);
            $result = $query->execute(array($livro->getDescricao(), $livro->getQuantidade(), $livro->getId()));
            $con = Conexao::desconectar();

            return $result;
        }

        public function BaixarEstoque($idLivro) {
            $sql = "UPDATE livro SET quantidade = quantidade - 1 WHERE id = ?;";
            $con = Conexao::conectar();
            $query = $con->prepare($sql);
            $result = $query->execute(array($idLivro));
            $con = Conexao::desconectar();

            return $result;
        }
    }
?>
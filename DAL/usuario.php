<?php
    namespace DAL;

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/conexao.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/usuario.php";

    class Usuario{
        public function SelectByLogin(string $login){
            $sql = "Select * from usuario where login = ?";
            $con = Conexao::conectar();
            $query = $con->prepare($sql);
            $query->execute(array($login));
            $linha = $query->fetch(\PDO::FETCH_ASSOC);
            $con = Conexao::desconectar();

            if(!$linha){
                return null;
            }

            $usuario = new \MODEL\Usuario();
            $usuario->setId($linha['id']);
            $usuario->setLogin($linha['login']);
            $usuario->setSenha($linha['senha']);

            return $usuario;
        }

    }
?>
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

        public function Insert(\MODEL\Usuario $usuario){
            $sql = "INSERT INTO usuario(login, senha)
                VALUES('{$usuario->getLogin()}', '{$usuario->getSenha()}');";
            $con = Conexao::conectar();
            $result = $con->query($sql);
            $con = Conexao::desconectar();

            echo $result->errorCode();

            return $result;
        }

        public function Select() {
            $sql = "SELECT * FROM usuario;";
            $con = Conexao::conectar();
            $registro = $con->query($sql);
            $con = Conexao::desconectar();

            $listaUsuario = []; 

            if ($registro) {
                foreach ($registro as $linha) {
                    $usuario = new \MODEL\Usuario();
                    $usuario->setId((int)$linha['id']);
                    $usuario->setLogin($linha['login']);
                    $usuario->setSenha($linha['senha']); 

                    $listaUsuario[] = $usuario;
                }
            }

            return $listaUsuario;
        }        
     
        
        
    }
?>
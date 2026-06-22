<?php
    namespace DAL;

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/conexao.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/emprestimo.php";

    class Emprestimo {

        public function Select() {
            $sql = "SELECT * FROM emprestimo;";
            $con = Conexao::conectar();
            $registro = $con->query($sql);
            $con = Conexao::desconectar();

            $listaEmprestimo = []; 

            if ($registro) {
                foreach($registro as $linha) {
                    $emprestimo = new \MODEL\Emprestimo();
                    $emprestimo->setId($linha['id']);
                    $emprestimo->setDataEmprestimo($linha['data_emprestimo']);
                    $emprestimo->setDataDevolucao($linha['data_devolucao']);
                    $emprestimo->setIdLivro($linha['livro']);       
                    $emprestimo->setIdUsuario($linha['leitor']);    

                    $listaEmprestimo[] = $emprestimo;
                }
            }

            return $listaEmprestimo;
        }

        public function Selectbyid(int $id) {
            $sql = "SELECT * FROM emprestimo WHERE id = ?;";
            $con = Conexao::conectar();
            $query = $con->prepare($sql);
            $query->execute(array($id));
            $linha = $query->fetch(\PDO::FETCH_ASSOC);
            $con = Conexao::desconectar();

            $emprestimo = new \MODEL\Emprestimo();
            
            if ($linha) {
                $emprestimo->setId($linha['id']);
                $emprestimo->setDataEmprestimo($linha['data_emprestimo']);
                $emprestimo->setDataDevolucao($linha['data_devolucao']);
                $emprestimo->setIdLivro($linha['livro']);
                $emprestimo->setIdUsuario($linha['leitor']);
            }

            return $emprestimo;
        }

        public function Insert(\MODEL\Emprestimo $emprestimo) {
            $sql = "INSERT INTO emprestimo(funcionario, leitor, livro, data_emprestimo, data_devolucao) 
                    VALUES(?, ?, ?, ?, ?);";
            
            $con = Conexao::conectar();
            $query = $con->prepare($sql);
            
            $result = $query->execute(array(
                1,                               
                $emprestimo->getIdUsuario(),    
                $emprestimo->getIdLivro(),   
                $emprestimo->getDataEmprestimo(),
                $emprestimo->getDataDevolucao()  
            ));
            $con = Conexao::desconectar();

            return $result;
        }

        public function Delete(int $id) {
            $sql = "DELETE FROM emprestimo WHERE id = ?;";

            $con = Conexao::conectar();
            $query = $con->prepare($sql);
            $result = $query->execute(array($id));
            $con = Conexao::desconectar();

            return $result;
        }

        public function Update(\MODEL\Emprestimo $emprestimo) {
            $sql = "UPDATE emprestimo SET leitor = ?, livro = ?, data_emprestimo = ?, data_devolucao = ? WHERE id = ?;";
            
            $con = Conexao::conectar();
            $query = $con->prepare($sql);
            $result = $query->execute(array(
                $emprestimo->getIdUsuario(), 
                $emprestimo->getIdLivro(), 
                $emprestimo->getDataEmprestimo(), 
                $emprestimo->getDataDevolucao(), 
                $emprestimo->getId()
            ));
            $con = Conexao::desconectar();

            return $result;
        }
    }
?>
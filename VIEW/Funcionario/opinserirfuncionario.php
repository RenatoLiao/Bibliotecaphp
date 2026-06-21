<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/funcionario.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/funcionario.php";

    $funcionario = new \MODEL\Funcionario();
    
    $funcionario->setNome($_POST['nome']);
    $funcionario->setTelefone($_POST['telefone']);

    $dalFuncionario = new DAL\Funcionario();
    $dalFuncionario->Insert($funcionario);

    header("location: listaFuncionario.php");
?>
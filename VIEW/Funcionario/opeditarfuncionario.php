<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/funcionario.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/funcionario.php";

    $funcionario = new \MODEL\Funcionario();

    $funcionario->setId($_POST['id']);
    $funcionario->setNome($_POST['nome']);
    $funcionario->setTelefone($_POST['telefone']);

    $dalfuncionario = new DAL\Funcionario();
    $dalfuncionario->Update($funcionario);

    header("location:listafuncionario.php");
?>
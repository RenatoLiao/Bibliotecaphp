<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/funcionario.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/funcionario.php";

    $livro = new \MODEL\Funcionario();

    $livro->setId($_POST['id']);
    $livro->setDescricao($_POST['nome']);
    $livro->setQuantidade($_POST['telefone']);

    $dallivro = new DAL\Funcionario();
    $dallivro->Update($funcionario);

    header("location:listarfuncionario.php");
?>
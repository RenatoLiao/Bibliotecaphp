<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/livro.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/livro.php";

    $livro = new \MODEL\Livro();

    $livro->setId($_POST['id']);
    $livro->setDescricao($_POST['descricao']);
    $livro->setQuantidade($_POST['quantidade']);

    $dallivro = new DAL\Livro();
    $dallivro->Update($livro);

    header("location:listarlivro.php");
?>
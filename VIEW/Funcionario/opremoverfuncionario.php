<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/funcionario.php";

    $id = $_GET['id'];

    $dalfuncionario = new DAL\Funcionario();
    $dalfuncionario->Delete($id);

    header("location:listafuncionario.php");
?>
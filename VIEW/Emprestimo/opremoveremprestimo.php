<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/emprestimo.php";

    $id = $_GET['id'];

    $dalEmprestimo = new \DAL\Emprestimo();
    $dalEmprestimo->Delete($id);

    header("location:listaemprestimo.php");
?>
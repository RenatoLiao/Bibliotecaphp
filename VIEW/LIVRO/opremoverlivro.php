<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/livro.php";

    $id = $_GET['id'];

    $dallivro = new DAL\Livro();
    $dallivro->Delete($id);

    header("location:listarlivro.php");
?>
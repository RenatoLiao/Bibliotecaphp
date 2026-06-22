<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/emprestimo.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/emprestimo.php";

    $emprestimo = new \MODEL\Emprestimo();
    
    $emprestimo->setId((int)$_POST['id']);
    $emprestimo->setIdUsuario((int)$_POST['id_usuario']);
    $emprestimo->setIdLivro((int)$_POST['id_livro']);
    $emprestimo->setDataEmprestimo($_POST['data_emprestimo']);
    $emprestimo->setDataDevolucao($_POST['data_devolucao']);

    $dalEmprestimo = new \DAL\Emprestimo();
    $dalEmprestimo->Update($emprestimo);

    header("location: listaemprestimo.php");
?>
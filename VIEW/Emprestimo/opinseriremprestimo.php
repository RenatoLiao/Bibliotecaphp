<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/emprestimo.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/emprestimo.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/livro.php";

    $id_livro = (int)$_POST['id_livro'];

    $emprestimo = new \MODEL\Emprestimo();
    $emprestimo->setIdUsuario((int)$_POST['id_usuario']);
    $emprestimo->setIdLivro($id_livro);
    $emprestimo->setDataEmprestimo($_POST['data_emprestimo']);
    $emprestimo->setDataDevolucao($_POST['data_devolucao']);

    $dalEmprestimo = new \DAL\Emprestimo();
    $dalEmprestimo->Insert($emprestimo);

    $dalLivro = new \DAL\Livro();
    $dalLivro->BaixarEstoque($id_livro);

    header("location: listaemprestimo.php");
    exit();
?>
<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/menu.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/emprestimo.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/emprestimo.php";

    use DAL\Emprestimo;
    
    $dalEmprestimo = new Emprestimo();
    $listaEmprestimo = $dalEmprestimo->Select();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Empréstimos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body style="background-color: #1a2a3a;">
    <div class="container row col s12 blue lighten-3" style="border-radius: 15px; margin-top: 5%">
        <div>
            <h1 class="center">Lista de Empréstimos</h1>
        </div>

        <div class="row blue lighten-4 col s12">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID LIVRO</th>
                        <th>ID USUÁRIO</th>
                        <th>DATA EMPRÉSTIMO</th>
                        <th>DATA DEVOLUÇÃO</th>
                        <th><a class="btn-floating btn-small waves-effect waves-light green" href="inseriremprestimo.php"><i class="material-icons">add</i></a></th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                if (!empty($listaEmprestimo)) {
                    foreach($listaEmprestimo as $emprestimo) { 
                        $dtEmprestimo = date('d/m/Y', strtotime($emprestimo->getDataEmprestimo()));
                        $dtDevolucao = date('d/m/Y', strtotime($emprestimo->getDataDevolucao()));
                ?>
                <tr>
                    <td><?php echo $emprestimo->getId(); ?></td>
                    <td><?php echo $emprestimo->getIdLivro(); ?></td>
                    <td><?php echo $emprestimo->getIdUsuario(); ?></td>
                    <td><?php echo $dtEmprestimo; ?></td>
                    <td><?php echo $dtDevolucao; ?> </td>
                    <td>
                        <a class="btn-floating btn-small waves-effect waves-light blue" href="editaremprestimo.php?id=<?php echo $emprestimo->getId(); ?>"><i class="material-icons">edit</i></a>
                        <a class="btn-floating btn-small waves-effect waves-light orange" href="detalheemprestimo.php?id=<?php echo $emprestimo->getId(); ?>"><i class="material-icons">remove_red_eye</i></a>
                        <a class="btn-floating btn-small waves-effect waves-light red" onclick="JavaScript: remover(<?php echo $emprestimo->getId(); ?>)"><i class="material-icons">remove_circle</i></a>
                    </td>
                </tr>
                <?php 
                    } 
                } else {
                ?>
                <tr>
                    <td colspan="6" class="center grey-text text-darken-2">Nenhum empréstimo encontrado.</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>

<script>
    function remover(id) {
        if (confirm('Deseja excluir o Empréstimo ID ' + id + '?')) {
            location.href = 'opremoveremprestimo.php?id=' + id;
        }
    }
</script>
<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/menu.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/funcionario.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/funcionario.php";

    use DAL\Funcionario;
    
    $dalFuncionario = new DAL\Funcionario();
    $listaFuncionario = $dalFuncionario->Select();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Funcionario</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body style="background-color: #1a2a3a;">
    <div class="container row col s12 blue lighten-3" style="border-radius: 15px; margin-top: 10%">
        <div>
            <h1 class="center">Lista de Funcionarios</h1>
        </div>

        <div class="row blue lighten-4 col s12">
            <table class="highlight">
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>TELEFONE</th>
                    <th><a class="btn-floating btn-small waves-effect waves-light green" href="inserirfuncionario.php"><i class="material-icons">add</i></a></th>
                </tr>
                <?php
                foreach($listaFuncionario as $funcionario) { ?>
                <tr>
                    <td><?php echo $funcionario->getId(); ?></td>
                    <td><?php echo $funcionario->getNome(); ?></td>
                    <td><?php echo $funcionario->getTelefone(); ?> </td>
                    <td><a class="btn-floating btn-small waves-effect waves-light blue" href="editarfuncionario.php?id=<?php echo $funcionario->getId(); ?>"><i class="material-icons">edit</i></a>
                    <a class="btn-floating btn-small waves-effect waves-light orange" href="detalhefuncionario.php?id=<?php echo $funcionario->getId(); ?>"><i class="material-icons">remove_red_eye</i></a>
                    <a class="btn-floating btn-small waves-effect waves-light red" onclick="JavaScript: remover(<?php echo $funcionario->getId(); ?>)"><i class="material-icons">remove_circle</i></a></td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</body>
</html>

<script>
    function remover(id) {
        if (confirm('Deseja excluir o Funcionario ' + id + '?')) {
            location.href = 'opremoverfuncionario.php?id=' + id;
        }
    }
</script>
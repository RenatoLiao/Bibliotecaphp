<?php
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
                    <th><a class="btn-floating btn-small waves-effect waves-light red" href="inserirfuncionario.php"><i class="material-icons">add</i></a></th>
                </tr>
                <?php
                foreach($listaFuncionario as $funcionario) { ?>
                <tr>
                    <td><?php echo $funcionario->getId(); ?></td>
                    <td><?php echo $funcionario->getNome(); ?></td>
                    <td><?php echo $funcionario->getTelefone(); ?> </td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</body>
</html>
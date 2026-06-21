<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/conexao.php";

    $sql = "Select * from livro";
    $con = \DAL\Conexao::conectar();
    $registro = $con->query($sql);
    $con = \DAL\Conexao::desconectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar livros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <h1>Listar Livros da Biblioteca</h1>

    <table class="striped">
        <tr>
            <td>ID</td>
            <td>Descricao</td>
        </tr>
        <?php
            foreach($registro as $linha) { ?>
            <tr>
                <td> <?php echo $linha['id'];?> </td>
                <td> <?php echo $linha['descricao'];?> </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
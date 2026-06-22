<?php
    $id = $_GET['id'];
    
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/menu.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/livro.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/livro.php";

    use DAL\Livro;
    
    $dalLivro = new DAL\Livro();
    $livro = $dalLivro->Selectbyid($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
</head>
<body style="background-color: #1a2a3a;">
    <div class="row container col s12 blue lighten-3" style="border-radius: 15px; margin-top: 10%">
        <div>
            <h1 class="center">Detalhes Livro</h1>
        </div>
        <div class="row col s12 blue lighten-4">
            <form action="" method="post" class="col s10">
                
                <div class="input-field col s10">
                    <h5>ID: <?php echo $livro->getId(); ?></h5>
                </div>

                <div class="input-field col s10">
                    <h5>Descricao: <?php echo $livro->getDescricao(); ?></h5>
                </div>
            
                <div class="input-field col s10">
                    <h5>Quantidade: <?php echo $livro->getQuantidade(); ?></h5>
                </div>

                <div class="row center col s8">
                    <a class="waves-effect waves-light btn blue" href="listarlivro.php">Voltar</a>
                    <a class="waves-effect waves-light btn green" href="editarlivro.php?id=<?php echo $livro->getId(); ?>">Editar</a>
                    <a class="waves-effect waves-light btn red" onclick="JavaScript: remover(<?php echo $livro->getId(); ?>)">Remover</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

<script>
    function remover(id) {
        if (confirm('Deseja excluir o Livro ' + id + '?')) {
            location.href = 'opremoverlivro.php?id=' + id;
        }
    }
</script>
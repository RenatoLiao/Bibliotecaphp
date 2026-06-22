<?php
    $id = $_GET['id'];

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/menu.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/funcionario.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/funcionario.php";

    use DAL\Funcionario;
    
    $dalFuncionario = new DAL\Funcionario();
    $funcionario = $dalFuncionario->Selectbyid($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionario</title>
</head>
<body style="background-color: #1a2a3a;">
    <div class="row container col s12 blue lighten-3" style="border-radius: 15px; margin-top: 10%">
        <div>
            <h1 class="center">Editar Funcionario</h1>
        </div>
        <div class="row col s12 blue lighten-4">
            <form action="opeditarlivro.php" method="post" class="col s10">
                
                <div class="input-field col s10">
                    <label for="id" class="black-text">ID: <?php echo $funcionario->getId() ?></label>
                    <br><br>
                    <input type="hidden" name="id" value=<?php echo $id; ?>>
                </div>

                <div class="input-field col s10">
                    <input placeholder="Informar a nome" id="nome" name="nome" type="text" class="validate" value="<?php echo $livro->getDescricao(); ?>">
                    <label for="nomelabel">Nome: </label>
                </div>
            
                <div class="input-field col s10">
                    <input placeholder="Informar a telefone" id="telefone" name="telefone" type="text" class="validate" value="<?php echo $livro->getQuantidade(); ?>">
                    <label for="nomelabel">Telefone: </label>
                </div>

                <div class="row center col s8">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Salvar</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/menu.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
</head>
<body style="background-color: #1a2a3a;">
    <div class="row container col s12 blue lighten-3" style="border-radius: 15px; margin-top: 10%">
        <div>
            <h1 class="center">Inserir Livro</h1>
        </div>
        <div class="row col s12 blue lighten-4">
            <form action="opinserirlivro.php" method="post" class="col s10">
                <div class="input-field col s10">
                    <input placeholder="Informar a descricao" id="descricao" name="descricao" type="text" class="validate">
                    <label for="nomelabel">Descricao: </label>
                </div>
            
                <div class="input-field col s10">
                    <input placeholder="Informar a quantidade" id="quantidade" name="quantidade" type="text" class="validate">
                    <label for="nomelabel">Quantidade: </label>
                </div>

                <div class="row center col s8">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Inserir</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
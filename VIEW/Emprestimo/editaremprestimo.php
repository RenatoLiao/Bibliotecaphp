<?php
    $id = $_GET['id'];

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/menu.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/emprestimo.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/emprestimo.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/livro.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/usuario.php";

    use DAL\Emprestimo;
    
    $dalEmprestimo = new Emprestimo();
    $emprestimo = $dalEmprestimo->Selectbyid($id);

    $dalLivro = new \DAL\Livro();
    $listaLivros = $dalLivro->Select();

    $dalUsuario = new \DAL\Usuario();
    $listaUsuarios = $dalUsuario->Select();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empréstimo</title>
</head>
<body style="background-color: #1a2a3a;">
    <div class="row container col s12 blue lighten-3" style="border-radius: 15px; margin-top: 5%">
        <div>
            <h1 class="center">Editar Empréstimo</h1>
        </div>
        <div class="row col s12 blue lighten-4" style="padding: 20px; border-radius: 0 0 15px 15px;">
            <form action="opeditaremprestimo.php" method="post" class="col s12">
                
                <div class="input-field col s12">
                    <label class="black-text"><h5><b>ID do Empréstimo:</b> <?php echo $emprestimo->getId(); ?></h5></label>
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo $emprestimo->getId(); ?>">
                </div>

                <div class="input-field col s6">
                    <select id="id_livro" name="id_livro" required>
                        <?php foreach ($listaLivros as $livro) { 
                            $selected = ($livro->getId() == $emprestimo->getIdLivro()) ? "selected" : "";
                        ?>
                            <option value="<?php echo $livro->getId(); ?>" <?php echo $selected; ?>>
                                <?php echo $livro->getDescricao() . " (ID: " . $livro->getId() . ")"; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label>Selecionar Livro:</label>
                </div>
            
                <div class="input-field col s6">
                    <select id="id_usuario" name="id_usuario" required>
                        <?php foreach ($listaUsuarios as $usuario) { 
                            $selected = ($usuario->getId() == $emprestimo->getIdUsuario()) ? "selected" : "";
                        ?>
                            <option value="<?php echo $usuario->getId(); ?>" <?php echo $selected; ?>>
                                <?php echo $usuario->getLogin() . " (ID: " . $usuario->getId() . ")"; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label>Selecionar Leitor:</label>
                </div>

                <div class="input-field col s6">
                    <input id="data_emprestimo" name="data_emprestimo" type="date" class="validate" required value="<?php echo $emprestimo->getDataEmprestimo(); ?>">
                    <label for="data_emprestimo" class="active">Data de Empréstimo: </label>
                </div>

                <div class="input-field col s6">
                    <input id="data_devolucao" name="data_devolucao" type="date" class="validate" required value="<?php echo $emprestimo->getDataDevolucao(); ?>">
                    <label for="data_devolucao" class="active">Data de Devolução: </label>
                </div>

                <div class="row center col s12" style="margin-top: 20px;">
                    <button class="btn waves-effect waves-light orange" type="submit" name="action">Atualizar</button>
                    <a href="listaemprestimo.php" class="btn waves-effect waves-light grey">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
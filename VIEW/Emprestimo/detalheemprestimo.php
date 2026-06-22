<?php
    $id = $_GET['id'];

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/menu.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/emprestimo.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/emprestimo.php";

    use DAL\Emprestimo;
    
    $dalEmprestimo = new Emprestimo();
    $emprestimo = $dalEmprestimo->Selectbyid($id);
    $dtEmprestimo = date('d/m/Y', strtotime($emprestimo->getDataEmprestimo()));
    $dtDevolucao = date('d/m/Y', strtotime($emprestimo->getDataDevolucao()));
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Empréstimo</title>
</head>
<body style="background-color: #1a2a3a;">
    <div class="row container col s12 blue lighten-3" style="border-radius: 15px; margin-top: 5%">
        <div>
            <h1 class="center">Detalhes do Empréstimo</h1>
        </div>
        <div class="row col s12 blue lighten-4" style="padding: 20px; border-radius: 0 0 15px 15px;">
            <div class="col s12 style-dados">
                
                <div class="input-field col s12">
                    <h5><b>ID do Empréstimo:</b> <?php echo $emprestimo->getId(); ?></h5>
                </div>

                <div class="input-field col s12">
                    <h5><b>ID do Livro:</b> <?php echo $emprestimo->getIdLivro(); ?></h5>
                </div>
            
                <div class="input-field col s12">
                    <h5><b>ID do Leitor/Usuário:</b> <?php echo $emprestimo->getIdUsuario(); ?></h5>
                </div>

                <div class="input-field col s12">
                    <h5><b>Data de Empréstimo:</b> <?php echo $dtEmprestimo; ?></h5>
                </div>

                <div class="input-field col s12">
                    <h5><b>Data de Devolução:</b> <?php echo $dtDevolucao; ?></h5>
                </div>

                <div class="row center col s12" style="margin-top: 30px;">
                    <a class="waves-effect waves-light btn blue" href="listaEmprestimo.php">Voltar</a>
                    <a class="waves-effect waves-light btn orange" href="editaremprestimo.php?id=<?php echo $emprestimo->getId(); ?>">Editar</a>
                    <a class="waves-effect waves-light btn red" onclick="JavaScript: remover(<?php echo $emprestimo->getId(); ?>)">Remover</a>
                </div>
            </div>
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
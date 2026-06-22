<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Usuário</title>
</head>
<body style="background-color: #1a2a3a;">
    <div class="row container col s12 blue lighten-3" style="border-radius: 15px; margin-top: 8%">
        <div>
            <h1 class="center">Cadastrar Usuário</h1>
        </div>
        <div class="row col s12 blue lighten-4" style="padding: 20px; border-radius: 0 0 15px 15px;">
            <form action="opinserirusuario.php" method="post" class="col s12">
                <div class="input-field col s12">
                    <input placeholder="Digite o login/nome do usuário" id="login" name="login" type="text" class="validate" required>
                    <label for="login" class="active">Login: </label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Digite a senha" id="senha" name="senha" type="password" class="validate" required>
                    <label for="senha" class="active">Senha: </label>
                </div>

                <div class="row center col s12" style="margin-top: 20px;">
                    <button class="btn waves-effect waves-light green" type="submit" name="action">Salvar</button>
                    <a href="/Bibliotecaphp/VIEW/index.php" class="btn waves-effect waves-light grey">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
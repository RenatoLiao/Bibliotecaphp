<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>    

    <style>
        .brand-logo img {
            height: 63px;
            width: 180px;
            object-fit: contain;
            vertical-align: middle;
        }
        .nav-wrapper{
            padding: 0 20px;
        }
    </style>

</head>
<body>
    <nav>
        <div class="nav-wrapper blue lighten-1">
            <a href="/Biblioteca/home.php" class="brand-logo">
                <img src="/Bibliotecaphp/img/logo.jpeg" alt="Logo Biblioteca">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/Bibliotecaphp/VIEW/home.php">Home</a></li>
            <li><a href="/Bibliotecaphp/VIEW/Funcionario/listafuncionario.php">Funcionario</a></li>
            <li><a href="/Bibliotecaphp/VIEW/LIVRO/listarlivro.php">Livro</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>
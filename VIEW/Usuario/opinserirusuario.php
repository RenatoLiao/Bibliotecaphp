<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/usuario.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/usuario.php";

    $usuario = new \MODEL\Usuario();
    $usuario->setLogin($_POST['login']);
    
    $usuario->setSenha(md5($_POST['senha'])); 

    $dalUsuario = new \DAL\Usuario();
    $dalUsuario->Insert($usuario);

    header("location:/Bibliotecaphp/VIEW/index.php");
?>
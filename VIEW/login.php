<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/DAL/usuario.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Bibliotecaphp/MODEL/usuario.php";


    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    $md5 = md5($pwd);

    $dalUsuario = new \DAL\Usuario();
    $usuario = $dalUsuario->SelectByLogin($login);

    if($usuario != null && $md5 == $usuario->getSenha()){
        session_start();
        $_SESSION['login'] = $usuario;
        header("location:/Bibliotecaphp/VIEW/home.php");
    }
    else header("location:index.php");
?>
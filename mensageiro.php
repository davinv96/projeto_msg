<?php
    include_once('banco/conecta.php');
    session_start();

    //Verifica se usuário se logou corretamente
    if(isset($_SESSION['id_usuario'])){
        $id_usuario = $_SESSION['id_usuario'];
    }else{
        header("Location: login.php");
    }

    echo "Seja bem vindo,  ".$_SESSION["nome"].", ao UlbraChat!";








?>
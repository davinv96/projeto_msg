<?php
    include("includes/banco.php");
    $con = conectar();
   
    session_start();
    if(isset($_SESSION['id'])){
        $id_login = $_SESSION['id'];
    }
    mysqli_query($con, "UPDATE `usuarios` SET `status`= 0 WHERE `id` = '$id_login'");
    session_destroy();
    header("Location: index.php");
?>
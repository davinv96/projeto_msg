<?php
    include('banco/conecta.php');
    $link = conecta();
    
    if(isset($_POST['message'])){
        $message = mysqli_real_escape_string($link, $_POST['message']);
        $id_conversa = mysqli_real_escape_string($link, $_POST['id_conversa']);
        $usuario_envio = mysqli_real_escape_string($link, $_POST['usuario_envio']);
        $usuario_destino = mysqli_real_escape_string($link, $_POST['usuario_destino']);
        $id_conversa = base64_decode($id_conversa);
        $usuario_envio = base64_decode($usuario_envio);
        $usuario_destino = base64_decode($usuario_destino);
        
        $q = mysqli_query($link, "INSERT INTO `messages` VALUES ('','$id_conversa','$usuario_envio','$usuario_destino','$message')");
        if($q){
            echo "Posted";
        }else{
            echo "Error";
        }
    }
?>

?>
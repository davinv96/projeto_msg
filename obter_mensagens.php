<?php
    include_once('banco/conecta.php');
    $link = conecta();

    if(isset($_GET['c_id'])){
        $conversation_id = base64_decode($_GET['c_id']);
        $query = mysqli_query($link, "SELECT * FROM `messages` WHERE conversation_id='$conversation_id'");
        if(mysqli_num_rows($query) > 0){
            while ($m = mysqli_fetch_assoc($query)) {
                $usuario_envio = $m['usuario_envio'];
                $usuario_destino = $m['usuario_destino'];
                $message = $m['message'];
                $user = mysqli_query($link, "SELECT nome FROM `usuario` WHERE id='$usuario_envio'");
                $user_fetch = mysqli_fetch_assoc($user);
                $user_form_username = $user_fetch['nome'];
                echo "
                    <div class='message'>
                    <div class='text-link'>
                            <a href='#''>{$user_form_username}</a>
                            <p>{$message}</p>
                            </div>
                            </div>
                            <hr>";
            }
        }else{
            echo "No Messages";
        }
    }
?>
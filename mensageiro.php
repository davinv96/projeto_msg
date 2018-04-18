<?php
    include('banco/conecta.php');
    $link = conecta(); 
    session_start();
    
    //Verifica se usuário se logou corretamente
    if(isset($_SESSION['id_usuario'])){
        $id_usuario = $_SESSION['id_usuario'];
    }else{
        header("Location: login.php");
    }
?>

    <html>
    <head>

    <title>UlbraChat</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
        <body>
    <center> 
    <br>
        <strong>Bem vindo, <?php echo $_SESSION['nome']; ?> 
        </center>
        <div class="message-body">
        <div class="message-left">
            <ul>
                <?php
                $query = mysqli_query($link, "SELECT * FROM `usuario` WHERE id_usuario!='$id_usuario'");
                while($row = mysqli_fetch_assoc($query)){
                    echo "<a href='mensageiro.php?id={$row['id_usuario']}'><li>{$row['nome']}</li></a>";
                }
                ?>
            </ul>
            </div>
            <div class="message-right">
            <div class="display-message">
            <?php
            if(isset($_GET['id_usuario'])){
                $user_two = trim(mysqli_real_escape_string($link, $_GET['id_usuario']));
                $query = mysqli_query($link, "SELECT `id_usuario` FROM `user` WHERE id_usuario='$usuario2' AND id_usuario!='$id_usuario'");
                if(mysqli_num_rows($query) == 1){
                    $conver = mysqli_query($link, "SELECT * FROM `conversas` WHERE (usuario1='$id_usuario' AND usuario2='$usuario2') OR (usuario1='$usuario2' AND usuario2='$id_usuario')");
                    if(mysqli_num_rows($conver) == 1){
                        $fetch = mysqli_fetch_assoc($conver);
                        $conversation_id = $fetch['id_usuario'];
                        }else{
                            $query= mysqli_query($link, "INSERT INTO `conversas` VALUES ('','$id_usuario',$usuario2)");
                            $conversation_id = mysqli_insert_id($link);
                        }
                }else{
                    die("Invalid $_GET ID.");
                }
            }else {
                die("Click On the Person to start Chating.");
            }
            ?>
            </div>
            <div class="send-message">
                <input type="hidden" id="id_conversa" value="<?php echo base64_encode($id_conversa); ?>">
                <input type="hidden" id="usuario_envio" value="<?php echo base64_encode($id_usuario); ?>">
                <input type="hidden" id="usuario_destino" value="<?php echo base64_encode($usuario2); ?>">
                <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Enter Your Message"></textarea>
                </div>
                <button class="btn btn-primary" id="reply">Reply</button> 
                <span id="error"></span>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script> 
    </body>
    </html>
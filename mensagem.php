<?php
    include("includes/banco.php");
	$con = conectar();
	
    session_start();
    
    if(isset($_SESSION['id'])){
        $id_login = $_SESSION['id'];
       
    }else{
        header("Location: index.php");
    }
    mysqli_query($con, "UPDATE `usuarios` SET `status`= 1 WHERE `id` ='$id_login'");

    $q1 = mysqli_query($con, "SELECT `nome` FROM `usuarios` WHERE `id`='$id_login'");
    while($row = mysqli_fetch_assoc($q1)){
        $nome = $row['nome'];
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UlbraChat</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
	    <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script> 
    </head>

    <body>
       
     
		<div class="message-body"> 		
			<div class="display-message">
            <!-- display message -->
           
				<?php
                if(isset($_GET['id'])){
                    $usuario2 = trim(mysqli_real_escape_string($con, $_GET['id']));
                    $q = mysqli_query($con, "SELECT `id` FROM `usuarios` WHERE id='$usuario2' AND id!='$id_login'");
                    if(mysqli_num_rows($q) == 1){
                        $conver = mysqli_query($con, "SELECT * FROM conversas WHERE (usuario1='$id_login' AND usuario2='$usuario2') OR (usuario1='$usuario2' AND usuario2='$id_login')"); 
                        if(mysqli_num_rows($conver) == 1){                           
                            $fetch = mysqli_fetch_assoc($conver);
                            $id_conversa = $fetch['id'];
                        }else{ 
                           
                            $q = mysqli_query($con, "INSERT INTO conversas VALUES ('','$id_login',$usuario2)");
                            $id_conversa = mysqli_insert_id($con);
                        }
                    }else{
                        die("Erro no ID.");
                    }
                }else {
                    die("<center>Clique na aba contatos com quem deseja falar.</center>");
                }
				?>
           
            <!-- /display message -->
			</div>
            <!-- send message -->
            <div class="send-message">
               
                <input type="hidden" id="id_conversa" value="<?php echo $id_conversa; ?>">
                <input type="hidden" id="usuario_envio_msg" value="<?php echo $id_login; ?>">
                <input type="hidden" id="usuario_destino" value="<?php echo $usuario2; ?>">
                <div class="form-group">
                    <textarea class="form-control" id="mensagem" placeholder="Envie sua Mensagem"></textarea>
                </div>
                <button class="btn btn-primary" id="enviar">Enviar</button> 
                <span id="error"></span>
            </div>
            <!-- / send message -->
      
		</div>		
	</body>

</html>

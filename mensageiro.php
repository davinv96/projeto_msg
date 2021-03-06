<?php
    include("includes/banco.php");
	$con = conectar();
	
    session_start();
    
    /*
        Se existir um id válido de sessão, o usuário continuará na página
        Caso o id não exista, o usuário será redirecionado a página de autenticação
    */
    if(isset($_SESSION['id'])){
        $id_login = $_SESSION['id'];
       
    }else{
        header("Location: index.php");
    }
    /*

    */
    mysqli_query($con, "UPDATE `usuarios` SET `status`= 1 WHERE `id` ='$id_login'");

    if(isset($_GET['id'])){
        $usuario_conversa = $_GET['id'];
        $q = mysqli_query($con, "SELECT nome, status FROM `usuarios` WHERE id='$usuario_conversa'");
                    
        while($row = mysqli_fetch_assoc($q)){
            $_SESSION['nome_conversa']= $row['nome'];
           
        }
       
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UlbraChat - Conversa</title>
        <link rel="icon" href="img/logo.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
	    <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script> 
    </head>

    <body>
    <nav class="navbar navbar-default">
            <div class="container-fluid" id="show-info">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    
                    <a class="navbar-brand" >Você está falando com <?php echo $_SESSION['nome_conversa']; ?> </a>
                   
                </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            
			</div><!-- /.container-fluid -->
		</nav>
     
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
                    die("Erro");
                }
				?>
           
            <!-- /display message -->
			</div>
            <!-- send message -->
            <div class="send-message" id="send-message">
               
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

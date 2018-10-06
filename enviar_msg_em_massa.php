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
        <!--<script type="text/javascript" src="js/script.js"></script>-->
    </head>

    <body>
    <nav class="navbar navbar-default">
            <div class="container-fluid" id="show-info">
            <!-- Brand and toggle get grouped for better mobile display -->
           

            <!-- Collect the nav links, forms, and other content for toggling -->
            
			</div><!-- /.container-fluid -->
		</nav>
     
		       
            <!-- send message -->
            <form action="enviar_msg_em_massa.php" method="post" >
            <div class="send-message1" id="send-message1">
                <input type="hidden" id="usuario_envio_msg" value="<?php echo $id_login; ?>">

                    <textarea class="form-control" id="mensagem1" placeholder="Envie sua Mensagem"></textarea>
                </div>
                <input type="submit" value="enviar1"  name="enviar1" class="btn btn-primary btn-block">
                <span id="error"></span>
            </div>
            </form>
            <!-- / send message -->
      
		</div>		
	</body>

</html>
<?php
if(isset($_POST['enviar1'])){
    echo "aaaaaaaaaa";
 $q = mysqli_query($con, "SELECT * FROM `usuarios` WHERE id!='$id_login' AND `professor` = 0 ");
 $mensagem = mysqli_real_escape_string($con, $_POST['mensagem1']);
 $usuario_envio_msg = mysqli_real_escape_string($con, $_POST['usuario_envio_msg']);
 $usuario_logado = mysqli_real_escape_string($con, $_POST['usuario_logado']);
 
 while($row = mysqli_fetch_assoc($q)){
     $array[] = $row;

 }
 foreach ($array as $row){
    $usuario2 = $row['id'];
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
     }

     
  
     
     
     $q = mysqli_query($con, "INSERT INTO mensagens (`id_conversa`, `usuario_envio`, `usuario_destino`, `mensagens`)
     VALUES ('$id_conversa','$usuario_envio_msg','$usuario2','$mensagem')");
     if($q){
         echo "Enviado!";
     }else{
         echo "Erro no envio";
     }
 }
        
}else{
    echo "bbbbbbbb";
}

 
       
?>
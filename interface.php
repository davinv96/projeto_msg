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
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://localhost/projeto_msg/interface.php">UlbraChat - Olá, <?php echo $nome; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost/projeto_msg/logout.php">Sair <span class="sr-only"></span></a>
      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contatos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php
                    $q = mysqli_query($con, "SELECT * FROM `usuarios` WHERE id!='$id_login'");
                    
                    while($row = mysqli_fetch_assoc($q)){
                        $status = $row['status'];
                        if($status == 1){
                            $status_aux = "Online";
                        }else{
                            $status_aux = "Offline";
                        }
                        echo "<a href='interface.php?id={$row['id']}'><li>{$row['nome']}<br>Status: $status_aux<hr></li></a>";
                    }
                
                ?>
          </ul>
        </li>
      </ul>
     
     
    </div><!-- /.navbar-collapse -->
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
                <button class="btn btn-primary" id="reply">Reply</button> 
                <span id="error"></span>
            </div>
            <!-- / send message -->
      
	</div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script> 
</body>
</html>

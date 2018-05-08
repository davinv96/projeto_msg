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
    
    $q2= mysqli_query($con, "SELECT `usuario_destino` FROM mensagens WHERE `lida` < NOW() - INTERVAL 1 MINUTE and `usuario_envio` =' $id_login' LIMIT 1");
    while($row = mysqli_fetch_assoc($q2)){
        $id_usr_notificacao = $row['usuario_destino'];
    }

    $q3= mysqli_query($con, "SELECT `nome` FROM usuarios WHERE `id` ='$id_usr_notificacao'");
    while($row = mysqli_fetch_assoc($q3)){
        $nome_notificacao = $row['nome'];
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
        <nav class="navbar navbar-default">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://localhost/projeto_msg/home.php">UlbraChat - Olá, <?php echo $nome; ?></a>
                   
                </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item ">
                        <a class="nav-link" href="http://localhost/projeto_msg/logout.php">Sair <span class="glyphicon glyphicon-log-out"></span></a>
                    </li>
        
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mensagens não lidas <span class="glyphicon glyphicon-envelope"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Contatos que enviaram mensagens nos <br>últimos 30 minutos e não foram lidas:<hr></a></li>
            <?php echo "<a target='_blank' href='mensageiro.php?id='$id_usr_notificacao;'><li>$nome_notificacao<hr></li></a>";?>

           
          </ul>
        </li>
                  
                </ul>
               
			</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
        <div class="show-contacts" id="show-contacts">
        <?php
        $q = mysqli_query($con, "SELECT * FROM `usuarios` WHERE id!='$id_login'");
                  
        while($row = mysqli_fetch_assoc($q)){
            $status = $row['status'];
            if($status==1){
                $status="Online";
            }else{
                $status="Offline";
            }
                    
             echo "<a target='_blank' href='mensageiro.php?id={$row['id']}'><li>Nome: {$row['nome']} - Status: ".$status;"<hr></li></a>";

             
                    
        }
        ?>
		</div>
	</body>

</html>

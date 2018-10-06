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

    $q1 = mysqli_query($con, "SELECT * FROM `usuarios` WHERE `id`='$id_login'");
    while($row = mysqli_fetch_assoc($q1)){
        $nome = $row['nome'];
        $professor = $row['professor'];
    }


    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UlbraChat - Home</title>
        <link rel="icon" href="img/logo.png" type="image/x-icon" />
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
                   
                    <a class="navbar-brand" href="http://localhost/projeto_msg/home.php">UlbraChat - Olá, <?php echo $nome; ?></a>
                    
                    <a class="navbar-brand" href="http://localhost/projeto_msg/logout.php">  Sair <span class="glyphicon glyphicon-log-out"></span></a>
              
        
                </div>
                
            <!-- Collect the nav links, forms, and other content for toggling -->
            
			</div><!-- /.container-fluid -->
		</nav>
        <div class="show-contacts" id="show-contacts">
            <caption>Lista de contatos</caption>
            <table  class="table table-bordered">
		    <tr>
			    <th scope="col"> Nome</th>
			    <th scope="col"> Status</th>
			
		    </tr>
            <?php
            if($professor == 0){
                $q = mysqli_query($con, "SELECT * FROM `usuarios` WHERE id!='$id_login' AND `professor` = 1");
                  
                while($row = mysqli_fetch_assoc($q)){
                    $array[] = $row;
                  
                }
                foreach ($array as $row){
                    echo "<tr>";        
                    echo "<td><a target='_blank' href='mensageiro.php?id={$row['id']}'>".$row['nome']."</td>";
                    if($row['status']=="1"){
                        echo "<td style='color:green'><b>Online</b></td>";
                    }else{
                        echo "<td style='color:red'>Offline</td>";
                    }
            
          
                    echo "</tr>";
            
                }

            }else if($professor == 1){
            
                $q = mysqli_query($con, "SELECT * FROM `usuarios` WHERE id!='$id_login' AND `professor` = 0 ");
                  
                while($row = mysqli_fetch_assoc($q)){
                    $array[] = $row;
              
                }
                foreach ($array as $row){
                    echo "<tr>";        
                    echo "<td><a target='_blank' href='mensageiro.php?id={$row['id']}'>".$row['nome']."</td>";
                    if($row['status']=="1"){
                        echo "<td style='color:green'><b>Online</b></td>";
                    }else{
                        echo "<td style='color:red'>Offline</td>";
                    }
            
        
                    echo "</tr>";
                }
                

            }
        ?>
        </table>
        <caption>Conversas com mensagens não lidas</caption>
            <table  class="table table-bordered">
		    
        <?php
            $q = mysqli_query($con, "SELECT `usuario_destino` FROM `mensagens` WHERE `lida` = 0 AND `usuario_destino`= $id_login");
            
            if(mysqli_num_rows($q) <= 0){
                echo " - Sem mensagens";
               
            }else{
                ?>
                     <tr>
			                <th scope='col'> Nome</th>
			                <th scope='col'> Status</th>
		                    </tr>
                    <tr>

                <?php
                $q1 = mysqli_query($con, "SELECT `usuario_envio` FROM `mensagens` WHERE `lida` = 0 AND `usuario_destino`= $id_login");
                while($row = mysqli_fetch_assoc($q1)){
                    $usuario_envio = $row['usuario_envio'];
                }

                $q2 = mysqli_query($con, "SELECT * FROM `usuarios` WHERE id = '$usuario_envio' AND id!= $id_login");
                
                while($row = mysqli_fetch_assoc($q2)){
                    echo "<tr>";
                    echo "<td><a target='_blank' href='mensageiro.php?id={$row['id']}'>".$row['nome']." <span class='glyphicon glyphicon-envelope'></td>";
                    if($row['status']=="1"){
                        echo "<td style='color:green'><b>Online</b></td>";
                    }else{
                        echo "<td style='color:red'>Offline</td>";
                    }
        
      
                    echo "</tr>";
                }

            }
        ?>
       </table>
       </div>
       <div class="send-mass-msg" id="send-mass-msg">
        <?php
            if($professor == 1){
                $q4 = mysqli_query($con, "SELECT * FROM usuarios WHERE id!='$id_login' AND professor = 0");
                    
                while($row = mysqli_fetch_assoc($q4)){
                    $usuario2 =  $row['id'];
                    $q = mysqli_query($con, "SELECT `id` FROM `usuarios` WHERE id='$usuario2' AND id!='$id_login'");
                    if(mysqli_num_rows($q) == 1){
                        
                        $conver = mysqli_query($con, "SELECT * FROM conversas WHERE (usuario1='$id_login' AND usuario2='$usuario2') OR (usuario1='$usuario2' AND usuario2='$id_login')"); 
                        echo $usuario2."<br>";
                        if(mysqli_num_rows($conver) > 0){                           
                            $fetch = mysqli_fetch_assoc($conver);
                            $id_conversa = $fetch['id'];
                        }else{ 
                           
                            $q = mysqli_query($con, "INSERT INTO conversas VALUES ('','$id_login',$usuario2)");
                            $id_conversa = mysqli_insert_id($con);
                        }
                    }
            
                }
                ?>
                <caption><b>Envio de mensagens em massa</b></caption>
                <div class="send-message" id="send-message">
                    
                    <input type="hidden" id="id_conversa" value="<?php echo $id_conversa; ?>">
                    <input type="hidden" id="usuario_envio_msg" value="<?php echo $id_login; ?>">
                    <input type="hidden" id="usuario_destino" value="<?php echo $usuario2; ?>">
                    <div class="form-group">
                        <textarea class="form-control" id="mensagem" placeholder="Todos os alunos irão receber esta mensagem"></textarea>
                    </div>
                    <button class="btn btn-primary" id="enviar">Enviar</button> 
                    <span id="error"></span>
                </div>
                <?php
            
        
                
            }
        
            
            
        ?>
		</div>
	</body>

</html>

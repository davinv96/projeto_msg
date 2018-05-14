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
        <nav class="navbar navbar-inverse">
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
             $q = mysqli_query($con, "SELECT * FROM `usuarios` WHERE id!='$id_login'");
                  
            while($row = mysqli_fetch_assoc($q)){
                $array[] = $row;
                  
            }
            foreach ($array as $row){
                echo "<tr>";        
                echo "<td><a target='_blank' href='mensageiro.php?id={$row['id']}'>".$row['nome']."</td>";
                if($row['status']=="1"){
                    echo "<td style='color:green'>Online</td>";
                }else{
                    echo "<td style='color:red'>Offline</td>";
                }
            
          
                echo "</tr>";
        }
        ?>
        </table>
        <caption>Mensagens não lidas</caption>
            <table  class="table table-bordered">
		    <tr>
			    <th scope="col"> Nome</th>
			    <th scope="col"> Status</th>
			
		    </tr>
            <?php
             $q = mysqli_query($con, "SELECT * FROM `usuarios` WHERE id!='$id_login'");
                  
            while($row = mysqli_fetch_assoc($q)){
                $array[] = $row;
                  
            }
            foreach ($array as $row){
                echo "<tr>";        
                echo "<td><a target='_blank' href='mensageiro.php?id={$row['id']}'>".$row['nome']."</td>";
                if($row['status']=="1"){
                    echo "<td style='color:green'>Online</td>";
                }else{
                    echo "<td style='color:red'>Offline</td>";
                }
            
          
                echo "</tr>";
        }
        ?>
        </table>
		</div>
	</body>

</html>

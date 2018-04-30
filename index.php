<?php 
include("includes/banco.php"); 
$con = conectar();
		
?>
<!DOCTYPE html>
<html>
<head>
    <title>UlbraChat</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
 
</head>
<body style="background:#eee;">
    
    <div class="login-container">
        <?php
            
            if(isset($_POST['login'])){
                $nome = trim(mysqli_real_escape_string($con, $_POST['nome']));
                $senha = trim(mysqli_real_escape_string($con, $_POST['senha']));
                $senha_criptografada = md5($senha);
                
                $query = mysqli_query($con,"SELECT * FROM usuarios WHERE nome='$nome' AND senha='$senha_criptografada'");
               
                if(mysqli_num_rows($query) == 1){                   
                    $fetch = mysqli_fetch_assoc($query);                   
                    session_start();
                    $_SESSION['id'] = $fetch['id'];
                    $_SESSION['nome'] = $fetch['nome'];
                    header("Location: interface.php");
                }else{                   
                    echo "<div class='alert alert-danger'>Erro de login.</div>";
                }
            }
        ?>
        <h1>Login</h1>
        <form action="index.php" method="post">
            <div class="form-group">
                <input required type="text" class="form-control" name="nome">
            </div>
            <div class="form-group">
                <input required type="password" class="form-control" name="senha">
            </div>
            <input type="submit" value="login"  name="login" class="btn btn-primary btn-block">
        </form>
      
    </div>
    <!-- /login -->
</body>
</html>
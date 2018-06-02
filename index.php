<?php 
include("includes/banco.php"); 
$con = conectar();
		
?>
<!DOCTYPE html>
<html>
<head>
    <title>UlbraChat - Login</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
 
</head>
	<body style="background:#eee;">
    
		<div class="login-container">
			<?php
            
            if(isset($_POST['login'])){
                $email = trim(mysqli_real_escape_string($con, $_POST['email']));
                $senha = trim(mysqli_real_escape_string($con, $_POST['senha']));
                $senha_criptografada = md5($senha);
                
                $query = mysqli_query($con,"SELECT * FROM usuarios WHERE email='$email' AND senha='$senha_criptografada'");
               
                if(mysqli_num_rows($query) == 1){                   
                    $fetch = mysqli_fetch_assoc($query);                   
                    session_start();
                    $_SESSION['id'] = $fetch['id'];
                    $_SESSION['email'] = $fetch['email'];
                    header("Location: home.php");
                }else{                   
                    echo "<div class='alert alert-danger'>Erro de login.</div>";
                }
            }
			?>
            
			<h3><center>Entre no UlbraChat!</center></h3>
			<form action="index.php" method="post">
				<div class="form-group">
					<input required type="text" class="form-control" name="email" placeholder="Digite seu e-mail">
				</div>
				<div class="form-group">
					<input required type="password" class="form-control" name="senha" placeholder="Digite sua senha">
				</div>
				<input type="submit" value="Entrar"  name="login" class="btn btn-primary btn-block">
			</form>
      
		</div>
	</body>
</html>
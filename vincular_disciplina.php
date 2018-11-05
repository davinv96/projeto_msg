<?php 
include("../includes/banco.php"); 
$con = conectar();
		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin UlbraChat</title>
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
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://localhost/projeto_msg/admin/home.php">Admin - UlbraChat</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuários <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li><a href="http://localhost/projeto_msg/admin/adicionar_usuarios.php">Adicionar usuários</a></li>
					<li><a href="http://localhost/projeto_msg/admin/editar_ou_excluir_usuarios.php">Editar ou Excluir usuários</a></li>
					
					</ul>
					</li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mensagens <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="http://localhost/projeto_msg/admin/mensagens_por_usuario.php">Visualizar mensagens por usuario</a></li>
					
					</ul>
					</li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administradores <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="http://localhost/projeto_msg/admin/adicionar_admin.php">Adicionar Administradores</a></li>
						<li><a href="http://localhost/projeto_msg/admin/editar_ou_excluir_admin.php">Editar ou Excluir Administrador</a></li>
					</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="http://localhost/projeto_msg/admin/logout.php">Sair <span class="glyphicon glyphicon-log-out"></span></a></li>
				</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
			</nav>

			<form name="vincula-disc" action="vincular_disciplina.php" method="POST">
				<?php
				$q = mysqli_query($con, "SELECT * FROM `usuarios` WHERE professor = 0");
				while($row = mysqli_fetch_assoc($q)){
					$array[] = $row;

				}
				
				?>
				Aluno:
				<select name="aluno">
				
				 <?php
					foreach ($array as $row){
						echo "<option value='{$row['id']}'>{$row['nome']}</option>";
					}
				  ?>
				</select><br>
				<br>
				
				<?php
				$q1 = mysqli_query($con, "SELECT * FROM `disciplina`");
				while($row = mysqli_fetch_assoc($q1)){
					$array1[] = $row;

				}
				
				?>
				Disciplina:
				<select name="disciplina">
				
				 <?php
					foreach ($array1 as $row){
						echo "<option value='{$row['id_disc']}'>{$row['nome_disc']}</option>";
					}
				  ?>
				</select><br>
				<br>
				
  				<button type="reset" class="btn btn-danger">Limpar</button>		
 				<button type="submit" class="btn btn-primary" name="vincular">Vincular</button>
			</form>
		</body>
</html>
<?php
	if(isset($_POST['vincular'])){
 		$id_aluno = $_POST["aluno"];
 		$id_disc  = $_POST["disciplina"];
		
		$q = mysqli_query($con, "INSERT INTO `usuarios_has_disciplina`(`usuarios_id`, `disciplina_id`) VALUES ('$id_aluno','$id_disc')");
		if(mysqli_affected_rows($con)>0){
			echo "<script>alert('Aluno vinculado a disciplina selecionada!');";
			echo "javascript:window.location='http://localhost/projeto_msg/admin/vincular_disciplina.php';</script>";
		}else{				
			echo "<script>alert('Erro no processo de vinculação!');";
			echo "javascript:window.location='http://localhost/projeto_msg/admin/vincular_disciplina.php';</script>";


		}
		

	}

?>
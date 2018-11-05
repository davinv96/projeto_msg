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
				
  					
 				<button type="submit" class="btn btn-primary" name="visualizar">Visualizar</button>
			</form>
		</body>
</html>
<?php
	if(isset($_POST['visualizar'])){
 		$id_aluno = $_POST["aluno"];
		
		$q = mysqli_query($con, "SELECT * FROM `usuarios_has_disciplina` WHERE `usuarios_id` = '$id_aluno'");
		if(mysqli_affected_rows($con)>0){
			while($row = mysqli_fetch_assoc($q)){
							$array[] = $row;
						
						}
						foreach ($array as $row){
							echo "<tr>";        
							echo "<td>".$row['nome_disc']."</td>";
							
							
							echo "<td><a href=http://localhost/projeto_msg/admin/editar_disciplina.php?id=".$row['id_disc']."><span class='glyphicon glyphicon-edit'></span></a></td>";
							echo "<td style='color:red'><a href=http://localhost/projeto_msg/admin/excluir_disciplina.php?id=".$row['id_disc']."><span class='glyphicon glyphicon-remove'></span></a></td>";

							echo "</tr>";
					
						}
			
		}else{				
			echo "ALUNO SEM DISCIPLINAS VINCULADAS";

		}
		

	}

?>
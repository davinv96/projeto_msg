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
		<body style="background:#eee;">
		

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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conversas <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Visualizar Conversas</a></li>
						<li><a href="#">Deletar conversas</a></li>
					
					</ul>
					</li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administradores <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="http://localhost/projeto_msg/admin/adicionar_admin.php">Adicionar Administradores</a></li>
						<li><a href="#">Editar ou Excluir Administrador</a></li>
					</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="http://localhost/projeto_msg/admin/logout.php">Sair <span class="glyphicon glyphicon-log-out"></span></a></li>
				</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
			</nav>
		</body>
</html>
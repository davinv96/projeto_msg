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
						<li><a href="http://localhost/projeto_msg/admin/editar_ou_excluir_usuarios.php">Editar ou excluir usuários</a></li>
						
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
							<li><a href="http://localhost/projeto_msg/admin/adicionar_admin.php">Adicionar administradores</a></li>
							<li><a href="http://localhost/projeto_msg/admin/editar_ou_excluir_admin.php">Editar ou excluir administrador</a></li>
						</ul>
						</li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Disciplinas <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="http://localhost/projeto_msg/admin/adicionar_disciplina.php">Adicionar Disciplinas</a></li>
							<li><a href="http://localhost/projeto_msg/admin/editar_ou_excluir_disciplina.php">Editar ou excluir disciplinas</a></li>
							<li><a href="http://localhost/projeto_msg/admin/vincular_disciplina.php">Vincular disciplinas a alunos</a></li>
							<li><a href="http://localhost/projeto_msg/admin/visualizar_disciplinas_por_aluno.php">Visualizar disciplina por aluno</a></li>
						</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="http://localhost/projeto_msg/admin/logout.php">Sair <span class="glyphicon glyphicon-log-out"></span></a></li>
					</ul>
					</div><!-- /.navbar-collaps
			</div><!-- /.container-fluid -->
			</nav>

			<form name="cadastro-admin" action="" method="POST">
				<div class="form-group">
					<label for="exampleInputEmail1">Nome do usuário</label>
					<input type="text" class="form-control" id="nome_usuario" name="nome" aria-describedby="emailHelp" placeholder="Digite seu nome e sobrenome" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Senha</label>
					<input type="password" class="form-control" id="senha_usuario" name="senha" placeholder="Digite sua Senha" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">E-mail</label>
					<input type="email" class="form-control" id="email_usuario" name="email" placeholder="Informe seu email" required>
					<small id="emailHelp" class="form-text text-muted">Será usado no Login</small>
				</div>
				<button type="reset" class="btn btn-danger">Limpar</button>		
 				<button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
			</form>
		</body>
</html>
<?php
	if(isset($_POST['cadastrar'])){
 		$nome = $_POST["nome"];
 		$senha = md5($_POST["senha"]);
		$email = $_POST["email"];
		

	
		$resultado = mysqli_query($con, "INSERT INTO admin (nome, senha, email)
		VALUES ('$nome', '$senha', '$email')");
		if(mysqli_affected_rows($con)>0){
			echo "<script>alert('Administrador cadastrado com sucesso!');</script>";
				
		}else{
			echo "<script>alert('Erro no cadastro!');</script>";

		}
		
	}

?>
<?php 
include("../includes/banco.php"); 
$con = conectar();
$usuario_conversa = $_GET['id'];
ob_start();

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
		</body>
		<?php
		if(isset($usuario_conversa)){
			$q1 = mysqli_query($con, "SELECT nome FROM `usuarios` WHERE id='$usuario_conversa'");

			while($row = mysqli_fetch_assoc($q1)){
				$nome_remet = $row['nome'];		
			}
			
		
		?>
		<table class="table table-bordered">
					<caption class="text-center"><b><h4>Mensagens enviadas por <?php echo $nome_remet; ?></h4></b></caption>
					<br>
					<br>
					<center>
					<br>
					<br>
						<thead class="thead-dark">
							<tr>
								<th scope="col"> ID do destinatário</th>
								<th scope="col"> Nome do destinatário</th>
								<th scope="col"> Mensagem</th>
								<th scope="col"> Horário de envio</th>
								<th scope="col"> Visualizada pelo destinatário</th>
											
							</tr>
						</thead>
						<tbody>
						<?php
						$q3 = mysqli_query($con, "SELECT `usuario_destino`,`mensagens`,`timestamp`,`lida` FROM `mensagens` 
						WHERE `usuario_envio`='$usuario_conversa'");

						
						while($row = mysqli_fetch_assoc($q3)){
							$id_usuario_destino = $row['usuario_destino'];
							$mensagem = $row['mensagens'];
							$timestamp = $row['timestamp'];
							$lida = $row['lida'];
							$q4 = mysqli_query($con, "SELECT `nome` FROM `usuarios` WHERE `id`='$id_usuario_destino'");
							while($row = mysqli_fetch_assoc($q4)){
								$nome_dest = $row['nome'];
							}
							echo "<tr>";     
							echo "<td align='center'>".$id_usuario_destino."</td>";
							echo "<td>".$nome_dest."</td>";
							echo "<td>".$mensagem."</td>";
							echo "<td>".$timestamp."</td>";
							if($lida == "1"){
								echo "<td><b>Sim</b></td>";
							}else{
								echo "<td>Não</td>";
							}
							echo "</tr>";
					
						}
		}	
						?>
						</tbody>

		</table>
</html>



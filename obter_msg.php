<?php
    include("includes/banco.php"); 
	$con = conectar();
	
	session_start();
	if(isset($_SESSION['id'])){
        $id_login = $_SESSION['id'];
    }
	
	
    if(isset($_GET['c_id'])){       
        $id_conversa = $_GET['c_id'];        
        $q = mysqli_query($con, "SELECT * FROM mensagens WHERE id_conversa='$id_conversa'");
	
        if(mysqli_num_rows($q) > 0){
            while ($m = mysqli_fetch_assoc($q)) {              
                $usuario_envio_msg = $m['usuario_envio'];
                $usuario_destino = $m['usuario_destino'];
                $mensagem = $m['mensagens'];               
                $usuarios = mysqli_query($con, "SELECT nome FROM usuarios WHERE id='$usuario_envio_msg'");
                $usuario_fetch = mysqli_fetch_assoc($usuarios);
                $usuario_env = $usuario_fetch['nome'];
				
				if($usuario_envio_msg==$id_login){
					echo 
						"<div class='bubble-right'>
							<div class='text-con'>
								<a href='#''>{$usuario_env}</a>
								<p>{$mensagem}</p>
							</div>
						</div>
						<br>";
						
				}else{
					echo
						"<div class='bubble-left'>
							<div class='text-con'>
								<a href='#''>{$usuario_env}</a>
								<p>{$mensagem}</p>
							</div>
						</div>
						<br>";
				}
            }
        }else{
            echo "Sem mensagens";
		}
		
		
    }
	date_default_timezone_set('America/Sao_Paulo'); 
	$data = date("Y-m-d H:i:s");
	$q1 = mysqli_query($con, "UPDATE mensagens SET lida='$data' WHERE `usuario_envio`= $id_login");
?>
<?php
    include("includes/banco.php"); 
	$con = conectar();
	
	  
    if(isset($_POST['mensagem'])){
        $mensagem = mysqli_real_escape_string($con, $_POST['mensagem']);
        $id_conversa = mysqli_real_escape_string($con, $_POST['id_conversa']);
        $usuario_envio_msg = mysqli_real_escape_string($con, $_POST['usuario_envio_msg']);
        $usuario_destino = mysqli_real_escape_string($con, $_POST['usuario_destino']);
		$usuario_logado = mysqli_real_escape_string($con, $_POST['usuario_logado']);
        
        $q = mysqli_query($con, "INSERT INTO mensagens VALUES ('','$id_conversa','$usuario_envio_msg','$usuario_destino','$mensagem')");
        if($q){
            echo "Enviado!";
        }else{
            echo "Erro no envio";
        }
    }
?>
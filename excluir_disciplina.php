<?php 
	include("../includes/banco.php"); 
	$con = conectar();
	$id=$_GET['id'];

	$resultado = mysqli_query($con, "DELETE FROM admin WHERE id = '$id'");
			
	if(mysqli_affected_rows($con)>0){
		echo "<script>alert('Disciplina deletado com sucesso!');";
		echo "javascript:window.location='http://localhost/projeto_msg/admin/editar_ou_excluir_disciplina.php';</script>";
	}else{				
		echo "<script>alert('Erro na deleção!');";
		echo "javascript:window.location='http://localhost/projeto_msg/admin/editar_ou_excluir_disciplina.php';</script>";


	}
?>
<?php
function conectar(){
	$con = mysqli_connect("localhost","root","","projeto_chat") or die("Erro de conexão ao BD");
	return $con;
}
    
?>
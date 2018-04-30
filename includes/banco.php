<?php
	function conectar(){
		$con = mysqli_connect("localhost","root","","mensageiro") or die("Erro de conexão ao BD");
		return $con;
	}
    
?>
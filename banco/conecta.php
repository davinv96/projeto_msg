<?php

    //Função de conexão ao banco de dados
	function conecta(){
		define ("HOST", "localhost");
		define ("USER", "root");
		define ("PASSWORD", "");
		define ("BASE", "projeto_msg");

        $link = mysqli_connect(HOST, USER, PASSWORD, BASE) or die("Erro de conexão ao BD"); 
        return $link;
    }
    
   
    
?>
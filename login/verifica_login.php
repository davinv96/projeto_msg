<?php
    include('banco/conecta.php');
    
        
    //Função que verifica login
    function verifica_login($login){
        if(isset($_POST["login"]) and isset($_POST["email"]) and isset($_POST["senha"])){
            $senha = $_POST["senha"];
            $email = $_POST["email"];
            $senha_criptografada = md5($senha);

            $link = conecta(); 
            $query = mysqli_query($link, "SELECT * FROM usuario where email = '$email' and senha = '$senha_criptografada'");

            if(mysqli_num_rows($query) == 1){              
                $fetch = mysqli_fetch_assoc($query);
                session_start();
                $_SESSION['id_usuario'] = $fetch['id_usuario'];
                $_SESSION['nome'] = $fetch['nome'];
                header("Location: mensageiro.php");
            }else{
                echo "Erro de login";
            }
             
        }
       
    }
   
?>
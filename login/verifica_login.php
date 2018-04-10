<?php
    include_once('../banco/conecta.php');

    //Função que verifica login
    function verifica_login($usuario, $senha){
        if(isset($_POST['login'])){
            $email = trim(mysqli_real_escape_string($link, $_POST['email']));
            $senha = trim(mysqli_real_escape_string($link, $_POST['senha']));
            $senha_criptografada = md5($senha);
            
            $query = mysqli_query($link,'SELECT * FROM usuario where email = '.$email.' and senha = '.$senha_criptografada.'');
            if(mysqli_num_rows($query) == 1){
              
                $fetch = mysqli_fetch_assoc($query);

                session_start();
                $_SESSION['id'] = $fetch['id'];
                $_SESSION['username'];
                echo "Login feito com sucesso!";
                //header('Location: mensageiro.php');
            }else{
                echo "Erro de login";
            }
        }
    }
   
?>








?>
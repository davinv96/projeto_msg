<?php
    include_once('banco/conecta.php');
    include_once('login/verificalogin.php');
?>
<html>
<head>
    <title>Teste Login</title>
    
 
</head>
     <h1>Login</h1>
        <form action="index.php" method="post">
            <div class="form-group">
                Email:<input required type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                Senha:<input required type="password" class="form-control" name="senha">
            </div>
            <input type="submit" value="login"  name="login" class="btn btn-primary btn-block">
        </form>
        <br>
        
   
</body>
</html>
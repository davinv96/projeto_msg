<?php
    include_once('login/verifica_login.php');
?>
<html>
<head>
    <title>Teste Login</title>
</head>
<body>

     <h1>Login</h1>
        <form action="login.php" method="post" name="login">
            <div class="form-group">
                Email:<input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                Senha:<input type="password" class="form-control" name="senha">
            </div>
            <input type="submit" value="login"  name="login" class="btn btn-primary btn-block">
        </form>
        <br>
    
</body>
</html>

<?php
    if(isset($_POST["login"])){
        $login = $_POST["login"];
        verifica_login($login);
    }
?>
<!doctype html>
<html lang="pt-br">
<?php
	session_start();
?>

    <head>
        <title>Estrutura Base</title>
        <meta charset="utf-8">
        <meta name="author" content="Victor">
        <meta name="description" content="Primeiros Passos em HTML">
        <meta name="keywords" content="HTML5, Curso, Informática, Tecnologia">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="Conf-Login/css/estilo.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
       

    </head>
    <body>
        <div class="container-login">
            <h1>Login</h1>
            <form action="Login.php" method="POST">
                <label for="usuario">Usuário</label>
                <input type="text" name="username_usuario" id="username_usuario" placeholder="Insira seu usuário aqui" autocomplete="off" autofocus required>
                <label for="password">Senha</label>
                <input type="password" name="password_usuario" id="password_usuario" placeholder="Insira sua senha aqui" required>
                <input type="submit" name="entrar" value="entrar">
            </form>
            <p class="">
          <?php if(isset($_SESSION['loginBloqueado'])){
            echo $_SESSION['loginBloqueado'];
            unset($_SESSION['loginBloqueado']);
        }?>
    </p>
    <p class="text-center text-success">
        <?php 
        if(isset($_SESSION['deslogado'])){
            echo $_SESSION['deslogado'];
            unset($_SESSION['deslogado']);
        }
        ?>
        <?php if(isset($_SESSION['contatoresponsável'])){
            echo $_SESSION['contatoresponsável'];
            unset($_SESSION['contatoresponsável']);
        }?>
    </p>
    <p class="">
    <?php if(isset($_SESSION['logininvalido'])){
            echo $_SESSION['logininvalido'];
            unset($_SESSION['logininvalido']);
        }?>
    </p>
    <?php if(isset($_SESSION['Caps'])){
            echo $_SESSION['Caps'];
            unset($_SESSION['Caps']);
        }?>
    </p>
            
        </div>
    </body>
</html>
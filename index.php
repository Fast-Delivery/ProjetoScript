<!doctype html>
<html lang="pt-br">
    <head>
        <title>Estrutura Base</title>
        <meta charset="utf-8">
        <meta name="author" content="Victor">
        <meta name="description" content="Primeiros Passos em HTML">
        <meta name="keywords" content="HTML5, Curso, Informática, Tecnologia">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="Conf-Login/css/estilo.css">
    </head>
    <body>
        <div class="container-login">
            <h1>Login</h1>
            <form action="Login.php" method="POST">
                <label for="email_usuario">E-mail</label>
                <input type="email" name="email_usuario" id="email_usuario" placeholder="Insira seu E-mail aqui" autocomplete="off" autofocus required>
                <label for="password">Senha</label>
                <input type="password" name="password_usuario" id="password" placeholder="Insira sua senha aqui" required>
                <input type="submit" value="Entrar">
            </form>
    
            
        </div>
    </body>
</html>
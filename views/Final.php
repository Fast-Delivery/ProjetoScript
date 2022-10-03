<!DOCTYPE html>
<html lang="pt-br">
<?php

session_start();
if(!empty($_SESSION['id_usuario'])){
include_once("../Conexao.php");
        

            if(isset($_POST['final'])){
        
            $result1 = $_POST['final'];
            $resultado_grupo =  mysqli_query($conn,"SELECT * FROM grupo");
            $resultado_nivel =  mysqli_query($conn,"SELECT * FROM nivel");
            $resultado_username =  mysqli_query($conn,"SELECT * FROM bd_usuario");

            $id_session = $_SESSION['id_usuario'];
			$nome_session = $_SESSION['nome_usuario'];
			$email_session = $_SESSION['email_usuario'];
			$username_session = $_SESSION['username_usuario'];
			$status_session= $_SESSION['status_grupo']; 

            $result_mensagem =  mysqli_query($conn,"SELECT * FROM mensagem WHERE status_mensagem = 0 AND username_mensagem = $id_session");
            $mensagem=mysqli_num_rows($result_mensagem);  
            $result_notificacao =  mysqli_query($conn,"SELECT * FROM notificacao WHERE status_notificacao = 0 AND username_notificacao = $id_session");
            $notificacao=mysqli_num_rows($result_notificacao); 


?>
 


<head>
<script type="text/javascript" src="../js/purl.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja Bem vindo ao projeto AONET</title>
    <link rel="stylesheet" href="../assets/css/site.css">
    <link rel="icon" href="../assets/img/logo.png">
</head>

<body>
<header class="header">
        <div class="header-logo">
            <img src="../assets/img/logo2.png" alt="" class="header-logo-img">
        </div>
        <a class="responsive-header-nav header-a open-menu" href="#" onclick="menuShow();"><i class="fa-solid fa-bars"></i></a>
        <nav class="header-nav">
            <li class="header-li"><a href="index.php" class="header-a"><i class="fa-solid fa-house"></i> Ranking</a></li>
            <li class="header-li"><a href="check.php" class="header-a"><i class="fa-solid fa-people-group"></i> Checklist</a></li>
            <li class="header-li"><a href="mensagem.php" class="header-a"><i class="fa-solid fa-envelope"></i> Mensagens <span class="span-notification"><?php echo $mensagem ?></span></a></li>
            <li class="header-li"><a href="indicador.php" class="header-a"><i class="fa-solid fa-user"></i> Indicador</a></li>
            <li class="header-li"><a href="notificacao.php" class="header-a"><i class="fa-solid fa-bell"></i> Notificações <span class="span-notification"><?php echo $notificacao?></span></a></li>
        </nav>
        <nav class="mobile-menu">
            <li class="header-li"><a href="index.php" class="header-a"><i class="fa-solid fa-house"></i> Ranking</a></li>
            <li class="header-li"><a href="check.php" class="header-a"><i class="fa-solid fa-people-group"></i> Checklist</a></li>
            <li class="header-li"><a href="mensagem.php" class="header-a"><i class="fa-solid fa-envelope"></i> Mensagens <span class="span-notification"><?php echo $mensagem ?></span></a></li>
            <li class="header-li"><a href="indicador.php" class="header-a"><i class="fa-solid fa-user"></i> Indicador</a></li>
            <li class="header-li"><a href="notificacao.php" class="header-a"><i class="fa-solid fa-bell"></i> Notificações <span class="span-notification"><?php echo $notificacao?></span></a></li>
            <li class="header-li form-search-responsive">
                <form action="/" class="form-search-header">
                    <input type="text" class="form-search-input" placeholder="Pesquise...">
                    <button type="submit" class="form-search-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </li>
        </nav>
        <div class="dropdown" data-dropdown>
            <button class="header-profile no-button username-header link" data-dropdown-button>
                <img src="../assets/img/user.png" alt="" class="img-header-profile">
                Usuário
            </button>
            <div class="dropdown-menu  information-grid">
                <a href="#" class="dropdown-link"><i class="fa-solid fa-bookmark"></i>Modo ADM</a>
                <a href="#" class="dropdown-link"><i class="fa-solid fa-gear"></i> Configurações</a>
                <a href="sair.php" class="dropdown-link"><i class="fa-solid fa-door-open"></i> Sair</a>
            </div>
        </div>
    </header>
    <main class="main-content">

           <br>Script
        <br>
        

           <textarea class="text"><?php echo $result1; ?></textarea>
<button id="copy">Copiar</button>

    <script>
let btn = document.querySelector('#copy');
btn.addEventListener('click', function(e) {
  let textArea = document.querySelector('.text');
  textArea.select();
  document.execCommand('copy');
  
});
    </script>

       
    </main>
    <script src="../assets/js/script.js"></script>

</body>
<?php }else{

$_SESSION['deslogado'] = "Área restrita";
	header("Location: ../index.php");	
}
}else{
    $_SESSION['deslogado'] = "Área restrita";
	header("Location: ../index.php");	

}
?>
</html>
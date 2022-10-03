<!DOCTYPE html>
<html lang="pt-br">
    <?php
session_start();
if(!empty($_SESSION['id_usuario'])){
include_once("../Conexao.php");

            $id_session = $_SESSION['id_usuario'];
			$nome_session = $_SESSION['nome_usuario'];
			$email_session = $_SESSION['email_usuario'];
			$username_session = $_SESSION['username_usuario'];
			$status_session= $_SESSION['status_grupo']; 

            $result_mensagem =  mysqli_query($conn,"SELECT * FROM mensagem WHERE status_mensagem = 0 AND username_mensagem = $id_session");
            $mensagem=mysqli_num_rows($result_mensagem);  
            $result_notificacao =  mysqli_query($conn,"SELECT * FROM notificacao WHERE status_notificacao = 0 AND username_notificacao = $id_session");
            $notificacao=mysqli_num_rows($result_notificacao); 
            @$btn = $_POST['ver'];
            



?>






<head>
    <script type="text/javascript" src="../js/purl.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja Bem vindo ao projeto AONET</title>
    <link rel="stylesheet" href="../assets/css/site.css">
    <link rel="icon" href="../assets/img/logo.png">
    <!--Pegar as informações do Select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="../js/purl.js"></script>


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
            <li class="header-li"><a href="notificacao.php" class="header-a"><i class="fa-solid fa-bell"></i> Notificações <span class="span-notification"><?php echo $notificacao ?></span></a></li>
        </nav>
        <nav class="mobile-menu">
            <li class="header-li"><a href="index.php" class="header-a"><i class="fa-solid fa-house"></i> Ranking</a></li>
            <li class="header-li"><a href="check.php" class="header-a"><i class="fa-solid fa-people-group"></i> Checklist</a></li>
            <li class="header-li"><a href="mensagem.php" class="header-a"><i class="fa-solid fa-envelope"></i> Mensagens <span class="span-notification"><?php echo $mensagem ?></span></a></li>
            <li class="header-li"><a href="indicador.php" class="header-a"><i class="fa-solid fa-user"></i> Indicador</a></li>
            <li class="header-li"><a href="notificacao.php" class="header-a"><i class="fa-solid fa-bell"></i> Notificações <span class="span-notification"><?php echo $mensagem ?></span></a></li>
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
    <section class="section ">
        <h1 class="section-title">Mensagens</h1>
<?php
    $query = mysqli_query($conn, "SELECT * FROM mensagem ");

//faz um looping e cria um array com os campos da consulta

    ?>

    <script src="../assets/js/script.js"></script>
<table class="table">
    <thead>
    <tr>
        <th>Assunto</th>
        <th>Mensagem</th>
        <th>Setor</th>
        <th>Comando</th>
       
    </tr>
    </thead>
    <?php
    while($array = mysqli_fetch_object($query)) {
    ?>
    <tr>
        <td><?php $assunto_mensagem = $array->assunto_mensagem; 
        $resposta_assunto = substr($assunto_mensagem, 0, 25);
         echo $resposta_assunto."..."; 
        ?></td>
        <td><?php $mensagem_usuario = $array->mensagem_usuario; 
        $id_mensagem = $array->id_mensagem; 
        $resposta = substr($mensagem_usuario, 0, 25);
        echo $resposta."...";
        
        ?></td>
        <td><?php echo $array->setor_usuario; 
        $setor_usuario = $array->setor_usuario; ?></td>
        <form method="POST" action="" class="form">
        <input type="hidden" name="assunto_mensagem"  value="<?php echo $assunto_mensagem?>"> 
        <input type="hidden" name="mensagem_usuario"  value="<?php echo $mensagem_usuario?>"> 
        <input type="hidden" name="setor_usuario"  value="<?php echo $setor_usuario?>"> 
        <input type="hidden" name="id_mensagem"  value="<?php echo $id_mensagem?>"> 
        <td><input type="submit" name="ver" class="submit-form btn btn-green btn-50-size" value="Ver" ></td>
        </form>
    </tr>
<?php }?>
</table>
</section> 

<?php if($btn =="Ver"){

$assunto_mensagem = $_POST['assunto_mensagem'];
$mensagem_usuario = $_POST['mensagem_usuario'];
$setor_usuario = $_POST['setor_usuario'];
echo "<section class='section'>";
$id_mensagem = $_POST['id_mensagem'];
$status_mensagem = mysqli_query ($conexao, "UPDATE mensagem SET status_mensagem = 1 WHERE id_mensagem = $id_mensagem");
echo '<table class="table">
<thead>
<tr>
    <th>SETOR</th>
    <th>ASSUNTO</th>
</tr>
</thead>
<tr>
    <th>'.$setor_usuario.'</th>
    <th >'.$assunto_mensagem.'</th>
</tr>
<tr>
    <th colspan="2">MENSAGEM</th>
</tr>
<tr>
    <th colspan="2">'.$mensagem_usuario.'</th>
</tr>

<tr>
    <td><form method="POST" action="" class="form">
    <input type="submit" name="fechar" class="submit-form btn btn-green btn-50-size" value="Fechar" >
    </td>
    <td><center> Download do arquivo </center></td>
</tr>
</table>';

echo "</section>";
}else{

}?>
  

 </main>

</body>
<?php
}else{
	$_SESSION['deslogado'] = "Área restrita";
	header("Location: ../index.php");	
}
?>
</html>
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
    <div class="container-home">
    <section class="section">

    <!-- imprime os titulos para coluna, parte fixa -->
<h1 class="section-title">RANK 5</h1>
<table class="table">
<thead>
    <tr>
        <td>Posição</td>
        <td>Nome</td>
        <td>Quantidade</td>
        <td>Medalha</td>
        <td>........</td>
    </tr>
</thead>
<?php

$posicao = 1; //variavel

// Inclui o arquivo que faz a conexão ao banco de dados

//consulta sql
$query = mysqli_query($conn, "SELECT * FROM bd_rank ORDER BY qt Desc Limit 0,5");

//faz um looping e cria um array com os campos da consulta
while($array = mysqli_fetch_object($query)) {

  
?>
 

 <tr>
<td><?php echo $posicao;
 $p = $posicao;  ?></td>
<td><?php 

$nome = $array->usuario; 
$status = $array->status_rank; 

switch ($status) {
    case 1:
     echo $nome;
          break;
    case 2:
     echo "Oculto";
          break;
    case 0:
     echo "<u>".$nome."</u>";
          break;
 }


?>
</td>
<td> <?php echo $array->qt; 
?>  
</td>
<td>
<?php
switch ($posicao) {
   case 1:
    echo "<center><img src='Img/medalha-de-ouro.png' idth='15' height='15'/></center>";
         break;
   case 2:
    echo "<center><img src='Img/medalha-de-prata.png' idth='15' height='15'/></center>";
         break;
   case 3:
    echo "<center><img src='Img/medalha-de-bronze.png' idth='15' height='15'/></center>";
         break;
         case 4:
            echo "<center><img src='Img/Aonet.png' idth='15' height='15'/></center>";
            break;
            case 5:
                echo "<center><img src='Img/Aonet.png' idth='15' height='15'/></center>";
                break;
   default:
         //código caso nenhuma condição seja atendida
         break;
}
?>
</td>
    <td> 
    <?php $user = $array->usuario;
switch ($user) {
    case $username_session:
        echo "<center><img src='Img/estrela.png' idth='15' height='15'/></center>";
        break;
        
    }?>
    </td>

<?php
$posicao = $posicao + 1; 
} ?>
</tr>

</table>
    </section>

    <section class="section section-right">
    <p>Sua posição</p>
<?php




$posicao = 1; //variavel

// Inclui o arquivo que faz a conexão ao banco de dados

//consulta sql
$query = mysqli_query($conn, "SELECT * FROM bd_rank ORDER BY qt Desc Limit 0,10");

//faz um looping e cria um array com os campos da consulta
while($array = mysqli_fetch_object($query)) {
$posicao;
 $p = $posicao;
 $qt = $array->qt;
 $user = $array->usuario;
switch ($user) {
case $username_session:
    echo "<h1 class='section-title'><center>" .$posicao. "</center></h1></br>" ;
echo "<p>Quantidades de atendimentos finalizados:<u> ".$qt."</u></p>";
    break;
case $username_session:
    echo "Você nao aparece no Rank 10";
    break;
}
 
$posicao = $posicao + 1; } ?>
    



    </section>
    <section class="section section-home">
    <?php
        echo $username_session; ?>

</section>
</div>
      
        </main>
<script src="../assets/js/script.js"></script>

</body>
<?php
}else{
	$_SESSION['deslogado'] = "Área restrita";
	header("Location: ../index.php");	
}
?>
</html>
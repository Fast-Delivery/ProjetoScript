<!DOCTYPE html>
<html lang="pt-br">
    <?php
            include_once("../Conexao.php");
            $resultado_grupo =  mysqli_query($conn,"SELECT * FROM grupo");
            $resultado_nivel =  mysqli_query($conn,"SELECT * FROM nivel");
            $resultado_username =  mysqli_query($conn,"SELECT * FROM bd_usuario");
		


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
            <form action="/" class="form-search-header form-search-lg">
                <input type="text" class="form-search-input" placeholder="Pesquise...">
                <button type="submit" class="form-search-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <a class="responsive-header-nav header-a open-menu" href="#" onclick="menuShow();"><i
                class="fa-solid fa-bars"></i></a>
        <nav class="header-nav">
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-house"></i> Home</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-people-group"></i> Modulos</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-envelope"></i> Mensagens <span
                        class="span-notification">3</span></a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-user"></i> Perfil</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-bell"></i> Notificações <span
                        class="span-notification">3</span></a></li>
        </nav>
        <nav class="mobile-menu">
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-house"></i> Home</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-people-group"></i> Amigos</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-envelope"></i> Mensagens <span
                        class="span-notification">3</span></a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-user"></i> Perfil</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-bell"></i> Notificações <span
                        class="span-notification">3</span></a></li>
            <li class="header-li form-search-responsive">
                <form action="/" class="form-search-header">
                    <input type="text" class="form-search-input" placeholder="Pesquise...">
                    <button type="submit" class="form-search-submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </li>
        </nav>
        <div class="dropdown" data-dropdown>
            <button class="header-profile no-button username-header link" data-dropdown-button>
                <img src="../assets/img/user.png" alt="" class="img-header-profile">
                Usuário
            </button>
            <div class="dropdown-menu  information-grid">
                <a href="#" class="dropdown-link"><i class="fa-solid fa-bookmark"></i> Salvos</a>
                <a href="#" class="dropdown-link"><i class="fa-solid fa-gear"></i> Configurações</a>
                <a href="#" class="dropdown-link"><i class="fa-solid fa-door-open"></i> Sair</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div>
                    <h4>Listar Usuários</h4>
                </div>
            </div>
        </div>
        <hr>

        <!-- SELETOR "msgAlerta" responsavel em receber a mensagem de sucesso ou erro -->
        <span id="msgAlerta"></span>

        <div class="row">
            <div class="col-lg-12">
                <!-- SELETOR "listar-usuarios" responsavel em receber os registros do banco de dados -->
                <span class="listar-usuarios"></span>
            </div>
        </div>
    </div>

    <script src="1/js/custom.js"></script>
</body>

</html>
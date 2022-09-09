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
    <main class="main-content">
        <section class="section section-form">
            <h1 class="section-title">Cadastro de usuário</h1>
            <form method="POST" class="form" action="Listar.php">
            <button type="submit" class="submit-form btn btn-green">Listar</button>
</form>
            <form method="POST" class="form" action="Processa.php">
                <div class="form-group">
                    <div>
                        <label for="" class="label-form">Nome</label>
                        <div class="input-icon">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="nome_usuario" id="nome_usuario" class="input-form"
                                placeholder="Insira seu nome de usuário">
                        </div>
                    </div>
                    <div>
                        <label for="" class="label-form">Sobrenome</label>
                        <div class="input-icon">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="sobrenome_usuario" id="sobrenome_usuario" class="input-form" placeholder="Insira seu sobrenome">
                        </div>
                    </div>
                </div>
                <label for="" class="label-form">Email</label>
                <div class="input-icon">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email_usuario" id="email_usuario" class="input-form" placeholder="Insira seu nome de usuário">
                </div>
                <div class="form-group">
                    <div>
                        <label for="" class="label-form">Senha</label>
                        <div class="input-icon">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="senha_usuario" id="senha_usuario" class="input-form"
                                placeholder="Insira seu nome de usuário">
                        </div>
                    </div>
                    <div>
                        <label for="grupo" class="label-form">Departamento</label>
                        <div class="input-icon">
                        <i class="fa-solid fa-user-group"></i>
                  
                           <!--- <input type="text" name="grupo" id="grupo" class="input-form" placeholder="Confirme sua senha"> --->


                            <select name="grupo" id="grupo" class="input-form">
                <?php
                while($grupo = mysqli_fetch_assoc($resultado_grupo)){
                 ?>
                <option value="<?php echo $grupo['status_grupo']; ?>"><?php echo $grupo['status_grupo']; ?></option><?php     }?>
                </select>
                <script>
                 $(document).ready(function() {
                   $('#grupo').select2();
                          });
                 </script>


                        </div>
                    </div>
                </div>

                       <!---Seleção de Grupos--->


                <label for="" class="label-form">Nível de Acesso</label>
                <div class="input-icon">
                    <i class="fa-solid fa-user-shield"></i>
                       <select name="nivel" id="nivel" class="input-form">
               <?php
               while($nivel = mysqli_fetch_assoc($resultado_nivel)){
                 ?>
                <option value="<?php echo $nivel['id_nivel_de_acesso']; ?>"><?php echo $nivel['nivel']; ?></option><?php     }?>
                </select>
                <script>
                 $(document).ready(function() {
                   $('#nivel').select2();
                         });
                 </script>




                </div>
                <button type="submit" class="submit-form btn btn-green">Entrar</button>
            </form>
        </section>
    </main>
    <script src="../assets/js/script.js"></script>
</body>

</html>
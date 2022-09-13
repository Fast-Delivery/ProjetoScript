<!DOCTYPE html>
<html lang="pt-br">


<script type="text/javascript">
    function divide() {
        var txt;
        txt = document.getElementById('a').value;
        var text = txt.split(".");
        var str = text.join('.</br>');

    };
</script>

<?php
include_once("../Conexao.php");




@$resul = $_GET['Sequencia_checklist'];


$resultado_grupo =  mysqli_query($conn, "SELECT * FROM grupo");
$resultado_nivel =  mysqli_query($conn, "SELECT * FROM nivel");
$resultado_username =  mysqli_query($conn, "SELECT * FROM bd_usuario");









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
        <a class="responsive-header-nav header-a open-menu" href="#" onclick="menuShow();"><i class="fa-solid fa-bars"></i></a>
        <nav class="header-nav">
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-house"></i> Home</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-people-group"></i> Modulos</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-envelope"></i> Mensagens <span class="span-notification">3</span></a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-user"></i> Perfil</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-bell"></i> Notificações <span class="span-notification">3</span></a></li>
        </nav>
        <nav class="mobile-menu">
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-house"></i> Home</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-people-group"></i> Amigos</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-envelope"></i> Mensagens <span class="span-notification">3</span></a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-user"></i> Perfil</a></li>
            <li class="header-li"><a href="#" class="header-a"><i class="fa-solid fa-bell"></i> Notificações <span class="span-notification">3</span></a></li>
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
                <a href="#" class="dropdown-link"><i class="fa-solid fa-bookmark"></i> Salvos</a>
                <a href="#" class="dropdown-link"><i class="fa-solid fa-gear"></i> Configurações</a>
                <a href="#" class="dropdown-link"><i class="fa-solid fa-door-open"></i> Sair</a>
            </div>
        </div>
    </header>
    <main class="main-content">
    
        <?php

        if (empty($resul)) {

            $resultado_op = mysqli_query($conn, "SELECT * FROM grupo_cheklist");
            mysqli_query($conn,"SET NAMES 'utf8'");
            mysqli_query($conn,'SET character_set_connection=utf8');
            mysqli_query($conn,'SET character_set_client=utf8');
            mysqli_query($conn,'SET character_set_results=utf8');

            ?>
            <div class="container-center">
            <section class="section">
            <h1 class="section-title">Opções</h1>
            <?php
            while ($op = mysqli_fetch_assoc($resultado_op)) {

            ?>
        

                <form method="GET" action="" class="form">
                    <input type="hidden"  name="Sequencia_checklist" value="1">
                    <input type="hidden" name="result1" value="">
                    <input type="submit" class="btn btn-green btn-max btn-300-size" name="nome_grupo" value="<?php echo $op['nome_grupo']; ?>">
                </form>
       
        <?php
        }
        ?>
         </section>
        </div>
        <?php
        
        } else {

            $grupo = $_GET['nome_grupo'];
            $result1 = $_GET['result1'];

            $resultado_check =  mysqli_query($conn, "SELECT * FROM cheklist_db WHERE Nome_checklist LIKE '$grupo' AND Sequencia_checklist LIKE $resul");

            while ($check = mysqli_fetch_assoc($resultado_check)) {



                ?>
    
                    <?php
                    $Procedimento = $check['Procedimento_checklist'];
                    $resul = $_GET['Sequencia_checklist'];
                    $result1 .= $resul;
                    $result1 .= '-';
                    $result1 .= $Procedimento;
                    $result1 .= '. ';




                    ?>
                    <div class="container-sections">
                    <section class="section">
                        <h1 class="section-title">Resolução de Problema</h1>
                        <form method="GET" action="" class="form">
                            <input type="hidden" name="Sequencia_checklist" value="<?php echo $check['Sequencia_checklist'] + 1; ?>">
                            <input type="hidden" name="nome_grupo" value="<?php echo utf8_decode($grupo); ?>">
                            <input type="hidden" name="result1" value="<?php echo $result1; ?>">

                            <textarea rows="20" cols="50" name="txt" id="a" class="text-area"> <?php echo $result1; ?> </textarea>
                        <input type="submit" type="submit" name="submit" class="btn btn-green" value="Próximo">
                        </form>
                    </section>
                    <section class="section">
                    <div class="form">
                        <textarea rows="20" cols="50" class="text-area"><?php echo $result1; ?></textarea>
                        <button id="copy" class="btn btn-blue">Copiar</button>
                    </div>
                    </section>
                    </div>
                <?php
            } ?>
               

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
<?php }  ?>
</body>

</html>
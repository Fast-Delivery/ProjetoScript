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




@$resul = $_POST['Sequencia_checklist'];
@$Procedimento = $_POST['Procedimento'];
@$nome_assinante = $_POST['nome_assinante'];
@$phone = $_POST['phone'];
@$endereco = $_POST['endereco'];
@$email = $_POST['email'];
@$grupo = $_POST['nome_grupo'];
@$result1 = $_POST['result1'];



$resultado_grupo =  mysqli_query($conn, "SELECT * FROM grupo");
$resultado_nivel =  mysqli_query($conn, "SELECT * FROM nivel");
$resultado_username =  mysqli_query($conn, "SELECT * FROM bd_usuario");
$resultado_grupo_cheklist =  mysqli_query($conn,"SELECT * FROM grupo_cheklist WHERE status = 1");

$resultado_regra = mysqli_query($conn,"SELECT * FROM regra");






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
    <div class="container-home">
            <div>
            <section class="section">
            <h1 class="section-title">Regra</h1>



            <?php
                while($regra = mysqli_fetch_assoc($resultado_regra)){
               $nome_regra = $regra['regra'];
               $nome_regra .= ". \n";
               echo nl2br($nome_regra);
                }
                 ?>




            <form method="POST" action="" class="form">
            <input type="hidden" name="Sequencia_checklist"  value="1"> <br>   
            <input type="hidden" name="result1"  value=""> <br>
            <input type="hidden" name="Procedimento"  value=""> <br>   
            

            
              


      
            </section>
        <section class="section">
        <h2 class="section-title">Opções</h2>
        <input type="submit" class="submit-form btn btn-green btn-50-size" value="Começar">
        <input type="submit" class="submit-form btn btn-green btn-50-size" value="Resetar">
        </section>

        </div>
 </section>
 <section class="section section-form">
            <h1 class="section-title">Inicio Procedimento</h1>
                <div class="form-group">
                    <div>
                        <label for="" class="label-form">Assinante/CPF/CNPJ</label>
                        <div class="input-icon">
                            <i class="fa-solid fa-user"></i>
                           <!-- <input type="text" name="" id="" class="input-form"
                                placeholder="Insira seu nome de usuário"> -->

                <select name="nome_assinante" id="" class="input-form">
               
                <option value="">Selecione</option>
                <option value="Jefferson Mariano Torres CPF:501.848.79841">Jefferson Mariano Torres CPF:501.848.79841</option>
                <option value="Roberto Carlos CNPJ:05.158/0001-4">Roberto Carlos CNPJ:05.158/0001-48</option>
                </select>
              
                <!---Tratar essa class-->
                <script>
                 $(document).ready(function() {
                   $('#assinante').select2();
                });
                </script>





                        </div>
                       
                 
                    </div>
                    
                    <div>
                        <label for="" class="label-form">Telefone</label>
                        <div class="input-icon">
                            <i class="fa-solid fa-user"></i>
                            <input type="phone" name="phone" id="" class="input-form" placeholder="Insira do assinante">
                        </div>
                    </div>
                </div>
                <label for="" class="label-form">Endereço</label>
                <div class="input-icon">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="endereco" id="" class="input-form" placeholder="Insira o endereço">
                </div>
                <div class="form-group">
                    <div>
                        <label for="" class="label-form">Email</label>
                        <div class="input-icon">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" id="" class="input-form"
                                placeholder="Insira seu nome de usuário">
                        </div>
                    </div>
                    <div>
                        <label for="" class="label-form">Procedimento</label>
                        <div class="input-icon">
                            <i class="fa-solid fa-lock"></i>
                            <select name="nome_grupo" id="" width="50" class="input-form" style="width: %;">
                <?php
                while($cheklist = mysqli_fetch_assoc($resultado_grupo_cheklist)){
                 ?>
                <option style="width: 100%;" row="50" value="<?php echo $cheklist['nome_grupo']; ?>" ><?php echo $cheklist['nome_grupo']; ?></option><?php     }?>
                </select>

                <!---Tratar essa class-->
                <script>
                 $(document).ready(function() {
                   $('#nome_grupo').select2();
                          });
                 </script>
                    </select>
                        </div>
                    </div>
                </div>
            </form>
        </section>
</div>
<?php
 
}elseif($Procedimento == 'O.S.'){

 //   echo $_GET['Sequencia_checklist'];
 //   echo $_GET['nome_grupo'];
 

 
 $resultado_check =  mysqli_query($conn,"SELECT * FROM cheklist_db WHERE Nome_checklist LIKE '$grupo' AND Sequencia_checklist LIKE $resul");

 while($check = mysqli_fetch_assoc($resultado_check)){ 

    $Procedimento = $check['Procedimento_checklist']; 
    $Sequencia =$check['Sequencia_checklist'];
    $foto = $check['Img_Check']; 
    $resul = $grupo;
    $resul .= $_POST['Sequencia_checklist'];
    $result1 .= $resul;
    $result1 .= '-';
    $result1 .= $Procedimento;
    $result1 .= ".\n \n";


         


 }



     


            ?>
            <div class="container-sections">
            <section class="section">
                <h1 class="section-title">Resolução de Problema, vai ser com  O.S. ?</h1>
                <h3 class="section-title"><?php echo $grupo; ?></h3>

                <form method="POST" action="" class="form">  
			<input type="hidden" name="Sequencia_checklist" value="<?php echo $Sequencia +1; ?>"> 
            <input type="hidden" name="nome_grupo"  value="<?php echo $grupo; ?>"> 
            <input type="hidden" name="result1"  value="<?php echo $result1; ?>"> 
            <input type="hidden" name="Procedimento"  value="<?php echo $Procedimento; ?>"> 



                  <!--  <input type="hidden" name="Sequencia_checklist" value="<//?php echo $check['Sequencia_checklist'] + 1; ?>">
                    <input type="hidden" name="nome_grupo" value="<//?php echo utf8_decode($grupo); ?>">
                    <input type="hidden" name="result1" value="<//?php echo $result1 +1; ?>"-->

                   
                    
                    <?php
                    

echo nl2br($result1);
    ?>
              
              
                <!--<input type="submit" type="submit" name="submit" class="btn btn-blue" value="Próximo"> -->
                </form>
            </section>
            <section class="section">
            <div class="form">
                <!--Criar uma Div para colocar a Imagem em uma proporção padrão, por favor usar o pequeno -->
                <?php
                @$final .= $grupo.
                "\n".
                "Nome do Assinante: ".$nome_assinante.
                " Telefone: "
                .$phone.
                "\n".
                "End: "
                .$endereco.
                "\n".
                "E-mail: "
                .$email;
                $final .= "\n".$result1;

          

            ?>
                </form>
               <form method="POST" action="Final.php"> 
               <input type="hidden" name="final" value="<?php echo $final?>">    
               <input type="submit" name="submit" class="btn btn-red" value="O.S.">


               </form><br/>
               <form method="POST" action="Final.php">  
               <input type="hidden" name="final" value="<?php echo $final?>"> 
               <input type="submit" name="submit" class="btn btn-green" value="Resolvido">
               </form>

            </div>
            </section>
            </div>
        <?php
    
    }else{

        $grupo = $_POST['nome_grupo'];
        $result1 = $_POST['result1'];
       
        $resultado_check =  mysqli_query($conn,"SELECT * FROM cheklist_db WHERE Nome_checklist LIKE '$grupo' AND Sequencia_checklist LIKE $resul");
       
        while($check = mysqli_fetch_assoc($resultado_check)){ 
       
             $Procedimento = $check['Procedimento_checklist']; 
             $Sequencia =$check['Sequencia_checklist'];
             $foto = $check['Img_Check']; 
             $resul = $_POST['Sequencia_checklist'];
             $result1 .= $resul;
             $result1 .= '-';
             $result1 .= $Procedimento;
             $result1 .= ". \n \n";
            
           
       
             @$final .= $grupo.
"\n".
"Nome do Assinante: ".$nome_assinante.
" Telefone: "
.$phone.
"\n".
"End: "
.$endereco.
"\n".
"E-mail: "
.$email;   
             $final .= "\n".$result1;
       
        }
       
            
       
       
                   ?>
                   <div class="container-sections">
                   <section class="section">
                       <h1 class="section-title">Resolução de Problema</h1> 
                       <h3 class="section-title"><?php echo $grupo; ?></h3>

                       <form method="POST" action="" class="form">
                   <input type="hidden" name="Sequencia_checklist" value="<?php echo $Sequencia +1; ?>"> 
                   <input type="hidden" name="nome_grupo"  value="<?php echo $grupo; ?>"> 
                   <input type="hidden" name="result1"  value="<?php echo $result1; ?>"> 
                   <input type="hidden" name="Procedimento"  value="<?php echo $Procedimento; ?>"> 
       
       
       
                         <!--  <input type="hidden" name="Sequencia_checklist" value="<//?php echo $check['Sequencia_checklist'] + 1; ?>">
                           <input type="hidden" name="nome_grupo" value="<//?php echo utf8_decode($grupo); ?>">
                           <input type="hidden" name="result1" value="<//?php echo $result1 +1; ?>"-->
       
                          
                         <!--  <textarea rows="20" cols="50" name="txt" id="a" class="text-area"> </?php echo $result1; ?> </textarea> -->


                           <?php
   
   
   echo nl2br($result1);

           ?>
                           
                       <input type="submit" type="submit" name="submit" class="btn btn-blue" value="Próximo">
                       <input type="hidden" name="nome_assinante"  value="<?php echo $nome_assinante; ?>"> 
                       <input type="hidden" name="phone"  value="<?php echo $phone; ?>"> 
                       <input type="hidden" name="endereco"  value="<?php echo $endereco; ?>"> 
                       <input type="hidden" name="email"  value="<?php echo $email; ?>">
                       <input type="hidden" name="nome_grupo"  value="<?php echo $grupo; ?>"> 
                       <input type="hidden" name="result1"  value="<?php echo $result1; ?>">  

                       </form>
                   </section>
                   <section class="section">
                   <div class="form">
                       <!--Criar uma Div para colocar a Imagem em uma proporção padrão, por favor usar o pequeno -->
                       <?php
                       
                     
       
                   ?>
                       </form>
                      <form method="POST" action="Final.php">
                      <input type="hidden" name="final" value="<?php echo $final?>"> 
                      <input type="submit" name="submit" class="btn btn-red" value="O.S.">
                      </form><br/>
                      <form method="POST" action="Final.php">
                      <input type="hidden" name="final" value="<?php echo $final?>">     <!-- COLOCAR O BOTÃO DO LADO -->
                      <input type="submit" name="submit" class="btn btn-green" value="Resolvido">
                      </form><br/>
                      <form method="POST" action="Index.php">
                      <input type="submit" name="submit" class="btn btn-red" value="Recomeçar">  
                      </form>
       
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

</body>

</html>
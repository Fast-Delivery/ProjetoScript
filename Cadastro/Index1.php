<?php
include_once("../Conexao.php");

            $resultado_grupo =  mysqli_query($conn,"SELECT * FROM grupo");
            $resultado_nivel =  mysqli_query($conn,"SELECT * FROM nivel");
            $resultado_username =  mysqli_query($conn,"SELECT * FROM bd_usuario");
		


?>

<html>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript" src="../js/purl.js"></script>
<head>

<title>

Cadastro

</title>
</head>
<body>



<h1>CADASTRO</h1>

<form action="Processa.php" method="POST">
    <!---Campo--->
                <label for="text">Nome do Usário</label>
                <input type="text" name="nome_usuario" id="nome_usuario" placeholder="Digite o nome do Usuário" autocomplete="off" autofocus 
                required>

    <!---Campo---->
                <br><label for="text">Sobrenome do Usário</label>
                <input type="text" name="sobrenome_usuario" id="sobrenome_usuario" placeholder="Digite o Sobrenome do Usuário" autocomplete="off" autofocus
                 required>

    <!---Campo---->             
                <br><label for="text">Username do Usário</label>
                <input type="text" name="username_usuario" id="username_usuario" placeholder="Digite o nome do Username" autocomplete="off" autofocus 
                required>
                

    <!---Campo---->             
                <br><label for="text">Digite sua senha</label>
                <input type="password" name="senha_usuario" id="senha_usuario" placeholder="Digite a senha" autocomplete="off" autofocus 
                required><br>



                 <!---Seleção de Grupos--->
                <label for="Grupo">Grupo</label>
                <select name="grupo" id="grupo">
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



                <!---Seleção de Grupos--->
                <label for="text">Nível de acesso</label> 
               <select name="nivel" id="nivel">
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
              
<br><br><br><br><br>


              <label for="text">TESTE</label> 
               <select name="test" id="test">
               <?php
               while($user = mysqli_fetch_assoc($resultado_username)){
                 ?>
                <option value="<?php echo $user['username_usuario']; ?>"><?php echo $user['username_usuario']; ?></option><?php     }?>
                </select>
                <script>
                var a =<label for="text">Sobrenome do Us1a1asário</label> ;
                var b = "username_usuario";
                document.write(b+a);
                 $(document).ready(function() {
                   $('#test');
                         });
                 </script>
              

              <!----Btn---->
              <br><br>  <input type="submit" value="Entrar">
            </form>



            TESTE

            <title>Curso JavaScript Progressivo</title>
   <input id="textinput" name="textinput" value="" type="text">
   <button onclick="enviar()">Confirmar</button>

   <script type="text/javascript">
    function enviar(){
        var valor = document.getElementById("textinput").value;
        alert("Você digitou: " + valor);

        var vars = geturlvar()['textinput'];
    }
   </script>


</body>

</html>
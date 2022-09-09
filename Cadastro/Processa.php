<?php
session_start();
include_once("../Conexao.php");

$nome_usuario = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_STRING);
$sobrenome_usuario = filter_input(INPUT_POST, 'sobrenome_usuario', FILTER_SANITIZE_STRING);
$username_usuario = $nome_usuario;
$username_usuario  .=".";
$username_usuario .= $sobrenome_usuario;
$senha_usuario = filter_input(INPUT_POST, 'senha_usuario', FILTER_SANITIZE_STRING);
$status_grupo = filter_input(INPUT_POST, 'grupo', FILTER_SANITIZE_STRING);
$id_nivel_de_acesso  = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
$email_usuario  = filter_input(INPUT_POST, 'email_usuario',FILTER_SANITIZE_STRING);

echo "Nome: $nome_usuario<br>";
echo "Sobrenome: $sobrenome_usuario<br>";
echo "E-mail: $email_usuario<br>";
echo "Username: $username_usuario<br>";
echo "senha_usuario: $senha_usuario<br>";
echo "grupo: $status_grupo<br>";
echo "nivel: $id_nivel_de_acesso <br>";
echo "E-mail: $email_usuario<br>";

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO bd_usuario (nome_usuario, sobrenome_usuario, email_usuario, username_usuario, senha_usuario, status_grupo, id_nivel_de_acesso)
 VALUES ('$nome_usuario', '$sobrenome_usuario','$username_usuario','$email_usuario','$senha_usuario','$status_grupo','$id_nivel_de_acesso ')";
$resultado_usuario =mysqli_query ($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	//$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";

	echo"Usuario cadastrado com sucesso";
//	header("Location: index.php");
}else{
//	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
//	header("Location: index.php");

echo"Erro no cadastro";
}

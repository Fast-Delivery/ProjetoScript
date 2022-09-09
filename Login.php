<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("Conexao.php");	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['email_usuario'])) && (isset($_POST['password_usuario']))){
		$email_usuario = mysqli_real_escape_string($conn, $_POST['email_usuario']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha_usuario = mysqli_real_escape_string($conn, $_POST['password_usuario']);
		//$senha = md5($senha);

		echo $email_usuario;
		echo $senha_usuario;
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM bd_usuario WHERE email_usuario = '$email_usuario' && senha_usuario = '$senha_usuario'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);

		echo $resultado_usuario;
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['id_usuario'] = $resultado['id_usuario'];
			$_SESSION['nome_usuario'] = $resultado['nome_usuario'];
			$_SESSION['sobrenome_usuario'] = $resultado['sobrenome_usuario'];
			$_SESSION['email_usuario'] = $resultado['email_usuario'];
			$_SESSION['username_usuario'] = $resultado['username_usuario'];
			$_SESSION['status_grupo'] = $resultado['status_grupo'];
			$_SESSION['id_nivel_de_acesso'] = $resultado['id_nivel_de_acesso'];
echo -2;

			if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				//header("Location: administrativo.php");
				echo -1;
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
			//	header("Location: colaborador.php");
			echo 0;
			}else{
				echo 1;
			//	header("Location: cliente.php");
			}
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
		//	header("Location: index.php");
		echo 2;
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
	//	header("Location: ../index.php");
	echo 3;
	}
?>
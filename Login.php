<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("Conexao.php");	

	


	$resul_servidor =  mysqli_query($conn, "SELECT * FROM servidor");
			while($status = mysqli_fetch_assoc($resul_servidor)){
				$status = $status['status'];
			
			}


		$username_usuario = filter_input(INPUT_POST, 'username_usuario', FILTER_SANITIZE_STRING);
		$senha_usuario = filter_input(INPUT_POST, 'password_usuario', FILTER_SANITIZE_STRING);
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($username_usuario)) && (isset($senha_usuario))){
		
	
		$senha_usuario = md5($senha_usuario);

		
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM bd_usuario WHERE username_usuario = '$username_usuario' && senha_usuario = '$senha_usuario'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$id_nivel_de_acesso = $_SESSION['id_nivel_de_acesso'] = $resultado['id_nivel_de_acesso'];


			if($id_nivel_de_acesso == "1"){
				//header("Location: administrativo.php");
				echo "ACESSO AO SAC";
				$_SESSION['id_usuario'] = $resultado['id_usuario'];
				$_SESSION['nome_usuario'] = $resultado['nome_usuario'];
				$_SESSION['sobrenome_usuario'] = $resultado['sobrenome_usuario'];
				$_SESSION['email_usuario'] = $resultado['email_usuario'];
				$_SESSION['username_usuario'] = $resultado['username_usuario'];
				$_SESSION['status_grupo'] = $resultado['status_grupo'];

				header("Location: views/");
			}elseif($id_nivel_de_acesso == "0"){
				
			echo "ACESSO AO ADM";
			}elseif($id_nivel_de_acesso == "2"){
				$_SESSION['loginBloqueado'] = "Usuário bloqueado";
			header("Location: index.php");

			

			}else{
							
			$_SESSION['contatoresponsável'] = "Entre em contato com o responsável";
			header("Location: index.php");
		}

		}else{
			$_SESSION['logininvalido'] = "Usuário ou senha Inválido.";
			header("Location: index.php");

		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['logininvalido'] = "Usuário ou senha Inválido.";
			header("Location: index.php");

	
	}
 
	
 
?>
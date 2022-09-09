<?php

	include_once("../Conexao.php");
	
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);
	
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
				$Nome_checklist = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				echo "Nome_checklist: $Nome_checklist <br>";
				
				$Sistema_checklist = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				echo "Sistema_checklist: $Sistema_checklist <br>";
				
				$Procedimento_checklist = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				echo "Procedimento_checklist: $Procedimento_checklist <br>";

				$Sequencia_checklist = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				echo "Sequencia_checklist: $Sequencia_checklist <br>";
				
				echo "<hr>";
				
				//Inserir o usuário no BD
				$result_usuario = "INSERT INTO cheklist_db (Nome_checklist, Sistema_checklist, Procedimento_checklist, Sequencia_checklist) VALUES ('$Nome_checklist', '$Sistema_checklist', '$Procedimento_checklist', '$Sequencia_checklist')";
				$resultado_usuario = mysqli_query($conn, $result_usuario);
			}
			$primeira_linha = false;
		}
	}
?>
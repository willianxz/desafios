<?php
header('Content-type: text/html; charset=UTF-8');
session_start();

$administradorLogado = isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['tipo'] == "Administrador";
if($administradorLogado){
			
			include("funcoes.php");
			
			$valido = true;
			
			$inputsEsperados = array();
			$inputsEsperados[0] = $_POST['nomeCadastro'];
			$inputsEsperados[1] = $_POST['sobrenomeCadastro'];
			$inputsEsperados[2] = $_POST['emailCadastro'];
			$inputsEsperados[3] = $_POST['senhaCadastro'];
			$inputsEsperados[4] = $_POST['tipoCadastro'];
			$ativo = $_POST['ativoCadastro'];
			
		
			
			if($ativo !== 0 || $ativo !== 1){
				$valido = false;
			}
			
			for($i = 0; $i < count($inputsEsperados); $i++){
				$valido = verificarInput($inputsEsperados[$i]);
				if($valido === false){
					break;
				}
			}
			
			if($valido){
			
			   $nome = $inputsEsperados[0];
			   $sobrenome = $inputsEsperados[1];
			   $email = $inputsEsperados[2];
			   $senhaCadastro = md5($inputsEsperados[3]);
			   $tipo = $inputsEsperados[4];
			  
			   
				// Create connection
				$conectado = include("conectdb.php");				
					
				if($conectado){					
					// Check connection
					if (!$conectado) {
						die("Connection failed: " . mysqli_connect_error());
					}
					
					
					$sql = "INSERT INTO usuario (nome, sobrenome, email, senha, tipo, ativo)".
					"VALUES ('".$nome."', '".$sobrenome."', '".$email."', '".$senhaCadastro."', '".$tipo."', ".$ativo.")";
					$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
					
					mysqli_close($conectado);
					
					if($result){
						header("location: ../screen/painelAdministrador.php?cadastrado=1");
						exit;
					}
					
			  }
			  
			 }else{
				header("location: ../screen/painelAdministrador.php?cadastrado=0");
				exit;
			 }  
			  
		    
	
}else{
	header("localtion: ../index.html");
}


?>
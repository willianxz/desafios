<?php
header('Content-type: text/html; charset=UTF-8');
session_start();

$administradorLogado = isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['tipo'] == "Administrador";
if($administradorLogado){
	
	 include("funcoes.php");
			
	 $valido = true;
	 
     $id =   $_POST['idEditar'];	 
	 $inputsEsperados = array();
	 $inputsEsperados[0] = $_POST['nome'.$id];
	 $inputsEsperados[1] = $_POST['sobrenome'.$id];
	 $inputsEsperados[2] = $_POST['email'.$id];
	 $inputsEsperados[3] = $_POST['senhaEditar'.$id];
	 $inputsEsperados[4] = $_POST['tipo'.$id];
	 $ativo = $_POST['ativo'.$id];
		

		
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
		 $senhaEditar = md5($inputsEsperados[3]);
		 $tipo = $inputsEsperados[4];
		 
		
		// Create connection
		$conectado = include("conectdb.php");				
			
		if($conectado){					
			// Check connection
			if (!$conectado) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			//Se não for um md5(encriptografada):
			 if (strlen($_POST['senhaEditar'.$id]) !== 32 ) { //Salve a senha.
				 $sql = "UPDATE usuario SET ".
				"nome='".$nome."',".
				"sobrenome='".$sobrenome."',".
				"email='".$email."',".
				"senha='".$senhaEditar."',".
				"tipo='".$tipo."',".
				"ativo='".$ativo."' WHERE idusuario=".$id;
			}else{
				$sql = "UPDATE usuario SET ".  //Não salve a senha.
				"nome='".$nome."',".
				"sobrenome='".$sobrenome."',".
				"email='".$email."',".
				"tipo='".$tipo."',".
				"ativo='".$ativo."' WHERE idusuario=".$id;
			}
			
			
			$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
			
			mysqli_close($conectado);
			
			if($result){
				header("location: ../screen/painelAdministrador.php?editado=1");
				exit;
			}else{
				header("location: ../screen/painelAdministrador.php?editado=0");
				exit;
			}
		  } 
       }else{
		 header("location: ../screen/painelAdministrador.php");
	   }  
	
}else{
	header("localtion: ../index.html"); 
}

?>
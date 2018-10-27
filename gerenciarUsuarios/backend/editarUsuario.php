<?php
session_start();


if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
	
	 $id =   $_POST['idEditar'];
	 $nome = $_POST['nome'.$id];
     $sobrenome = $_POST['sobrenome'.$id];
	 $email = $_POST['email'.$id];
	 $senhaEditar = md5($_POST['senhaEditar'.$id]);
	 $tipo = $_POST['tipo'.$id];
	 $ativo = $_POST['ativo'.$id];
	
	// Create connection
	$conectado = include("conectdb.php");				
		
	if($conectado){					
		// Check connection
		if (!$conectado) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		
		$sql = "UPDATE usuario SET ".
		"nome='".$nome."',".
		"sobrenome='".$sobrenome."',".
		"senha='".$senhaEditar."',".
		"tipo='".$tipo."',".
		"ativo='".$ativo."' WHERE idusuario=".$id;
		$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
		
		mysqli_close($conectado);
		
		if($result){
			header("location: ../screen/painel.php?editado=1");
			exit;
		}else{
			header("location: ../screen/painel.php?editado=0");
			exit;
		}		
	}
	
	
}else{
	header("localtion: ../index.html"); 
}

?>
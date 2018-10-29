<?php
header('Content-type: text/html; charset=UTF-8');
session_start();

$administradorLogado = isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['tipo'] == "Administrador";
if($administradorLogado){
	
	include("funcoes.php");
	
	$valido = verificarInput($_GET['id']);
	
	if($valido){
		
		$idusuario = $_GET['id'];
		
		
		// Create connection
				$conectado = include("conectdb.php");				
					
				if($conectado){					
					// Check connection
					if (!$conectado) {
						die("Connection failed: " . mysqli_connect_error());
					}
					
					
					$sql = "DELETE FROM usuario WHERE idusuario = ".$idusuario;
					
					$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
					
					mysqli_close($conectado);
					
					if($result){
						header("location: ../screen/painelAdministrador.php?excluido=1");
						exit;
					}else{
						header("location: ../screen/painelAdministrador.php?excluido=0");
						exit;
					}
					
			}
		
	}
	
	
}else{
	
	header("localtion: ../index.html"); 
}


?>
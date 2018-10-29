<?php
header('Content-type: text/html; charset=UTF-8');
session_start();
include("funcoes.php");


$emailValido = verificarInput($_POST['email']);
$senhaValida = verificarInput($_POST['password']);


if($emailValido && $senhaValida){
	
	$emailValido = $_POST['email'];
	$senhaValida = $_POST['password'];
	$senhaValida = md5($senhaValida);
	
	$conectado = include("conectdb.php");
	
	if($conectado){
		
		
		// Create connection
		$conectado = include("conectdb.php");
		
		// Check connection
		if (!$conectado) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT email, senha, nome, sobrenome, tipo, ativo FROM usuario";
		$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
		
		
		 /* fetch associative array */		
		while ($row = mysqli_fetch_assoc($result)) {
			if($row["email"] == $emailValido && $row["senha"] == $senhaValida){
				
				$_SESSION['nome'] = $row["nome"];
				$_SESSION['sobrenome'] = $row["sobrenome"];
				$_SESSION['tipo'] = $row["tipo"];
				
				//Verifica se o usuario está ativo, se estiver, então pode logar.
				if($row["ativo"]){
					$_SESSION['logado'] = true;
				}
				
				break; //Saia do loop se encontrou o usuario.
			}			
		}
		
		
		mysqli_close($conectado);
		
		$administrador = isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['tipo'] == "Administrador";
		$usuario = 	isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['tipo'] == "Usuário padrão";	
		if($administrador){
		   header("location: ../screen/painelAdministrador.php");
		   exit;
		}else if($usuario){
		  header("location: ../screen/painelUsuario.php");
		  exit;
		}else{
		   header('Location: ../index.html');
		   exit;
		}
		
		
	}else{
	  header('Location: ../index.html');
	  exit;
	}
	
	
	
}else{	
	header('Location: ../index.html');
	exit;
}


?>
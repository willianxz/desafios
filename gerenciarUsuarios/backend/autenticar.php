<?php
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

		$sql = "SELECT email, senha, nome, sobrenome, tipo FROM usuario";
		$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
		
		
		 /* fetch associative array */		
		while ($row = mysqli_fetch_assoc($result)) {
			if($row["email"] == $emailValido && $row["senha"] == $senhaValida){
				$_SESSION['logado'] = true;
				$_SESSION['nome'] = $row["nome"];
				$_SESSION['sobrenome'] = $row["sobrenome"];
				$_SESSION['tipo'] = $row["tipo"];
				break;
			}			
		}
		
		
		mysqli_close($conectado);
		
		if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
		   header("location: ../screen/painel.php");
		}else{
		   header('Location: ../index.html');
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
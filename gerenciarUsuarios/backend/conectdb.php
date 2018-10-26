<?php

$hostname = "localhost";
$username = "root";
$senha = "";
$database = "gerenciarusuarios";


$conectar = mysqli_connect($hostname, $username, $senha, $database);

if($conectar){
	return $conectar;
}else{
	return false;
}


?>
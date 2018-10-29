<?php
header('Content-type: text/html; charset=UTF-8');
$hostname = "localhost";
$username = "root";
$senha = "";
$database = "gerenciarusuarios";


$conectar = mysqli_connect($hostname, $username, $senha, $database);

if (!mysqli_set_charset($conectar, 'utf8')) {
    printf('Error ao usar utf8: %s', mysqli_error($link));
    exit;
}

if($conectar){
	return $conectar;
}else{
	return false;
}

//OBS:O Banco deve esta com o collage utf8-utf8_unicode_ci para que não dei problemas com charset.


?>
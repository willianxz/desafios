<?php
header('Content-type: text/html; charset=UTF-8');
function verificarInput($inputString){
	$ok = false;
	
	$inputSeguro = RemoverAspas($inputString);
	$inputSeguro = RemoverNocivos($inputString);
	$inputSeguro = RemoverHtml($inputString);
	
	
	if(isset($inputSeguro) && !empty($inputSeguro)){
	 $ok = true;
    }
	return $ok;
}

//Funções de uso interno.
function RemoverAspas($campo){
return addslashes($campo); //remove as aspas duplas/simples
}

function RemoverNocivos($campo){
return htmlspecialchars($campo);// remove aspas simples/duplas,>,<,&
}

function RemoverHtml($campo){
return strip_tags($campo); // remove todas as tags html
}

function RemoverHtml2($campo,$excesao){ // remove todas as tags html com excesão das que são passadas pelo parametro.
return strip_tags($campo,$excesao);
}

function DeixarMinusculas($campo){
return strtolower($campo); // deixa o texto em minusculo
}

function DeixarMaiusculas($campo){
return strtoupper($campo); // deixa o texto em MAIUSCULO
}



?>
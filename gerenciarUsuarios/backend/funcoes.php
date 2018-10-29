<?php
header('Content-type: text/html; charset=UTF-8');
function verificarInput($inputString){
	$ok = false;
	
	if(isset($inputString) && !empty($inputString)){
	 $ok = true;
    }
	return $ok;
}



?>
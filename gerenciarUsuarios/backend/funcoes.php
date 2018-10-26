<?php

function verificarInput($inputString){
	$ok = false;
	
	if(isset($inputString) && !empty($inputString)){
	 $ok = true;
    }
	return $ok;
}

?>
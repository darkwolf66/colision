<?php 
	$json = file_get_contents('./json/'.$history.'.json');
	$obj = json_decode($json);
	$perguntas = $obj->perguntas;
?>
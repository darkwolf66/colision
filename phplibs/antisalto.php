<?php 
	error_reporting(0);
	$cond = true;
	if($id != 1){
		foreach($pergunta->requerimento as $requer){
			if($cookieid == $requer->id){
				$cond = false;
			}
		}
		if($cond){
			$id = $cookieid;
			$pergunta = getPergutaFromJson($id, $perguntas);
		}
	}
	error_reporting(1);
?>
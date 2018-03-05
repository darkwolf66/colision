<?php 
function getPergutaFromJson($id, $perguntas){
		foreach ($perguntas as $pergunta){
			if($pergunta->id == $id){
				return $pergunta;
			}
		}
	}
function addFinal(){
	if(empty($_COOKIE['colision-final-count'])){
			setcookie('colision-final-count', 1, (time() + (60 * 24 * 3600)));
	}else{
			setcookie('colision-final-count', $_COOKIE['colision-final-count']+1, (time() + (60 * 24 * 3600)));
	}
}
function getFinais(){
	if(empty($_COOKIE['colision-final-count'])){
		return 0;
	}else{
		return $_COOKIE['colision-final-count'];
	}
}
?>
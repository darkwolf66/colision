<?php 
	function getPergutaFromJson($id, $perguntas){
		foreach ($perguntas as $pergunta){
			if($pergunta->id == $id){
				return $pergunta;
			}
		}
	}
?>
<?php 
	$html = "<div class=\"conteudo\">".$pergunta->pergunta."</div>";
	foreach ($pergunta->respostas as $resposta) {
		if(!($resposta->resposta == "fim")){
			$html = $html."<div class=\"resposta\" onclick=\"getPergunta(".$resposta->proxima.")\"> - ".$resposta->resposta."</div>";
		}else{
			setcookie('colision-cookie-id', 1, (time() + (60 * 24 * 3600)));
			$html = $html."<div class=\"resposta\" onclick=\"getPergunta(1)\"> - Começar de novo</div>";
			addFinal();
		}
	}
	$html = $html."<div id=\"cobalt\">".$id."</div>";
	echo $html;
?>
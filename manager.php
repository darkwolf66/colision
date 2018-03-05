<?php
	if(empty($_POST['history'])){
		$jsonhis = file_get_contents('./json/historias.json');
	}else{
		$jsonhis = $_POST['history'];
	}
	$objhis = json_decode($jsonhis);

	if(!empty($_COOKIE['colision-history'])){
		$history = $_COOKIE['colision-history'];
	}
	if(!empty($_GET['historyid'])){
		$historyid = $_GET['historyid'];
		$historias = $objhis->historias;
		foreach ($historias as $historia) {
			if($historia->json == $historyid){
				setcookie('colision-history', $historyid, (time() + (60 * 24 * 3600)));
				$history = $historyid;
			}
		}
	}
	if (empty($_COOKIE['colision-history']) || !empty($_GET['colision-history'])) {
		$historias = $objhis->historias;
    	$html = "<div class=\"conteudo\">Escolha uma historia:</div>";
		foreach ($historias as $historia) {
			setcookie('colision-cookie-id', 1, (time() + (60 * 24 * 3600)));
			$html = $html."<div class=\"resposta\" onclick=\"setHistoryGetPergunta('".$historia->json."')\"> - ".$historia->nome."</div>";
		}
		echo $html;
		exit;
	}
	if (empty($_GET['id'])) {
    	header("location:./manager.php?id=1");
	}
	if(empty($_COOKIE['colision-cookie-id'])){
		setcookie('colision-cookie-id', 1, (time() + (60 * 24 * 3600)));
	}
	if(!empty($_GET['colision-saveoff'])){
		$saveoff = true;
	}else{
		$saveoff = false;
	}
	$id = $_GET["id"];
	if($id == "1" && $saveoff == false){
		$id = $_COOKIE['colision-cookie-id'];
	}
	include("./phplibs/functions.php");
	
    	$json = @file_get_contents('./json/'.$history.'.json', true);
		if($json === false){
			echo "2123";
			exit();
		}

	$obj = json_decode($json);
	$perguntas = $obj->perguntas;
	$cookieid = $_COOKIE['colision-cookie-id'];
	$pergunta = getPergutaFromJson($id, $perguntas);
	include("./phplibs/antisalto.php");
	setcookie('colision-cookie-id', $id, (time() + (60 * 24 * 3600)));
	include("./phplibs/gencontent.php");
?>
	
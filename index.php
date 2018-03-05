<!DOCTYPE html>
<html>
<head>
	<title>Colision</title>
	<style type="text/css">
		@import url("style.css");
	</style>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/hover.functions.js"></script>
	<script type="text/javascript">
		$.get("manager.php?id=1", function(data) {
  				$("#container").html(data);
			});
		function getPergunta(id){
			$.get( "manager.php?id="+id, function( data ) {
  				$( "#container" ).html(data);
			});
		}
		function setHistoryGetPergunta(historyid){
			$.get( "manager.php?id=1&historyid="+historyid, function( data ) {
				if(data != "2123"){
					$( "#container" ).html(data);
				}
  				
			});
		}
		function changeHistory(){
			$.get("manager.php?colision-history=change", function( data ) {
  				$( "#container" ).html(data);
			});
			resetMenuStatus()
		}
		function restart(){
			$.get( "manager.php?id="+1+"&colision-saveoff=true", function( data ) {
  				$( "#container" ).html(data);
			});
			resetMenuStatus()
		}
		function changeSrc(em, text){
			$(em).attr("src", text);
		}
		function sendTo(url){
			window.open(url,'_blank');
		}
		var plusStatus = false;
		function plus(){
			if(plusStatus == false){
				$.get("plus.php", function(data) {
  					$("#container-plus").html(data);
				});
				$("#container").hide();
  				$("#container-plus").show();
				plusStatus = true;
			}else{
				$("#container-plus").hide();
				$("#container").show();
				plusStatus = false;
			}
		}
		function resetMenuStatus(){
			$("#container-plus").hide();
			$("#container").show();
		}
	</script>
	
</head>
<body>
<div id="logo">Colision</div>
<div id="credit">by darkwolf_66</div>
	<div id="container" class="container">
	</div>
	<div id="container-plus" class="container-plus"></div>
	<div id="share-container">
		<div class="share-options">
			<img class="social-image" onclick="sendTo('https://www.facebook.com/MajoraGamers/')" onmouseleave="changeSrc(this,'./images/fb.png')" onmouseover="changeSrc(this,'./images/fbbk.png')" src="./images/fb.png">
		</div>
		<div class="share-options">
			<div id="plus" onclick="plus()">+</div>
		</div>
		<div class="share-options">
			<div id="opt-restart" onclick="restart()">R</div>
		</div>
		<div class="share-options">
			<div id="opt-restart" onclick="changeHistory()">H</div>
		</div>
	</div>
	<div id="share-container">
	<div class="drop-container" onmouseover="json_exit_mouseover()" onmouseout="json_exit_mousout()">
	Drope o JSON Aqui
	</dir>

</div>
</body>
</html>
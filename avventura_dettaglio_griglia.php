<?php
$query="SELECT *
	FROM mephit_personaggio
	WHERE fk_avventura=".$_GET[id]."
	ORDER BY nome
";
$result=mysql_query($query);
$pgs=array();
$selectedPg=-1;
while($row=mysql_fetch_array($result)){
	if($selectedPg==-1)$selectedPg=$row[id_personaggio];
	$pgs[$row[id_personaggio]]=$row;
	$pgs[$row[id_personaggio]][img_small]=(
		is_null($row[immagine_stampa])
		?""
		:$_MEPHIT[WWW_ROOT]."/public/users/".$row[autore].$_MEPHIT[user][folders][pg_tooltip]."/".replace_extension($row[immagine_stampa],"jpg")
	);
}

if(is_null($pgs[$selectedPg])){
	$M=0;
}else{
	$M=$pgs[$selectedPg][fk_map_image];
	$query="SELECT * FROM mephit_map_image WHERE id=".$M;
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		$mapUrl=$mapFolder."/".$row[filename];
		$mapSize=getimagesize($_SERVER['DOCUMENT_ROOT'].$mapUrl);
	}
}

$PGs=getAdventurePGs($avv[id_adventure]);

$BODY.='
<style>
#personaggiNellaMappa A{color:#fff;text-decoration:none;}
#personaggiNellaMappa .sel{background:#fff;}
#personaggiNellaMappa .sel A{color:#c00000;text-decoration:none;}
</style>

<script src="js/board1/iecanvas.js"></script>
<script src="js/board1/config.php"></script>
<script src="js/board1/functions.js"></script>
<script src="js/board1/raycasting.js"></script>

<script src="js/board1/map.php"></script>
<!-- script src="js/board/controls.js"></script -->
<script src="js/board1/init.js"></script>
<script src="js/board1/draw.js"></script>

<table border="0" cellpadding="0" cellspacing="0"><tr valign="top"><td width="120" bgcolor="#C00000" style="padding:10px;">
<div style="color:#fff;">Iniziativa off</div>
<br>

<script>
charactersTokenCache={}
</script>
<div id="personaggiNellaMappa">';

foreach($pgs AS $id=>$pg){
	$BODY.='<script>
	charactersTokenCache['.$id.']=(function(){var x=new Image();x.src="'.$pg[img_small].'";return x;})();
	</script>';
	if($id==$selectedPg)$BODY.='<div class="sel">';
	$BODY.='<a href="personaggi.php?id='.$id.'"><img src="'.$pg[img_small].'" border="0"></a><br>';
	$BODY.='<a href="personaggi.php?id='.$id.'">'.$pg[nome].'</a><br>';
	if($id==$selectedPg){
		$BODY.='
		<style>
		#board{background:#000;}
		#boardContainer{}
		.barraFatto{height:15px;background:#999999;width:0;}
		.barraRestante{height:15px;background:#008800;}
		.barraLabel{position:absolute;text-align:center;width:100px;}
		</style>
		<div style="font-size:8pt;color:#fff;">
			<div class="barraLabel">AZ. MOVIMENTO</div><div id="movimento_restante" class="barraRestante"><div id="movimento_fatto" class="barraFatto"></div></div>
			<div class="barraLabel">AZ. STANDARD</div><div id="standard_restante" class="barraRestante"><div id="standard_fatto" class="barraFatto"></div></div>
			<div class="barraLabel">AZ. VELOCE</div><div id="veloce_restante" class="barraRestante"><div id="veloce_fatto" class="barraFatto"></div></div>
			<div class="barraLabel">AZ. IMMEDIATA</div><div id="immediata_restante" class="barraRestante"><div id="immediata_fatto" class="barraFatto"></div></div>
		</div>
		';
		$BODY.='</div><br>';
	}
	$BODY.='<br>';
}

$BODY.='
</div>
</td><td width="100%"><div style="padding:10px;">

<table border="0" cellpadding="0" cellspacing="20"><tr>
<td><canvas id="c" style="background:#000;"></td>
<td><img src="js/board1/Compass-rose-pale.png" /></td>
</tr></table>
X:<span id="pgposx"></span> Y:<span id="pgposy"></span>

</div></td></tr></table>';
?>
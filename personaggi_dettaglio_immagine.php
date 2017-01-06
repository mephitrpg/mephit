<?php

$ramo=($P->row[personaggio][autore]!=0)?$P->row[personaggio][autore].'/pg':'/png';
if($P->row[personaggio][immagine_stampa]!=""){
	$stmp="/printable/".$P->row[personaggio][immagine_stampa];
	$img="/tooltip/".replace_extension($P->row[personaggio][immagine_stampa],"jpg");
	$img_big=$_MEPHIT[WWW_ROOT].$_MEPHIT[upload_path].'/users/'.$ramo.$stmp;
	$img_small=$_MEPHIT[WWW_ROOT].$_MEPHIT[upload_path].'/users/'.$ramo.$img;
}else{
	$img_big="images/pg_image.jpg";
	$img_small="images/pg_thumb.gif";
}

$coord=$P->row[personaggio][coordinate_tooltip];
if($coord!="")$coord=explode(",",$coord);
else $coord=array(
	0,0,100,100
	//146,58,301,214
);

$BODY.='<form id="form-dndtool" name="f" action="personaggi_save.php" method="post" enctype="multipart/form-data">';
$BODY.='<input type="hidden" name="what" value="immagine">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';
$BODY.='<input type="hidden" name="x1" id="x1" value="'.$coord[0].'">';
$BODY.='<input type="hidden" name="y1" id="y1" value="'.$coord[1].'">';
$BODY.='<input type="hidden" name="x2" id="x2" value="'.$coord[2].'">';
$BODY.='<input type="hidden" name="y2" id="y2" value="'.$coord[3].'">';

$BODY.='
<input type="hidden" name="MAX_FILE_SIZE" value="'.$_MEPHIT[pgimage_maxSize].'" />
<table border="0" cellpadding="0" cellspacing="0"><tr valign="top"><td>

<strong>Immagine</strong><br>
<br>

<input type="file" name="userfile" onchange="carica()"><br>
<small>Dimensioni massime: '.($_MEPHIT[pgimage_maxSize]/1024).' KB, '.$_MEPHIT[pgimage_maxWidth].'&times;'.$_MEPHIT[pgimage_maxHeight].' pixel</small><br>
<br>
';

$BODY.='<div id="pgThumb" style="width:'.$_MEPHIT[pgthumb_maxWidth].'px;height:'.$_MEPHIT[pgthumb_maxHeight].'px;">';
	$BODY.='<img src="'.$img_small.'?'.time().'">';
	if($P->row[personaggio][coordinate_tooltip]!=""){
		$BODY.='<br><br>';
		$BODY.='<a href="javascript:startCrop();" onclick="this.blur();" onkeypress="this.onclick();">';
		$BODY.='Modifica';
		$BODY.='</a>';
	}
$BODY.='</div>';
$BODY.='<br>';
$BODY.='<br>';
$BODY.='<div id="previewOuterWrap" style="display:none;">';
	$BODY.='<div id="annullaCrop"> ';
		$BODY.='<a href="javascript:endCrop();" style="padding:0 0.5em;background:#c00000;color:#fff;text-decoration:none;">';
		$BODY.='&times;';
		$BODY.='</a>';
	$BODY.='</div>';
	$BODY.='<div id="previewWrap"></div>';
$BODY.='</div>';

$BODY.='</td><td width="20">&nbsp;</td><td>';

$BODY.='<img id="testImage" src="'.$img_big.'" border="0">';

$BODY.='</td></tr></table>';

$BODY.="\n";
$BODY.='
<style>
#previewOuterWrap {
	float: left;
	width: 140px;
	background:#c00000;
}
#previewWrap {
	margin:1em 0 1em 1em;
}
#annullaCrop{float:right;}
#pgThumb{
	margin:1em 0 1em 1em;
}
</style>
<script src="js/cropper/cropper.js" language="javascript"></script>
<script type="text/javascript" language="javascript">
var cropped;
function onEndCrop(coords,dimensions){
	$("x1").value = coords.x1;
	$("y1").value = coords.y1;
	$("x2").value = coords.x2;
	$("y2").value = coords.y2;
	$("pgThumb").hide();
	$("previewOuterWrap").show();
}
function endCrop(){
	cropped.remove();
	cropped=null;
	$("pgThumb").show();
	$("previewOuterWrap").hide();
}
function startCrop(){
	if(cropped==null){
		cropped=new Cropper.ImgWithPreview("testImage",{
			displayOnInit: true,
			previewWrap: "previewWrap",
			minWidth: 100,
			minHeight: 100,
			ratioDim: {x:100,y:100},
			onloadCoords: {x1:'.$coord[0].',y1:'.$coord[1].',x2:'.$coord[2].',y2:'.$coord[3].'},
			onEndCrop: onEndCrop
		});
	}
}
</script>
';

$BODY.='<br>';
$BODY.='<input type="button" class="btn" value="Indietro" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();">';
$BODY.=' ';
$BODY.='<input type="submit" class="btn" value="Applica">';

$BODY.='</form>';

$smarty->assign('buttons',$BUTTONS);
?>
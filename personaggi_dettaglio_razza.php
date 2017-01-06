<?php

$query="SELECT *
FROM mephit_personaggio
WHERE id_personaggio=".$_GET["id"];

$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	
	$smarty->assign('title',$row[nome]);
	
	$race=$row[race];
	$sex=$row[sex];
}

$BODY.='<form id="form-dndtool" action="personaggi_save.php" method="post">';
$BODY.='<input type="hidden" name="what" value="razza">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';

$BODY.='<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr valign="top"><td width="25%">';

$BODY.='<ul style="list-style:none;padding:0;margin:0;">';

$raceNameField="name_".$_MEPHIT[lang];
$classNameField="name_".$_MEPHIT[lang];
$sizeNameField="name_".$_MEPHIT[lang];
$RACIAL_TRAITS="";
$RACE_SUMMARY="";
$classes=array();

$query="SELECT * FROM srd35_class";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$classes[$row[id]]=$row[$classNameField];
}

$query="SELECT
	r.id AS id,
	s.".$sizeNameField." AS size_name,
	r.".$raceNameField." AS race_name,
	r.fk_size,
	r.fk_class,
	r._str,
	r._dex,
	r._con,
	r._int,
	r._wis,
	r._cha,
	r.traits_".$_MEPHIT[lang]." AS race_traits
FROM srd35_race AS r
JOIN srd35_size  AS s ON r.fk_size  = s.id
ORDER BY r.".$raceNameField;

$result=mysql_query($query);

while($row=mysql_fetch_array($result)){
	$BODY.='<li><label for="race-'.$row[id].'"><input type="radio" name="race" id="race-'.$row[id].'" value="'.$row[id].'"';
	if($race==$row[id])$BODY.=' checked';
	$BODY.='> ';
	$BODY.=$row[race_name];
	$BODY.='</label></li>';
	
	
	$RACE_SUMMARY.='<div class="raceSummary" id="raceSummary-'.$row[id].'"';
	if($race!=$row[id])$RACE_SUMMARY.=' style="display:none;"';
	$RACE_SUMMARY.='>';
	if($row[fk_size])$RACE_SUMMARY.='<strong>Taglia:</strong> '.$row[size_name].'<br>';
	if($row[fk_class]){
		$RACE_SUMMARY.='<strong>Classe preferita:</strong> '.$classes[$row[fk_class]].'<br>';
	}else{
		$RACE_SUMMARY.='<strong>Classe preferita:</strong> '.'qualsiasi'.'<br>';
	}
	if($row[_str])$RACE_SUMMARY.="<strong>FOR:</strong> ".$row[_str]."<br>";
	if($row[_dex])$RACE_SUMMARY.="<strong>DES:</strong> ".$row[_dex]."<br>";
	if($row[_con])$RACE_SUMMARY.="<strong>COS:</strong> ".$row[_con]."<br>";
	if($row[_int])$RACE_SUMMARY.="<strong>INT:</strong> ".$row[_int]."<br>";
	if($row[_wis])$RACE_SUMMARY.="<strong>SAG:</strong> ".$row[_wis]."<br>";
	if($row[_cha])$RACE_SUMMARY.="<strong>CAR:</strong> ".$row[_cha]."<br>";
	$RACE_SUMMARY.="</div>";
	
	$RACIAL_TRAITS.='<div class="racialTraits" id="racialTraits-'.$row[id].'"';
	if($race!=$row[id])$RACIAL_TRAITS.=' style="display:none;"';
	$RACIAL_TRAITS.='>';
	$RACIAL_TRAITS.=nl2br($row[race_traits]);
	$RACIAL_TRAITS.="</div>";
	
	
	
	/*
	
	 _ts_for  	tinyint(4) 	  	  	Si   	NULL  	  	Modifica 	Elimina 	Primaria 	Indice 	Unica 	Testo completo
	 _ts_ref  	tinyint(4) 	  	  	Si   	NULL  	  	Modifica 	Elimina 	Primaria 	Indice 	Unica 	Testo completo
	 _ts_wil  	tinyint(4) 	  	  	Si   	NULL  	  	Modifica 	Elimina 	Primaria 	Indice 	Unica 	Testo completo
	
	*/
	
}

$BODY.='</ul>';

$BODY.='<style>
#form-dndtool LABEL{display:block;}
#form-dndtool LABEL.itemOver{background:#ccc;cursor:pointer;cursor:hand;}
</style>';

$BODY.='<script>
$$("#form-dndtool LABEL").each(function(LABEL){
	LABEL.observe("click",function(e){
		$$(".raceSummary").each(function(DIV){
			DIV.hide();
		});
		$$(".racialTraits").each(function(DIV){
			DIV.hide();
		});
		var id=$(this).readAttribute("for").split("-").last();
		$("raceSummary-"+id).show();
		$("racialTraits-"+id).show();
	});
});

</script>';

$BODY.='</td><td width="25%">';

$BODY.='<ul style="list-style:none;padding:0;margin:0;">';
$BODY.='<li><label for="gender-m"><input type="radio" name="sex" id="gender-m" value="M"'.(($sex=='M')?' checked':'').'>Maschio</li>';
$BODY.='<li><label for="gender-f"><input type="radio" name="sex" id="gender-f" value="F"'.(($sex=='F')?' checked':'').'>Femmina</li>';
$BODY.='</ul>';

$BODY.='</td><td width="25%">';

$BODY.=$RACE_SUMMARY;

$BODY.='</td><td width="25%">';

$BODY.=$RACIAL_TRAITS;

$BODY.='</td></tr></table>';

$BODY.='<br><input type="button" class="btn" value="Indietro" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="Salva">';

$BODY.='</form>';

$BODY.='<script>
$$("#form-dndtool LABEL").each(function(LABEL){
	LABEL.observe("mouseover",function(e){
		this.addClassName("itemOver");
	}).observe("mouseout",function(e){
		this.removeClassName("itemOver");
	});
});

</script>';

$smarty->assign('buttons',$BUTTONS);
?>
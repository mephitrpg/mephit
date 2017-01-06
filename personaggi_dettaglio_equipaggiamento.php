<?php
function calcItemWeight($item){
	if(is_null($item[weight])||$item[weight]==0||$item[weight]==""){
		$w=isset($item[referenceItem])?$item[referenceItem][weight]:$item[weight];
	}else $w=$item[weight];
	preg_match_all("/[0-9\.,]+/",$w,$out);
	if(count($out[0])>0)$w=convertWeight(str_replace(",","",$out[0][0]),$_MEPHIT[lang]);
	return $w*1;
}
function calcItemPrice($item){
	$p=$item[price];
	preg_match_all("/[0-9\.,]+/",$p,$out);
	if(count($out[0])>0){
		if(strpos($p,"pp"))$mod=1000;
		else if(strpos($p,"gp"))$mod=100;
		else if(strpos($p,"sp"))$mod=10;
		else if(strpos($p,"cp"))$mod=1;
		else $mod=100;	//in questo caso nel db è indicato il prezzo numerico in mo
		$p=str_replace(",","",$out[0][0])*$mod;
	}
	return $p*1;
}

require_once("personaggi_dettaglio_equipaggiamento_sel.php");

$C=array(
	"_for"			=>	$P->row[personaggio][_for],
	"taglia"		=>	$P->row[personaggio][taglia],
	"quadrupede"	=>	0,
	"carico"		=>	array(),
);

if($C[_for]<30){
	$C[carico]=array(
		"leggero"=>$carico_l[$C[_for]],
		"medio"=>$carico_m[$C[_for]],
		"pesante"=>$carico_p[$C[_for]],
		"massimo"=>$carico_p[$C[_for]],
		"testa"=>$carico_p[$C[_for]],
		"sollevare"=>$carico_p[$C[_for]]*2,
		"trascinare"=>$carico_p[$C[_for]]*5
	);
}else{
	$decine=floor($C[_for]/10);
	$unita=$C[_for]-$decine*10;
	$moltiplicatore=pow(4,$decine-2);
	$C[carico]=array(
		"leggero"=>$carico_l[20+$unita]*$moltiplicatore,
		"medio"=>$carico_m[20+$unita]*$moltiplicatore,
		"pesante"=>$carico_p[20+$unita]*$moltiplicatore,
		"massimo"=>$carico_p[20+$unita]*$moltiplicatore,
		"testa"=>$carico_p[20+$unita]*$moltiplicatore,
		"sollevare"=>$carico_p[20+$unita]*2*$moltiplicatore,
		"trascinare"=>$carico_p[20+$unita]*5*$moltiplicatore
	);
}

if($C[quadrupede]){
	foreach($C[carico] AS $k=>$v)$C[carico][$k]*=$caricoTagliaQuadrupede[$C[taglia]];
}else{
	foreach($C[carico] AS $k=>$v)$C[carico][$k]*=$caricoTagliaBipede[$C[taglia]];
}

require_once("personaggi_dettaglio_equipaggiamento_prop.php");

$BODY.='<script>';
$BODY.='var Sizes=[];';
$query="SELECT * FROM srd35_size";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$BODY.='Sizes[Sizes.length]="'.$row["name_".$_MEPHIT[lang]].'";';
}
$BODY.='</script>';

$BODY.='
<link rel="stylesheet" href="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/css/personaggi_dettaglio_equipaggiamento.css">

<script>
var lang="'.$_MEPHIT[lang].'";

var carico={
	leggero:parseFloat('.convertWeight($C[carico][leggero],$_MEPHIT[lang]).'),
	medio:parseFloat('.convertWeight($C[carico][medio],$_MEPHIT[lang]).'),
	pesante:parseFloat('.convertWeight($C[carico][pesante],$_MEPHIT[lang]).'),
	massimo:parseFloat('.convertWeight($C[carico][massimo],$_MEPHIT[lang]).'),
	testa:parseFloat('.convertWeight($C[carico][testa],$_MEPHIT[lang]).'),
	sollevare:parseFloat('.convertWeight($C[carico][sollevare],$_MEPHIT[lang]).'),
	trascinare:parseFloat('.convertWeight($C[carico][trascinare],$_MEPHIT[lang]).')
}
var carico_label={
	leggero:"'.addslashes($_LANG[load_light]).'",
	medio:"'.addslashes($_LANG[load_medium]).'",
	pesante:"'.addslashes($_LANG[load_heavy]).'",
	massimo:"'.addslashes($_LANG[load_maximum]).'",
	testa:"'.addslashes($_LANG[lift_over_the_head]).'",
	sollevare:"'.addslashes($_LANG[lift_off_the_ground]).'",
	trascinare:"'.addslashes($_LANG[drag]).'",
	stop:"'.addslashes($_LANG[stop]).'"
}

var L={
	itemtype_armorandshields:"'.addslashes($_LANG[itemtype_armorandshields]).'",
	itemtype_artifact:"'.addslashes($_LANG[itemtype_artifact]).'",
	itemtype_artobject:"'.addslashes($_LANG[itemtype_artobject]).'",
	itemtype_coin:"'.addslashes($_LANG[itemtype_coin]).'",
	itemtype_containers:"'.addslashes($_LANG[itemtype_containers]).'",
	itemtype_eyes:"'.addslashes($_LANG[itemtype_eyes]).'",
	itemtype_feet:"'.addslashes($_LANG[itemtype_feet]).'",
	itemtype_gem:"'.addslashes($_LANG[itemtype_gem]).'",
	itemtype_hands:"'.addslashes($_LANG[itemtype_hands]).'",
	itemtype_head:"'.addslashes($_LANG[itemtype_head]).'",
	itemtype_item:"'.addslashes($_LANG[itemtype_item]).'",
	itemtype_neck:"'.addslashes($_LANG[itemtype_neck]).'",
	itemtype_service:"'.addslashes($_LANG[itemtype_service]).'",
	itemtype_shoulders:"'.addslashes($_LANG[itemtype_shoulders]).'",
	itemtype_staff:"'.addslashes($_LANG[itemtype_staff]).'",
	itemtype_torso:"'.addslashes($_LANG[itemtype_torso]).'",
	itemtype_universalitems:"'.addslashes($_LANG[itemtype_universalitems]).'",
	itemtype_waist:"'.addslashes($_LANG[itemtype_waist]).'",
	itemtype_wand:"'.addslashes($_LANG[itemtype_wand]).'",
	itemtype_weapons:"'.addslashes($_LANG[itemtype_weapons]).'",
	itemtype_wondrous2:"'.addslashes($_LANG[itemtype_wondrous2]).'",
	itemtype_wrists:"'.addslashes($_LANG[itemtype_wrists]).'",
	itemtype_ring:"'.addslashes($_LANG[itemtype_ring]).'",
	itemtype_potion:"'.addslashes($_LANG[itemtype_potion]).'",
	itemtype_rod:"'.addslashes($_LANG[itemtype_rod]).'",
	itemtype_oil:"'.addslashes($_LANG[itemtype_oil]).'",
	itemtype_scroll:"'.addslashes($_LANG[itemtype_scroll]).'",
	
	name:"'.addslashes($_LANG[name]).'",
	total:"'.addslashes($_LANG[total]).'",
	Q:"'.addslashes($_LANG[Q]).'",
	quantity:"'.addslashes($_LANG[quantity]).'",
	weight:"'.addslashes($_LANG[weight]).'",
	price:"'.addslashes($_LANG[price]).'",
	lb:"'.addslashes($_LANG[lb]).'",
	pp:"'.addslashes($_LANG[pp]).'",
	gp:"'.addslashes($_LANG[gp]).'",
	sp:"'.addslashes($_LANG[sp]).'",
	cp:"'.addslashes($_LANG[cp]).'",
	size:"'.addslashes($_LANG[size]).'",
	category:"'.addslashes($_LANG[category]).'",
	type:"'.addslashes($_LANG[type]).'",
	notes:"'.addslashes($_LANG[notes]).'",
	other:"'.addslashes($_LANG[other]).'",
	money:"'.addslashes($_LANG[money]).'",
	rename:"'.addslashes($_LANG['rename']).'",
	delete:"'.addslashes($_LANG[delete]).'"
}
</script>

<script src="'.$_MEPHIT[WWW_ROOT].'/js/jPrototype.js"></script>
<script src="'.$_MEPHIT[WWW_ROOT].'/js/jMouse.js"></script>
<script src="'.$_MEPHIT[WWW_ROOT].'/js/NumberFormat154.js"></script>
<script src="'.$_MEPHIT[WWW_ROOT].'/js/personaggi_dettaglio_equipaggiamento.js"></script>
';

// taglia
/*
$P=$GLOBALS[P]->row[personaggio];
if(
	$v[category]=="Shield"
	||$v[category]=="Armor"
	||$v[family]=="Armor and Shields"
){
	$modificatori=array(1/10,1/10,1/10,1/2,1,2,5,8,12);
	$w*=$modificatori[$P[taglia]];
}else if(
	$v[category]=="Weapon"
	||$v[family]=="Weapons"
){
	$modificatori=array(1/10,1/10,1/10,1/2,1,2,5,8,12);
	$w*=$modificatori[$P[taglia]];
}else if(
	$v[weightSize]==1
){
	$modificatori=array(1/4,1/4,1/4,1/4,1,4,4,4,4);
	$w*=$modificatori[$P[taglia]];
}
*/

$BODY.='<form id="form-dndtool" action="personaggi_save.php" method="post">';
$BODY.='<input type="hidden" name="what" value="equipaggiamento">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';

$BODY.='
<h3>Possedimenti</h3>
<table border="0" cellpadding="0" cellspacing="0" class="tabellabella" style="border-width:0 0 1px 0;width:100%;">
<tr>
	<td align="center" style="border-bottom:1px solid #c00000;"><strong>Contenitore</strong></td>
	<td align="center" style="border-bottom:1px solid #c00000;"><strong>Contenuto</strong></td>
</tr>
<tr valign="top">
<th>
	<table border="0" cellpadding="0" cellspacing="0"><tbody id="contenitori_nome"></tbody></table>
</th>
<td id="contenitori_contenuto" style="padding:6px 0 6px 6px;width:100%;"></td>
</tr></table>
';

$BODY.='<script>$("contenitori_contenuto").observe("mouseover",itemTipOver).observe("mouseout",itemTipOut).observe("mousemove",itemTipMove);</script>';

$BODY.='<br />';

require_once("personaggi_dettaglio_equipaggiamento_tabmenu.php");
require_once("personaggi_dettaglio_equipaggiamento_bags.php");
require_once("personaggi_dettaglio_equipaggiamento_items.php");

$BODY.='
<br><input type="button" class="btn" value="'.$_LANG[back].'" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="'.$_LANG[save].'"><br><br>
</form>';

$smarty->assign('buttons',$BUTTONS);
?>
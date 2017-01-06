<?php
# Get Data from Database
$values=array();
$query="SELECT * FROM mephit_personaggio WHERE id_personaggio=".$_GET["id"];
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$values=$row;
}
//echo "******************************************************************************".$values[eta];
$values["_for_mod"]=mod($values["_for"]);
$values["_des_mod"]=mod($values["_des"]);
$values["_cos_mod"]=mod($values["_cos"]);
$values["_int_mod"]=mod($values["_int"]);
$values["_sag_mod"]=mod($values["_sag"]);
$values["_car_mod"]=mod($values["_car"]);

$values["_tem_tot"]=$values["_tem"]+$values["_cos_mod"]+$values["_tem_mag"]+$values["_tem_var"];
$values["_rif_tot"]=$values["_rif"]+$values["_des_mod"]+$values["_rif_mag"]+$values["_rif_var"];
$values["_vol_tot"]=$values["_vol"]+$values["_sag_mod"]+$values["_vol_mag"]+$values["_vol_var"];

if($values["giocatore"]==0){
	$values["giocatore"]=$_LANG["npc"];
}else{
	$query="SELECT nick FROM dnd_giocatori WHERE id=".$values["giocatore"];
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		$values["giocatore"]=$row[0];
	}
}

$query="SELECT classe,livello FROM mephit_personaggio_classe WHERE fk_personaggio=".$_GET["id"];
$result=mysql_query($query);
$values["classi"]=array();
$values["livello_tot"]=0;
while(list($c,$l)=mysql_fetch_array($result)){
	$values["classi"][]=array($c,$l);
	$values["livello_tot"]+=$l;
}
$values["classi"]=formatClasses($values["classi"]);
$values["grado_classe"]=$values["livello_tot"]+3;
$values["grado_classe_incrociata"]=$values["grado_classe"]/2;

$values["iniziativa_tot"]=$values["iniziativa"]+$values["_des_mod"];

$values["grapple_tot"]=$values["bab"]+$values["_for_mod"]+$values["taglia_mod"]+$values["grapple_var"];

for($i=1;$i<=5;$i++){
	switch($values["tipoAttacco".$i]){
		case 1:			$values["tipoAttacco".$i."_string"]=$_LANG["slashing"];		break;
		case 2:			$values["tipoAttacco".$i."_string"]=$_LANG["piercing"];		break;
		case 3:			$values["tipoAttacco".$i."_string"]=$_LANG["bludgeoning"];	break;
		case 0:default:	$values["tipoAttacco".$i."_string"]="";						break;
	}
}

for($i=1;$i<=5;$i++){
	switch($values["tipoDifesa".$i]){
		case 1:			$values["tipoDifesa".$i."_string"]=$_LANG["light"];		break;
		case 2:			$values["tipoDifesa".$i."_string"]=$_LANG["medium"];	break;
		case 3:			$values["tipoDifesa".$i."_string"]=$_LANG["heavy"];		break;
		case 0:default:	$values["tipoDifesa".$i."_string"]="";					break;
	}
}

$values["weight_gear_total"]=0;
for($i=0;$i<33;$i++){
	if($_COOKIE["mephit_lang"]=="it_Italiano" && $values["weight".$i]!=NULL ){
		$values["weight".$i]*=0.5;
	}
	$values["weight_gear_total"]+=$values["weight".$i];
}
//money weight
$values["weight_gear_total"]+=($values["cp"]*0.02+$values["sp"]*0.02+$values["gp"]*0.02+$values["pp"]*0.02)*(($_COOKIE["mephit_lang"]=="it_Italiano")?0.5:1);
$values["weight_gear_total"]=round($values["weight_gear_total"],1);

$query="SELECT light,medium,heavy FROM srd35_carrying WHERE _for=".$values["_for"];
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	while(list($light,$medium,$heavy)=mysql_fetch_array($result)){
		$values["light_load"]=0;
		$values["medium_load"]=$light;
		$values["heavy_load"]=$medium;
		$values["lift_over_head"]=$heavy;
	}
}else{
	//forza spaventosa
	$t=$values["_for"]/10;
	$unita=($t-floor($t))*10;
	$decine=floor($t);
	$query="SELECT light,medium,heavy FROM srd35_carrying WHERE _for=2".$unita;
	$result=mysql_query($query);
	while(list($light,$medium,$heavy)=mysql_fetch_array($result)){
		$values["light_load"]=0;
		$values["medium_load"]=pow($light,$decine-2);
		$values["heavy_load"]=pow($medium,$decine-2);
		$values["lift_over_head"]=pow($heavy,$decine-2);
	}
}
$values["lift_off_ground"]=$values["lift_over_head"]*2;
$values["push_or_drag"]=$values["lift_over_head"]*5;

$l=substr($_COOKIE["mephit_lang"],0,2);
$l=($l!="en")?"_".$l:"";

//size and legs number
$quadrupede=0;
$size_legs_mod=1;
$query="SELECT id,_mod,name".$l.",trasporto".(($quadrupede)?"_quadrupedi":"")." FROM srd35_size";
$result=mysql_query($query);
$taglia_options.="";
while(list($id,$mod,$nome,$trasporto)=mysql_fetch_array($result)){
	$taglia_options.="<option value=\"".$id."\"";
	if($id==$values["taglia"]){
		$size_legs_mod=$trasporto;
		$values["taglia_mod"]=$mod;
//		$values["taglia"]=formatSize($values["taglia_mod"]);
		$values["taglia_string"]=$nome;
		$taglia_options.=" selected";
	}
	$taglia_options.=">".$nome;
}
if($l=="it"){
		$values["light_load"]=round($values["light_load"]*0.5*$size_legs_mod,1);
		$values["medium_load"]=round($values["medium_load"]*0.5*$size_legs_mod,1);
		$values["heavy_load"]=round($values["heavy_load"]*0.5*$size_legs_mod,1);
		$values["lift_over_head"]=round($values["lift_over_head"]*0.5*$size_legs_mod,1);
		$values["lift_off_ground"]=round($values["lift_off_ground"]*0.5*$size_legs_mod,1);
		$values["push_or_drag"]=round($values["push_or_drag"]*0.5*$size_legs_mod,1);
}

// armor class
$values["CA"]=10+$values["armatura"]+$values["armatura_scudo"]+$values["armatura_mod_des_max"]+$values["taglia_mod"]+$values["armatura_naturale"]+$values["armatura_deviazione"]+$values["armatura_var"];
$values["CA_contatto"]=$values["CA"]-$values["armatura"]-$values["armatura_scudo"]-$values["armatura_naturale"];
$values["CA_sprovvista"]=$values["CA"]-$values["armatura_mod_des_max"];

//alignment
//$values["allineamento_string"]=formatAlignment($values["allineamento"]);
$query="SELECT id,name".$l.",name_short".$l." FROM srd35_alignment";
$result=mysql_query($query);
$allineamento_options="<option>";
while(list($id,$nome,$short)=mysql_fetch_array($result)){
		$allineamento_options.="<option value=\"".$id."\"";
		if($id==$values["allineamento"]){
			$allineamento_options.=" selected";
			$values["allineamento_string"]=$short;
		}
		$allineamento_options.=">".$short;
}

//campaign
$query="SELECT id_campagna,nome FROM mephit_campagna";
$result=mysql_query($query);
$campagna_options="";
while(list($id,$nome)=mysql_fetch_array($result)){
	$campagna_options.="<option value=".$id;
	if($id==$values["fk_campagna"]){
		$campagna_options.=" selected";
		$campagna=htmlspecialchars($nome);
	}
	$campagna_options.=">".htmlspecialchars($nome);
}
?>
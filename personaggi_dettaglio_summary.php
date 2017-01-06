<?php
$row=$P->row[personaggio];
require_once("include/functions_ogl.php");

	$isMine=(( $_SESSION[logged] && $row[autore]==$_SESSION[user_id] )?"_frameset":"");
	$canIedit=$isMine||$_SESSION[user_type]=="admin";
	
	$BODY.='<table border="0" cellpadding="0" cellspacing="0"><tr valign="top">';

	$BODY.='<td width="300">';
	
	$BODY.='<img src="images/addThisButton.gif"><br><br>';
	
	$BODY.="<script>
function popSheet(q){
	var h=parseInt(screen.height/100*90);
	var t=(screen.height-h)/2;
	var o=window.open('sheet".(($canIedit)?"_frameset":"").".php?id='+q,'','scrollbars=1,width=670,height='+h+',top='+t);
	if(o==undefined)alert('L\\'apertura della finestra è stata bloccata');
}
</script>
";
	$BODY.="<strong>";
	$BODY.=($row[race]=="")?"Nessuna razza":formatRace($row[race]);
	$BODY.=" ";
	$BODY.=(($row[sex]=="M"))?"Maschio":"Femmina";
	$BODY.=", ";
	
	$classi=$P->getMulticlass();
	if(count($classi)>0){
		$output=array();
		foreach($classi as $c){
			$output[]=($c[short]!=""?$c[short]:$c[name])." ".$c[level];
		}
		$BODY.=implode("/",$output);
	}else{
		$BODY.="Nessuna classe";
	}
	
	$BODY.="</strong>, umanoide ";
	$BODY.=formatSize($row[taglia],$row[sex]);
	
	$BODY.="<br>";
	
	$c=$P->getAbilityTotal();
	$BODY.="<strong>Caratteristiche: </strong>";
	$BODY.=$_LANG["_str"]." ".$c[score][_str].", ";
	$BODY.=$_LANG["_dex"]." ".$c[score][_dex].", ";
	$BODY.=$_LANG["_con"]." ".$c[score][_con].", ";
	$BODY.=$_LANG["_int"]." ".$c[score][_int].", ";
	$BODY.=$_LANG["_wis"]." ".$c[score][_wis].", ";
	$BODY.=$_LANG["_cha"]." ".$c[score][_cha]."";
	
	$BODY.="<br>";
	
	$a=$P->getAlignment();
	$BODY.="<strong>Allineamento: </strong>";
	$BODY.=$a[name];
	
	$BODY.="<br>";
	
	$d=$P->getDeity();
	$BODY.="<strong>Divinit&agrave;: </strong>";
	$BODY.=is_null($d)||$d=="NULL"?"Nessuna":$d[name]." (".$d[alignment][short].")";
	
	$BODY.="<br>";
	
	$d=$P->getFeat();
	$BODY.='<strong>'.$_LANG['feats'].': </strong>';
	$feats=array();
	foreach($d AS $k=>$v){
		$feats[]=$v[name];
	}
	if(count($feats)>0){
		$BODY.=implode(", ",$feats);
	}else{
		$BODY.=$_LANG['feats_none'];
	}
	
	$BODY.="<br>";
	
	$skillz=getSkills();
	$s=$P->getSkillTotal();
	$BODY.='<strong>'.$_LANG['skills_with_ranks'].': </strong>';
	
	if(!isset($skills))$skills=array();
	foreach($s AS $k=>$v){
		/*
		$valid=true;
		     if(strpos($v[code],"perform_"       )===0){if($v[ranks]<1)$valid=false;}
		else if(strpos($v[code],"craft_"         )===0){if($v[ranks]<1)$valid=false;}
		else if(strpos($v[code],"speakLanguages_")===0){               $valid=false;}
		if($valid){
			$sub=$skills[$id][subtype]!=""?" (".$skills[$id][subtype].")":"";
			$skills[]=$v[name].$sub." ".($v[total]>0?"+":"").$v[total];
		}
		*/
		if( $v[ranks]>0.5 /*||($skillz[$k][train]==0&&$v[total]>0)*/ ){
			$sub=$skillz[$id][subtype]!=""?" (".$skills[$id][subtype].")":"";
			$skills[]=$v[name].$sub." ".($v[total]>0?"+":"").$v[total];
		}
	}
	if(count($skills)>0){
		$BODY.=implode(", ",$skills);
	}else{
		$BODY.=$_LANG['skills_with_ranks_none'];
	}
	
	$BODY.="<br><br>";
	
	$tem_tot=$row[_tem]+$c[mod][_con]+$row[_tem_mag]+$row[_tem_var]+$row[_tem_temp];
	$rif_tot=$row[_rif]+$c[mod][_dex]+$row[_rif_mag]+$row[_rif_var]+$row[_rif_temp];
	$vol_tot=$row[_vol]+$c[mod][_wis]+$row[_vol_mag]+$row[_vol_var]+$row[_vol_temp];
	
	$ca=10+$row[_armatura]+$row[_taglia]+$row[_des_mod]+$row[_armatura_scudo]+$row[_des_mod]+$row[_taglia_mod]+$row[_armatura_naturale]+$row[_armatura_deviazione]+$row[_armatura_var];
	
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
	
	$BODY.='
</td>';

//	if($img!="")$BODY.="<a href=\"".$_MEPHIT["upload_path"]."/".(($row[fk_giocatore]!=0)?$row[fk_giocatore]."/pg":"png").$stmp."\" target=\"_blank\" title=\"Clicca qui per visualizzare\nuna versione stampabile\ndi questa immagine\"><img src=\"".$_MEPHIT["upload_path"]."/".(($row[fk_giocatore]!=0)?$row[fk_giocatore]."/pg":"png").$img."\" border=\"0\" align=\"right\"></a>\n";

if($canIedit){

$BODY.='<td width="20">&nbsp;</td>';
$BODY.='<td>';
	$BODY.='<div id="testImageContainer" style="width:300px;text-align:center;">';
	$BODY.='<a href="'.$img_big.'" target="_blank" title="Zoom">';
	$BODY.=/*dropShadow(*/'<img id="testImage" width="100%" src="'.$img_big.'" style="border:0;border-bottom:1px solid #ccc;">'/*,4,"#CCCCCC")*/;
	$BODY.='</a>';
	$BODY.='<br><br>';
	$BODY.='<a href="personaggi.php?id='.$_GET[id].'&what=immagine" title="Modifica immagine">';
	$BODY.='Modifica immagine';
	$BODY.='</a>';
	$BODY.='</div>';
$BODY.='</td>';

$BODY.='<td width="20">&nbsp;</td>';
$BODY.='<td>

<style>
#pannelloIcone{
	width:220px;
}
#pannelloIcone A{
	width:110px;
	display:block;float:left;
	text-align:center;
	margin-bottom:20px;
}

#pannelloIcone A.disabled{
	opacity:.30;-moz-opacity:.30;filter:alpha(opacity=30);zoom:1;
}
#pannelloIcone A:hover.disabled{
	opacity:1;-moz-opacity:1;filter:alpha(opacity=100);zoom:1;
}
</style>

<div id="pannelloIcone" class="row">

<a href="personaggi.php?id='.$_GET[id].'&what=descrizione">
	<img width="50" height="50" src="images/p_description.gif" border="0"><br>
	Descrizione
</a>

<a href="personaggi.php?id='.$_GET[id].'&what=caratteristiche">
	<img width="50" height="50" src="images/p_characteristics.gif" border="0"><br>
	Caratteristiche
</a>

<a href="personaggi.php?id='.$_GET[id].'&what=razza">
	<img width="50" height="50" src="images/p_race.gif" border="0"><br>
	Razza
</a>

<a href="personaggi.php?id='.$_GET[id].'&what=classi">
	<img width="50" height="50" src="images/p_class.gif" border="0"><br>
	Classi
</a>

<a href="personaggi.php?id='.$_GET[id].'&what=abilita">
	<img width="50" height="50" src="images/p_abilities.gif" border="0"><br>
	Abilit&agrave;
</a>

<a href="personaggi.php?id='.$_GET[id].'&what=talenti">
	<img width="50" height="50" src="images/p_feats.gif" border="0"><br>
	Talenti
</a>

<a href="personaggi.php?id='.$_GET[id].'&what=equipaggiamento">
	<img width="50" height="50" src="images/p_equip.gif" border="0"><br>
	Equipaggiamento
</a>

<a href="personaggi.php?id='.$_GET[id].'&what=combattimento">
	<img width="50" height="50" src="images/p_combat.gif" border="0"><br>
	Combattimento
</a>

<a href="personaggi.php?id='.$_GET[id].'&what=divinita">
	<img width="50" height="50" src="images/p_gods.gif" border="0"><br>
	Divinit&agrave;
</a>

<a href="javascript:alert(\'Non disponibile/Unavailable\');" class="disabled">
	<img width="50" height="50" src="images/p_magic.gif" border="0"><br>
	Magia
</a>

</div>

<div style="background:#c00000;text-align:center;">
<a style="text-decoration:none;color:#fff;" href="personaggi_delete.php?id='.$_GET[id].'">ELIMINA QUESTO PERSONAGGIO</a>
</div>
</td>
';
}else{

$BODY.='<td>';
	$BODY.='<div id="testImageContainer" style="width:300px;text-align:center;">';
	$BODY.='<a href="'.$img_big.'" target="_blank" title="Zoom">';
	$BODY.=/*dropShadow(*/'<img id="testImage" width="100%" src="'.$img_big.'" style="border:0;border-bottom:1px solid #ccc;">'/*,4,"#CCCCCC")*/;
	$BODY.='<br><br>';
	$BODY.='Zoom';
	$BODY.='</a>';
	$BODY.='</div>';
$BODY.='</td>';

}

$BODY.='</tr></table>';
	/*
	$BUTTONS='';
	//	$BUTTONS.='<a href="#" title="Aggiungi ai preferiti"><img src="/jure/images/m_star_plus.gif" alt="Aggiungi ai preferiti"></a>';
	//	$BUTTONS.=' ';
	$BUTTONS.='<a href="javascript:window.print()" title="Stampa"><img src="'.$_MEPHIT["HTDOCS"].'/images/m_print.gif" border="0" alt="Stampa"></a>';
	$BUTTONS.=' ';
	$BUTTONS.='<a href="#" title="Aggiungi alle tue creazioni
	una copia di questa creazione"><img src="'.$_MEPHIT["HTDOCS"].'/images/m_mephit_plus.gif" border="0" alt="Aggiungi alle tue creazioni
	una copia di questa creazione"></a>';
	$BUTTONS.=' ';
	$BUTTONS.='<a href="#" title="Aggiungi ai preferiti"><img src="'.$_MEPHIT["HTDOCS"].'/images/m_heart_plus.gif" border="0" alt="Aggiungi ai preferiti"></a>';
	$BUTTONS.=' ';
	$BUTTONS.='<a href="#" title="Invia link ad un amico"><img src="'.$_MEPHIT["HTDOCS"].'/images/m_sendlink.gif" border="0" alt="Aggiungi ai preferiti"></a>';
	$BUTTONS.=' ';
	$smarty->assign('buttons',$BUTTONS);
	*/
	$BODY.="<br />";
	
	$BODY.='Personaggio creato da <a href="giocatori.php?id='.$row[autore].'">'.getNick($row[autore]).'</a>';
	
	$BODY.=' usando il metodo <strong>';
	switch($row[metodo]){
		case"mephit";	$BODY.='mephit';	break;
		case"standard";	$BODY.='standard';	break;
		case"free";		$BODY.='libero';	break;
	}
	$BODY.='</strong>.<br>';
	if(!is_null($row[fk_avventura]))$BODY.='Questo personaggio partecipa all\'avventura <a href="avventura.php?id='.$row[fk_avventura].'">'.getAdventureName($row[fk_avventura]).'</a>.<br>';
	/*
	$BODY.='<br /><br />';
	$BODY.='<a href="javascript:popSheet('.$_GET[id].');" title="Scheda del Personaggio"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE[mephit_theme].'/images/sheet_'.(($canIedit)?'edit_':'').'ico.gif" width="20" height="20" border="0"> Mostra scheda</a><br />';
	$BODY.='<br />';
	*/
?>
<?php
require"pg.php";

$BODY.='<script src="js/tooltip.js"></script>';

$personaggi=getAdventurePGs($avv[id_avventura]);
$giocatori=getAdventureMembers($avv[id_avventura]);
/*
global $PGs;
$PGs=array();
*/

foreach($personaggi AS $id_personaggio=>$p){
	$P=new PG($id_personaggio);
	$classi="";
	$C=$P->getMulticlass();
	if(count($C)>0){
		$output=array();
		foreach($C as $c){
			$output[]=$c[short]." ".$c[level];
		}
		$classi=implode("/",$output);
	}else{
		$classi="Nessuna classe";
	}
	$BODY.="<div id=\"".$P->row[personaggio][nome]."\" class=tip>";
		if($P->row[personaggio][immagine_stampa]!=""&&$P->row[personaggio][coordinate_tooltip]!=""){
			
			$thumbFile=replace_extension($P->row[personaggio][immagine_stampa],"jpg");
			
			$BODY.='<img src="'.$_MEPHIT[WWW_ROOT].$_MEPHIT[upload_path].'/users/'.$P->row[personaggio][autore].'/pg/tooltip/'.$thumbFile.'" width="48" border="1" align="left"';
			if($bd['browser']=="MSIE")$BODY.=' style="margin-left:-3px;"';
			if($bd['browser']=="Opera")$BODY.=' style="margin-left:0px;"';
			$BODY.='>';
			
		}
		$BODY.="<b>".$P->row[personaggio][nome]."</b>";
		if($classi!="")$BODY.=" (".$classi.")";
		$BODY.="<br>";
		$BODY.="Razza: ".($P->row[personaggio][race]==""?"Nessuna razza":formatRace($P->row[personaggio][race]));
		if($P->row[personaggio][sex]!="")$BODY.=" (".$P->row[personaggio][sex].")";
		$BODY.="<br>";
		$BODY.="Giocatore: ".$giocatori[$P->row[personaggio][autore]];
		$BODY.="<br>";
		if($P->row[personaggio][descrizione_tooltip]!="")$BODY.="<br>".$P->row[personaggio][descrizione_tooltip];
	$BODY.="</div>\n";

}

$BODY.='<script src="js/tooltip.js"></script>';

$query="SELECT * FROM mephit_diario WHERE fk_avventura=".$avv[id_avventura];
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	while($row=mysql_fetch_assoc($result)){
		$testo_pag=$row[testo];
		foreach($personaggi as $id=>$nome){
			$testo_pag=preg_replace("/\b".$nome."\b/","<script>s(\"".$nome."\",".$id.")</script>",$testo_pag);
		}
		$BODY.="<br /><div><strong>".htmlspecialchars($row[titolo])."</strong></div><br />";
		$BODY.="<div>".$testo_pag."</div>";
		
/*		
		$BODY.="<table border=0 cellpadding=0 cellspacing=0 width=\"100%\"><tr>\n";
		$BODY.="<td width=\"50%\">".(($hereIAm<$last_pag)?"&laquo;&nbsp;<a href=\"diario.php?gruppo=".$_GET["gruppo"]."&avventura=".$avventura."&sessione=".$id_pagine[$hereIAm+1]."\">PRECEDENTE</a>":"&laquo;&nbsp;PRECEDENTE")."</td>\n";
		$BODY.="<td><img src=\"themes/".$_COOKIE["mephit_theme"]."/images/journalselect_left.gif\" style=\"margin-right:1px;\"></td>";
		$BODY.="<form><td align=center bgcolor=cc0000><select onchange=\"location.href='diario.php?gruppo=".$_GET["gruppo"]."&avventura=".$avventura."&sessione='+this.options[this.options.selectedIndex].value\" class=select_title>\n";
		for($i=0;$i<=$last_pag;$i++){
			$BODY.= "<option value=".$id_pagine[$i];
			if($i==$hereIAm)$BODY.=" selected";
			$BODY.= ">".$date[$i]." - ".$titoli[$i];
		}
		$BODY.="</select></td></form>\n";
		$BODY.="<td><img src=\"themes/".$_COOKIE["mephit_theme"]."/images/journalselect_right.gif\"></td>";
		$BODY.="<td width=\"50%\" align=right>".(($hereIAm>0)?"<a href=\"diario.php?gruppo=".$_GET["gruppo"]."&avventura=".$avventura."&sessione=".$id_pagine[$hereIAm-1]."\">SUCCESSIVO</a>&nbsp;&raquo;":"SUCCESSIVO&nbsp;&raquo;")."</td>\n";
		$BODY.="</tr></table><br>\n";
		$BODY.= $testo_pag;
*/
	}
}else{
	$BODY.="<div align=center>".$_LANG[empty_journal]."</div>";
}

require_once("include/dress_dynamic.php");
?>

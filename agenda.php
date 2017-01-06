<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title','Agenda');

$PATH='<a href="agenda.php">Agenda</a>';
$TAB1='community';

$BODY="";

require_once("include/moon-phase2.php");

$AGENDA=new jureDate();
$MOON=new MoonCalculation();

$cal=$AGENDA->getCalendarMonth(date("m"),date("Y"));
$changeMoon=$MOON->quartersDays(date("Y"),4);

$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0" width="100%" id="agendaTbl">';
		$BODY.='<tr>';
		$BODY.='<td rowspan="'.(count($cal)+2).'" style="background:#ccc;width:30%;">';
		$BODY.='<div style="float:left;">&nbsp;<a href="#">&laquo;&laquo;&laquo;</a></div>';
		$BODY.='<div style="float:right;"><a href="#">&raquo;&raquo;&raquo;</a>&nbsp;</div>';
		$BODY.='<h3 style="text-align:center;margin-bottom:0;">'.$AGENDA->lang[it][monthName][(date("m")-1)].'<div style="font-size:7.5pt;">'.date("Y").'</div></h3>';
		$BODY.='<div style="padding:0px 6px 6px 0px;">';
		$BODY.='<ul style="display:block;border:4px solid #aaa;padding:0 0 0 0.5em;margin:0 0 0 0.5em;background:#eee;height:'.(10*5*count($cal)).'px;overflow:scroll;">';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='<li>'.'Impegno X';
		$BODY.='</ul>';
//		$BODY.='<div align="right" style="font:bold 7.5pt tahoma;">';
//		$BODY.='13:50';
//		$BODY.='</div>';
		$BODY.='</div>';
		$BODY.='</td>';
		for($i=0;$i<7;$i++){
			$BODY.='<td style="text-align:center;background:#aaa;font:bold 7.5pt tahoma;padding:2px 0;">'.$AGENDA->getLangElement("dayName",$i).'</td>';
		}
		$BODY.='</tr>';
foreach($cal as $roww){
	$BODY.='<tr valign="top">';
	foreach($roww as $coll){
		if($coll!=""){
		$BODY.='<td width="10%">';
		if(array_key_exists($coll,$changeMoon)){
			$BODY.='<div class="notaDayMoon">';
			$BODY.='<a href="#"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/agenda_edit.gif" class="dx" alt="'.'Edit'.'" title="'.'Edit'.'"></a>';
			$BODY.='<img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/moon'.$changeMoon[$coll].'.gif" class="sx" alt="'.$MOON->phaseName($changeMoon[$coll]).'" title="'.$MOON->phaseName($changeMoon[$coll]).'">';
			$BODY.=$coll;
			$BODY.='</div>';
		}else{
			$BODY.='<div class="notaDay">';
			$BODY.='<a href="#"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/agenda_edit.gif" class="dx" alt="'.'Edit'.'" title="'.'Edit'.'"></a>';
			$BODY.=$coll;
			$BODY.='</div>';
		}
		$BODY.='<div>';
		$BODY.='<a href="#" class="nota">6 note</a>';
		$BODY.='<a href="#" class="nota">1 partita</a>';
		$BODY.='<a href="#" class="nota">5 eventi</a>';
		$BODY.='<a href="#" class="nota">3 meeting</a>';
		$BODY.='</div>';
		$BODY.='</td>';
		}else{
			$BODY.='<td bgcolor="#cccccc">&nbsp;</td>';
		}
	}
	$BODY.='</tr>';
}
$BODY.='</table>';

require_once("include/dress_dynamic.php");
?>

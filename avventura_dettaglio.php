<?php
$query="SELECT *
FROM mephit_avventura
WHERE id_avventura=".$_GET[id];
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	
	while($row=mysql_fetch_assoc($result)){
		$avv=$row;
	}
	$mapFolder=$_MEPHIT[WWW_ROOT].'/public/users/'.$avv[fk_master].'/map';
	
	$smarty->assign('title',$avv[nome]);
	$PATH='<a href="avventura.php'.$pagPos_path.'">'.$_LANG["adventures"].'</a> &raquo; <a href="avventura.php?id='.$_GET[id].$pagPos_avventura.'">'.htmlspecialchars($avv[nome])."</a>";
	$TAB1='risorse';
	
	if(0
		||$avv['public']==1
		||$avv[fk_master]==$_SESSION[user_id]
	){
		
		$pagPos=array();
		if(isset($_GET[pag]))$pagPos[pag]="pag=".$_GET[pag];
		if(isset($_GET[orderby]))$pagPos[orderby]="orderby=".$_GET[orderby];
		if(count($pagPos)>0){
			$pagPos_avventura="&".implode("&",$pagPos);
			$pagPos_path="?".implode("&",$pagPos);
		}
		
/*
		$BODY.='<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr valign="top">';
		$BODY.='<td width="100%">';
*/
		require"avventura_menu.php";
		switch($_GET["what"]){
			case"trama":		case"pg":			case"png":
			case"home":			case"eventi":		case"spunti":
			case"propp":		case"schermo":		case"srd":
			case"ingame":		case"outgame":		case"invita":
			case"summary":		case"map":			case"griglia":
			case"personali":	case"pubbliche":	case"dizionari":
			case"diario":		case"servizio":		case"ambientazione":
				require"avventura_dettaglio_".$_GET["what"].".php";
			break;
			default:
				require"avventura_dettaglio_summary.php";
			break;
		}
/*
		$BODY.='</td>';
		$BODY.='<td width="10" nowrap></td>';
		$BODY.='<td id="storyTools" width="180" nowrap>';
*/
/*
		$BODY.='</td></tr><table>';
*/
	}else{
	
		$BODY='<h3>'.$_LANG["access_denied"].'</h3>Non sei abilitato ad accedere a quest\'area.<br /><br />
		<a href="javascript:history.back();">&laquo; '.$_LANG["back"].'</a> &nbsp; <a href="index.php">Vai all\'Homepage</a>';
		
	}
}else{
	
	$smarty->assign('title',$_LANG[adventures]);
		$PATH='<a href="avventura.php'.$pagPos_path.'">'.$_LANG["adventures"].'</a> &raquo; <a href="avventura.php?id='.$_GET[id].$pagPos_avventura.'">'.htmlspecialchars($avv[nome])."</a>";
		$TAB1='risorse';
	$BODY.='Avventura inesistente';
	
}
?>
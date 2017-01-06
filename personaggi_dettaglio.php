<?php
function mod($q){
	return floor(($q-10)/2);
}
function sign($q){
	return ($q<0)?$q:"+$q";
}

if(isset($_GET[id])){
	require"include/functions_ogl.php";
	require"pg.php";
	global $P;
	$P=new PG($_GET[id]);
}

$nome_personaggio=$P->row[personaggio][nome];

$smarty->assign('title',$nome_personaggio);

$pagPos=array();
if(isset($_GET[pag]))$pagPos[pag]="pag=".$_GET[pag];
if(isset($_GET[orderby]))$pagPos[orderby]="orderby=".$_GET[orderby];
if(count($pagPos)>0){
	$pagPos_personaggio="&".implode("&",$pagPos);
	$pagPos_path="?".implode("&",$pagPos);
}
$PATH='<a href="personaggi.php'.$pagPos_path.'">'.$_LANG["characters"].'</a> &raquo; <a href="personaggi.php?id='.$_GET[id].$pagPos_personaggio.'">'.htmlspecialchars($nome_personaggio)."</a>";
$TAB1='risorse';

switch($_GET["what"]){
	case"divinita":		case"caratteristiche":
	case"razza":		case"classi":
	case"abilita":		case"descrizione":		case"talenti":
	case"immagine":		case"equipaggiamento":	case"combattimento":
		if($_SESSION[user_id]==$P->row[personaggio][autore]||$_SESSION[user_type]=="admin"){
			require"personaggi_dettaglio_".$_GET["what"].".php";
		}
	break;
	default:
		require"personaggi_dettaglio_summary.php";
	break;
}

?>
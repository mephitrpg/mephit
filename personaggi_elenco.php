<?php
$smarty->assign('title',$_LANG["characters"]);

$PATH='<a href="personaggi.php">'.$_LANG["characters"].'</a>';
$TAB1='risorse';

$jSQL=new jure_mysql(true);
$positionElements_personaggio=$jSQL->getPositionElements();

//	if(count($this->positionElements)>0){
//		$positionElements_path="?".implode("&",$positionElements);
//	}
/*
$query ="SELECT t1.id_personaggio,t1.nome,t1.autore"/ *,t1.attivo* /.",t2.nome as authorName";
$query.=" FROM mephit_personaggio AS t1,mephit_giocatore AS t2";
$query.=" WHERE t1.autore=t2.id_giocatore";
$table_headers=array(array("Nome",1),array("Classi e Livelli",0),array("Autore",1));
switch($_GET[orderby]){
	case -1:		$query.=" ORDER BY t1.nome,authorName";			break;
	case 1:			$query.=" ORDER BY t1.nome DESC,authorName";	break;
	case -3:		$query.=" ORDER BY authorName,t1.nome";			break;
	case 3:			$query.=" ORDER BY authorName DESC,t1.nome";	break;
	default:		$query.=" ORDER BY t1.nome,authorName";			break;
}
$personaggi=$jSQL->getSelectResults($query,2);
if(!$personaggi[error]){
	if(!$personaggi["empty"]){
		$BODY.='<table cellspacing="0" class="itemTable" width="100%">';
//		$BODY.='<td><b>Stato</b></td>';
		$BODY.=$jSQL->dressHeaders($table_headers);
		foreach($personaggi[rows] as $item){
			$BODY.='<tr>';
//			$BODY.='<td align=center>'.formatStatus($attivo).'</td>';
			$BODY.='<td><a href="personaggi.php?id='.$item[id_personaggio].$pagPos_personaggio.'">'.$item[nome].'</a></td>';
			$query_classi="SELECT classe,livello FROM mephit_personaggio_classe WHERE fk_personaggio=".$item[id_personaggio];
			$result_classi=mysql_query($query_classi);
			$classi=array();
			while(list($c,$l)=mysql_fetch_array($result_classi)){
				$classi[]=array($c,$l);
			}
			$classe=formatClasses($classi);
			$BODY.='<td>'.(($classe!="")?$classe:'&nbsp;').'</td>';
			if($item[authorName]!=""){
				$BODY.='<td><a href="giocatori.php?id='.$item[autore].'">'.$item[authorName].'</a></td>';
			}else{
				$BODY.= '<td>PNG</td>';
			}
//			$BODY.='<td><a href="diario.php?campagna=$campagna">$campagna_titolo</a></td>';
			$BODY.='</tr>';
		}
		$BODY.='</table><br>';
		$BODY.=$jSQL->dressMenuWithButtons($personaggi[menu],$pagPos_menu);
	}else{
		$BODY.='Nessun personaggio trovato';
	}
}


$BODY.='<br />';
*/

require"pg.php";
global $P;

$query ="SELECT t1.id_personaggio,t1.nome as pgName,t1.autore"/*,t1.attivo*/.",t2.nick as authorName,t1.immagine_stampa";
$query.=" FROM mephit_personaggio AS t1, mephit_giocatore AS t2";
$query.=" WHERE t1.autore=t2.id_giocatore";

//$jSQL->addTableHeader("Nome","t1.nome","pgName");
//$jSQL->addTableHeader("Classi e Livelli");
// $jSQL->addTableHeader("Autore","t2.nick","authorName");

$personaggi=$jSQL->getSelectResults($query/*,2*/);
if(!$personaggi[error]){
	$BODY.='<table cellspacing="0" class="itemTable" width="100%">';
	$BODY.=$jSQL->dressHeaders();
	$BODY.='</table><br>';
	
	if(!$personaggi["empty"]){
		$BODY.='<ul style="list-style:none;margin:0;padding:0;" class="row">';
		foreach($personaggi[rows] as $item){
			
			$ramo=($item[autore]!=0)?$item[autore].'/pg':'/png';
			if($item[immagine_stampa]!=""){
				$stmp="/printable/".$item[immagine_stampa];
				$img="/tooltip/".replace_extension($item[immagine_stampa],"jpg");
				$img_big=$_MEPHIT[WWW_ROOT].$_MEPHIT[upload_path].'/users/'.$ramo.$stmp;
				$img_small=$_MEPHIT[WWW_ROOT].$_MEPHIT[upload_path].'/users/'.$ramo.$img;
			}else{
				$img_big=$_MEPHIT[WWW_ROOT]."/images/pg_image.jpg";
				$img_small=$_MEPHIT[WWW_ROOT]."/images/pg_thumb.gif";
			}
			
			$BODY.='<li class="col" style="width:320px;height:'.($_MEPHIT[avatar_maxHeight]+20).'px;">';
			$BODY.='<div style="padding:0 20px 20px 0;overflow:auto;">';
			$BODY.='<a href="personaggi.php?id='.$item[id_personaggio].$pagPos_personaggio.'"><img src="'.$img_small.'" border="0" align="left"></a>';
			$BODY.='<a href="personaggi.php?id='.$item[id_personaggio].$pagPos_personaggio.'">'.$item[pgName].'</a>';
			$BODY.='<br>';
			
			$P=new PG($item[id_personaggio]);
			
			$classi=$P->getMulticlass();
			if(count($classi)>0){
				$output=array();
				foreach($classi as $c){
					$output[]=$c[short]." ".$c[level];
				}
				$BODY.=implode("/",$output);
			}else{
				$BODY.="Nessuna classe";
			}
			$BODY.='<br>';
			
			
			$BODY.='<br><em style="font-size:10px;">';
			if($item[authorName]!=""){
				$BODY.='Autore: <a href="giocatori.php?id='.$item[autore].'" style="font-size:10px;">'.$item[authorName].'</a>';
			}else{
				$BODY.='PNG';
			}
			$BODY.='</em>';
			
//			$BODY.='<td><a href="diario.php?campagna=$campagna">$campagna_titolo</a></td>';
			$BODY.='</div>';
			$BODY.='</li>';
		}
		$BODY.='</ul>';
	}else{
		$l=(!isset($_GET[letter])||strlen(trim($_GET[letter]))!=1)?"A":$_GET[letter];
		$BODY.='<div>Nessun personaggio con iniziale "'.$l.'" trovato</div>';
	}
	
	$BODY.=$jSQL->dressMenuWithButtons($personaggi[menu]);
}

?>
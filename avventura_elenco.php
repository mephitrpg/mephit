<?php
require_once("include/config.php");
require_once("include/dress.php");

$PATH='<a href="avventure.php">'.$_LANG["adventures"].'</a>';
$TAB1='risorse';

$BODY="";


	$smarty->assign('title',$_LANG["adventures"]);

	$query="SELECT *,a.nome AS nome_avventura
	FROM mephit_avventura AS a
	JOIN mephit_giocatore AS g ON fk_master=id_giocatore
	ORDER BY a.nome";
	
	$jSQL=new jure_mysql();
	$sql=$jSQL->getSelectResults($query,25);
	if(!$sql[error]){
		
		
		if(!$sql["empty"]){
			$BODY.='<table border="0" cellpadding="0" cellspacing="0" class="itemTable">';
			$BODY.='<tr>';
			$BODY.='<th>'.$_LANG[name].'</th>';
			$BODY.='<th>'.$_LANG[game_master].'</th>';
			$BODY.='<th>'.$_LANG[players].'</th>';
			$BODY.='<th>'.$_LANG[start].'</th>';
			$BODY.='</tr>';
			foreach($sql[rows] as $row){
				$BODY.='<tr>';
				$BODY.='<td><a href="avventura.php?id='.$row[id_avventura].'">'.$row[nome_avventura].'</a></td>';
				$BODY.='<td><a href="giocatori.php?id='.$row[fk_master].'">'.$row[nick].'</a></td>';
				$BODY.='<td>';
					$players=getAdventureMembers($row[id_avventura]);
					$p=array();
					foreach($players AS $id=>$nome){
						$p[]='<a href="giocatori.php?id='.$id.'">'.$nome.'</a>';
					}
					$BODY.=count($p)>0?implode(", ",$p):'&nbsp;';
				$BODY.='</td>';
				$BODY.='<td>'.dateFormat($row["data"]).'</td>';
				$BODY.='</tr>';
			}
			$BODY.='</table>';
		}else{
			$BODY.="L'avventura specificata &egrave; inesistente";
			$BODY.='<br>';
			$BODY.='<br>';
		}
		
	}else{
		echo "<div>".implode("<br>",$result["error_messages"])."</div><br />";
	}
	
	$BODY.=$jSQL->dressMenuWithButtons($sql[menu]);
	
	/*
	if($_SESSION[logged]){
		$BODY.='<h3>'.'Crea nuovo gruppo'.'</h3>';
		$BODY.='<form action="my.php" method="post">';
		$BODY.='<table>';
		$BODY.='<tr valign="top">';
		$BODY.='<td><input name="nuovoGruppo" type="text"></td>';
		$BODY.='<td>';
		$BODY.='<input type="submit" value="Salva" class="btn">';
		$BODY.='</td>';
		$BODY.='</tr>';
		$BODY.='</table>';
		$BODY.='</form>';
	}
	*/


require_once("include/dress_dynamic.php");
?>

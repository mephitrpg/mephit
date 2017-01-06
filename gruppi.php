<?php
require_once("include/config.php");
require_once("include/dress.php");

$PATH='<a href="gruppi.php">'.$_LANG["groups"].'</a>';
$TAB1='community';

$BODY="";

if(isset($_GET["id"])){
	$query="SELECT count(*) FROM mephit_giocatore_gruppo WHERE fk_gruppo=".$_GET["id"];
	$result=mysql_query($query);
	$quantiMembri=0;
	while($row=mysql_fetch_row($result))$quantiMembri=$row[0];
	
	$query="SELECT *,gr.nome AS nomeGruppo FROM mephit_gruppo AS gr JOIN mephit_giocatore AS gi ON id_giocatore=fk_master WHERE id_gruppo=".$_GET[id];
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		while($row=mysql_fetch_array($result)){
			$PATH.=' &raquo; <a href="gruppi.php?id='.$_GET[id].'">'.htmlspecialchars($row[nomeGruppo]).'</a>';
			$smarty->assign('title',htmlspecialchars($row[nomeGruppo]));
			
			if($row["image"]!=""){
				$BODY.='<a href="gruppi.php?id='.$_GET[id].'"><img src="'.$_MEPHIT[WWW_ROOT].'/public/'.$row[image].'" border="0" alt"Clicca per entrare nella pagina del gruppo \'\''.$row[nomeGruppo].'\'\'" title="Clicca per entrare nella pagina del gruppo \'\''.$row[nomeGruppo].'\'\'"></a>';
				$BODY.='<br /><br />';
			}
			
			$BODY.='<img src="images/addThisButton.gif"><br><br>';
			
			$BODY.='<table border="0" cellpadding="0" cellspacing="0"><tr valign="top">';
			$BODY.='<td>';
			if($_SESSION[logged]){
				$groupsAsMember=getGroupsAsMember();
				$groupsAsAdmin=getGroupsAsAdmin();
				if(in_array($_GET[id],array_keys($groupsAsAdmin))){
					$BODY.='<div>';
					$BODY.='<form action="#">';
					$BODY.='<input type="submit" class="btn" value="Crea un\'avventura di gruppo">';
					$BODY.='</form>';
					$BODY.='</div><br>';
				}else if(in_array($_GET[id],array_keys($groupsAsMember))){
					$BODY.='<div>';
					$BODY.='<form action="request_delete.php">';
					$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';
					$BODY.='<input type="hidden" name="what" value="gruppo">';
					$BODY.='<input type="submit" class="btn" value="Esci dal gruppo">';
					$BODY.='</form>';
					$BODY.='</div><br>';
				}else{
					$BODY.='<div>';
					$BODY.='<form action="request.php">';
					$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';
					$BODY.='<input type="hidden" name="what" value="gruppo">';
					$BODY.='<input type="submit" class="btn" value="Iscriviti al gruppo">';
					$BODY.='</form>';
					$BODY.='</div><br>';
				}
			}
			
			$BODY.='<a href="gruppi.php?id='.$_GET[id].'&what=avventure">'.$_LANG[adventures].'</a> ('.'#'.')';
			$BODY.='<br />';
			$BODY.='<a href="gruppi.php?id='.$_GET[id].'&what=membri">'.$_LANG[members].'</a> ('.$quantiMembri.')';
			$BODY.='<br />';
			$BODY.='<a href="gruppi.php?id='.$_GET[id].'&what=attesa">'.$_LANG[waiting_list].'</a> ('.'#'.')';
			$BODY.='<br /><br />';
			$BODY.='Amministratore: <a href="giocatori.php?id='.$row[fk_master].'">'.$row[nick].'</a>';
			$BODY.='<br />';
			
			$BODY.='</td>';
			$BODY.='</tr></table>';
		}
	}else{
		$BODY.="Il gruppo specificato &egrave; inesistente";
	}
}else{
	$smarty->assign('title',$_LANG["groups"]);

	$query="SELECT * FROM mephit_gruppo ORDER BY nome";
	
	$jSQL=new jure_mysql();
	$sql=$jSQL->getSelectResults($query,25);
	if(!$sql[error]){
		
		
		if(!$sql["empty"]){
			$BODY.='<ul>';
			foreach($sql[rows] as $row){
				$BODY.="<li><a href=\"gruppi.php?id=".$row["id_gruppo"]."\">".$row["nome"]."</a></li>";
			}
			$BODY.='</ul>';
		}else{
			$BODY.="Il gruppo specificato &egrave; inesistente";
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
}

require_once("include/dress_dynamic.php");
?>

<?php
$query_avatar="SELECT * FROM mephit_giocatore WHERE id_giocatore=".$_GET["id"];
$result_avatar=mysql_query($query_avatar);
while($row=mysql_fetch_array($result_avatar)){
	$nick=$row[nick];
	$avatar=getAvatar($row);
}
$smarty->assign('title',$nick);

$PATH.=' &raquo; <a href="giocatori.php?id='.$_GET[id].'">'.$nick.'</a>';
$TAB1='community';

/*
$query="SELECT t1.fk_gruppo,t2.nome FROM mephit_giocatore_gruppo AS t1,mephit_gruppo AS t2 WHERE t1.fk_gruppo=t2.id_gruppo AND t1.fk_giocatore=".$_GET["id"];
$result=mysql_query($query);
while(list($gruppo_id,$gruppo_nome)=mysql_fetch_array($result)){
	$dati[$gruppo_id]["nome"]=$gruppo_nome;
	$dati[$gruppo_id]["campagne"]=array();
	$query2="SELECT id_campagna,nome FROM mephit_campagna WHERE fk_gruppo=".$gruppo_id;
	$result2=mysql_query($query2);
	while(list($campagna_id,$campagna_nome)=mysql_fetch_array($result2)){
		$dati[$gruppo_id]["campagne"][$campagna_id]=$campagna_nome;
	}
}
*/

$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0"><tr valign="top">';
$BODY.='<td>';
if($avatar!=""){
	$BODY.='<div style="width:'.$_MEPHIT[avatar][maxWidth].'px;height:'.$_MEPHIT[avatar][maxHeight].'px;">';
//	$BODY.=dropShadow($avatar,4,"#888888");
	$BODY.=$avatar;
	$BODY.='</div><br>';
}

$BODY.='<img src="images/addThisButton.gif"><br><br>';

$amici=getFriends();

$BODY.='<div>';
if(!in_array($_GET[id],$amici)){
	if($_GET[id]!=$_SESSION[user_id]){
		if($_SESSION[logged]){
			$query="
				SELECT * FROM mephit_community_request
				WHERE 1
				AND fk_mitt=".$_GET[id]."
				AND fk_dest=".$_SESSION[user_id]."
				AND fk_app=0
				AND tipo='amico'
			";
			$result=mysql_query($query);
			if(mysql_num_rows($result)==0){
				$BODY.=navButton("Aggiungi agli amici",'request.php?id='.$_GET[id].'&what=amico');
			}
		}
	}
}else{
	if($_SESSION[logged]){
		$BODY.=navButton("Rimuovi dagli amici",'request_delete.php?id='.$_GET[id].'&what=amico');
	}
}
/*
$BODY.=' ';
$BODY.=navButton("Aggiungi ad un gruppo",'gruppi_request.php?id='.$_GET[id]);
*/
$BODY.='</div><br>';


$BODY.='</td><td width="20">&nbsp;</td><td>';
/*
if(is_array($dati)){
	$k1=array_keys($dati);
	if(count($k1)>0){
		$BODY.="<table border=1 cellpadding=6 cellspacing=0><tr bgcolor=e0e0e0>";
		$BODY.="<td><b>Gruppo</b></td>";
		$BODY.="<td><b>Campagna</b></td>";
		$BODY.="</tr>";
		foreach($k1 as $id){
			$q=count($dati[$id]["campagne"]);
			$BODY.="<tr valign=top><td rowspan=".(($q>0)?$q:1).">";
			$BODY.=$dati[$id]["nome"];
			$BODY.="</td>";
			if($q>0){
				$k2=array_keys($dati[$id]["campagne"]);
				$temp=array();
				foreach($k2 as $i){
					$temp[]="<td>".$dati[$id]["campagne"][$i]."</td>";
				}
				$BODY.=implode("</tr><tr>",$temp);
				$BODY.="</tr>";
			}
		}
		$BODY.="</table>";
	}
}
*/

$BODY.='<h3>Personaggi</h3>';

$query="SELECT id_personaggio,nome FROM mephit_personaggio WHERE autore=".$_GET[id]." ORDER BY nome";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	$BODY.='<ul>';
	while($row=mysql_fetch_array($result)){
		$BODY.='<li><a href="personaggi.php?id='.$row[id_personaggio].'">'.$row[nome].'</a>';
	}
	$BODY.='</ul>';
}else{
	$BODY.='Nessun personaggio';
}

$BODY.='</td>';
$BODY.='</tr></table>';
?>

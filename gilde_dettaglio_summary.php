<?php
$query="SELECT count(*) FROM mephit_giocatore_gilda WHERE fk_gilda=".$_GET["id"];
$result=mysql_query($query);
$quantiMembri=0;
while($row=mysql_fetch_row($result))$quantiMembri=$row[0];

$query="SELECT count(*) FROM mephit_avventura WHERE fk_gilda=".$_GET["id"];
$result=mysql_query($query);
$quanteAvventure=0;
while($row=mysql_fetch_row($result))$quanteAvventure=$row[0];

$query="SELECT *,gr.nome AS nomeGruppo FROM mephit_gilda AS gr JOIN mephit_giocatore AS gi ON id_giocatore=fk_master WHERE id_gilda=".$_GET[id];
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	while($row=mysql_fetch_array($result)){
		$PATH.=' &raquo; <a href="gilde.php?id='.$_GET[id].'">'.htmlspecialchars($row[nomeGruppo]).'</a>';
		$smarty->assign('title',htmlspecialchars($row[nomeGruppo]));
		
		if($row["image"]!=""){
			$BODY.='<a href="gilde.php?id='.$_GET[id].'"><img src="'.$_MEPHIT[WWW_ROOT].'/public/'.$row[image].'" border="0" alt"Clicca per entrare nella pagina della gilda \'\''.$row[nomeGruppo].'\'\'" title="Clicca per entrare nella pagina della gilda \'\''.$row[nomeGruppo].'\'\'"></a>';
			$BODY.='<br /><br />';
		}
		
		$BODY.='<img src="images/addThisButton.gif"><br><br>';
		
		$BODY.='<table border="0" cellpadding="0" cellspacing="0"><tr>';
		$BODY.='<td>';
		if($_SESSION[logged]){
			$guildsAsMember=getGuildsAsMember();
			$guildsAsAdmin=getGuildsAsAdmin();
			if(in_array($_GET[id],array_keys($guildsAsAdmin))){
				//
			}else if(in_array($_GET[id],array_keys($guildsAsMember))){
				$BODY.='<div>';
				$BODY.='<form action="request_delete.php">';
				$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';
				$BODY.='<input type="hidden" name="what" value="gilda">';
				$BODY.='<input type="submit" class="btn" value="Esci dalla gilda">';
				$BODY.='</form>';
				$BODY.='</div><br>';
			}else{
				$BODY.='<div>';
				$BODY.='<form action="request.php">';
				$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';
				$BODY.='<input type="hidden" name="what" value="gilda">';
				$BODY.='<input type="submit" class="btn" value="Iscriviti alla gilda">';
				$BODY.='</form>';
				$BODY.='</div><br>';
			}
		}
		
		$BODY.='<a href="gilde.php?id='.$_GET[id].'&what=avventure">'.$_LANG[adventures].'</a> ('.$quanteAvventure.')';
		$BODY.='<br />';
		$BODY.='<a href="gilde.php?id='.$_GET[id].'&what=membri">'.$_LANG[members].'</a> ('.$quantiMembri.')';
		$BODY.='<br />';
		$BODY.='<a href="gilde.php?id='.$_GET[id].'&what=attesa">'.$_LANG[waiting_list].'</a> ('.'#'.')';
		$BODY.='<br /><br />';
		
		$BODY.='Homepage: <a href="'.$row[url].'" target="_blank">'.$row[url].'</a>';
		$BODY.='<br />';
		$BODY.='Esclusiva: '.($row[exclusive]?$_LANG[yes]:$_LANG[no]);
		$BODY.='<br />';
		$BODY.='Amministratore: <a href="giocatori.php?id='.$row[fk_master].'">'.$row[nick].'</a>';
		$BODY.='<br />';
		
		$BODY.='</td>';
		$BODY.='</tr></table>';
	}
}else{
	$BODY.="La gilda specificata &egrave; inesistente";
}
?>

<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["my_mephit"]);

$BODY='';

$PATH='';
$TAB1='my';

require("include/menu_personal.php");

function ul($filename,$arr){
	if(count($arr)>0){
		$x='<ul>';
		foreach($arr as $id=>$nome)$x.='<li><a href="'.$filename.'.php?id='.$id.'">'.$nome.'</a>';
		return $x.'</ul>';
	}else return '<div style="text-indent:2em;">Nessun elemento</div>';
}

if(isset($_POST[nuovoGruppo])&&trim($_POST[nuovoGruppo])!=""){
	$nuovoGruppo=$_POST[nuovoGruppo];
	$q="SELECT * FROM mephit_gruppo WHERE nome='".$nuovoGruppo."'";
	$r=mysql_query($q);
	if(mysql_num_rows($r)==0){
		$query="INSERT INTO mephit_gruppo (fk_master,nome) VALUES (".$_SESSION[user_id].",'".$nuovoGruppo."')";
		$result=mysql_query($query);
		$lastId=mysql_insert_id();
		$query="INSERT INTO mephit_giocatore_gruppo (fk_giocatore,fk_gruppo) VALUES (".$_SESSION[user_id].",".$lastId.")";
		$result=mysql_query($query);
	}else{
		$BODY.='<div>';
		$BODY.='ERRORE: il gruppo '.htmlentities(stripslashes($_POST[nuovoGruppo])).' esiste gi&agrave;<br><br>';
		$BODY.='<a href="javascript:history.back();">Indietro</a>';
		$BODY.='</div><br>';
	}
}

$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0"><tr valign="top"><td>';
	
	$BODY.='<h4>'.'Il mio profilo'.'</h4>';
	$BODY.=getAvatarBox($_SESSION[user_id]);
	
$BODY.='</td><td width="10" style="border-right:1px solid #ccc" nowrap>&nbsp;</td><td width="10" nowrap></td><td>';
	
	$BODY.='<h4>'.'I miei personaggi'.'</h4>';
	$BODY.=ul("personaggi",getPGs());
	
$BODY.='</td><td width="10" style="border-right:1px solid #ccc" nowrap>&nbsp;</td><td width="10" nowrap></td><td>';
	
	$BODY.='<h4>'.'Le mie classi'.'</h4>';
	$BODY.=ul("classi",getUserClass($_SESSION[user_id]));
	
$BODY.='</td><td width="10" style="border-right:1px solid #ccc" nowrap>&nbsp;</td><td width="10" nowrap></td><td>';
	
	$BODY.='<h4>'.'Gruppi che seguo'.'</h4>';
	$BODY.=ul("gruppi",getGroupsAsMember());
	
	$BODY.='<h4>'.'Gruppi che amministro'.'</h4>';
	$BODY.=ul("gruppi",getGroupsAsAdmin());
	
$BODY.='</td><td width="10" style="border-right:1px solid #ccc" nowrap>&nbsp;</td><td width="10" nowrap></td><td>';
	
	$BODY.='<h4>'.'Gilde che seguo'.'</h4>';
	$BODY.=ul("gilde",getGuildsAsMember());
	
	$BODY.='<h4>'.'Gilde che amministro'.'</h4>';
	$BODY.=ul("gilde",getGuildsAsAdmin());
	
$BODY.='</td><td width="10" style="border-right:1px solid #ccc" nowrap>&nbsp;</td><td width="10" nowrap></td><td>';

	$BODY.='<h4>'.'Avventure che seguo'.'</h4>';
	$BODY.=ul("avventura",getAdventuresAsMember());
	
	$BODY.='<h4>'.'Avventure che amministro'.'</h4>';
	$BODY.=ul("avventura",getAdventuresAsAdmin());
	
$BODY.='</td>';

/*
$BODY.='</td><td width="10" nowrap></td><td>';
$BODY.='<h4>'.'I miei amici'.'</h4>';
$amici=getFriends();
$query="SELECT
*
FROM mephit_giocatore
WHERE id_giocatore IN (".implode(",",$amici).")
";
$result=mysql_query($query);
if($result){
	if(mysql_num_rows($result)>0){
		$BODY.='<ul>';
		while($row=mysql_fetch_array($result)){
			$BODY.='<li><a href="giocatori.php?id='.$row[id_giocatore].'">'.$row[nick].'</a>';
		}
		$BODY.='</ul>';
	}else{
		$BODY.="Nessun gruppo";
	}
}else{
	$BODY.="ERRORE DEL SERVER: IMPOSSIBILE LEGGERE IL DATABASE";
}
*/

$BODY.='</tr></table>';


require_once("include/dress_dynamic.php");
?>
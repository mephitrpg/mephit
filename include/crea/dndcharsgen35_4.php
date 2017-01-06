<?php
$user_max_pc=$_MEPHIT[user][permission][$_SESSION[user_type]][max_pc];

if($user_max_pc<0){
	$continue=true;
}else{
	$query="SELECT * FROM mephit_personaggio WHERE autore=".$_SESSION[user_id];
	$result=mysql_query($query);
	$continue=mysql_num_rows($result)<$user_max_pc;
}

if(!$continue){
	$BODY.=$_LANG[too_many_pc];
}else{
	
	$nome=($_POST[tipoNome]=="auto")?$_POST[namesSel]:$_POST[names];
	$queryInsChar="INSERT INTO mephit_personaggio (`_for`,`_des`,`_cos`,`_int`,`_sag`,`_car`,`nome`,`autore`,`metodo`) VALUES ('".$_POST[punFOR]."','".$_POST[punDES]."','".$_POST[punCOS]."','".$_POST[punINT]."','".$_POST[punSAG]."','".$_POST[punCAR]."','".$nome."','".$_SESSION[user_id]."','".$_SESSION[metodo]."')";
	$resultInsChar=mysql_query($queryInsChar);
	if($resultInsChar){
		$lastId=mysql_insert_id();
		mysql_query("DELETE FROM mephit_crea_personaggio WHERE fk_giocatore=".$_SESSION[user_id]);
		$BODY.='Personaggio salvato correttamernte<br><br>
	<form>
	<input type=button class="btn" value="Mostra il personaggio creato" onclick="location.href=\'personaggi.php?id='.$lastId.'\'"></form>
	<input type=button class="btn" value="Crea qualcos\'altro" onclick="location.href=\'crea.php\'"></form>
	';
	}else{
		$BODY.='ERRORE DEL DATABASE: personaggio non salvato<br><br>
	<form action="'.$_SERVER["PHP_SELF"].'?'.$_SERVER["QUERY_STRING"].'" method="post">
	<input type="hidden" name="names" value="'.$nome.'">
	<input type="hidden" name="punFOR" value="'.$_POST["punFOR"].'">
	<input type="hidden" name="punDES" value="'.$_POST["punDES"].'">
	<input type="hidden" name="punCOS" value="'.$_POST["punCOS"].'">
	<input type="hidden" name="punINT" value="'.$_POST["punINT"].'">
	<input type="hidden" name="punSAG" value="'.$_POST["punSAG"].'">
	<input type="hidden" name="punCAR" value="'.$_POST["punCAR"].'">
	<input type=submit class="btn" value="Riprova">
	<input type=button class="btn" value="Crea qualcos\'altro" onclick="location.href=\'crea.php\'">
	</form>
	';
	}
	
}
?>
<?
require_once("../../include/config.php");
$sezione="giocatore";
$message="";
$error=true;
$query_personaggi="SELECT nome FROM mephit_personaggio WHERE fk_giocatore=".$_POST["id_item"];
$result_personaggi=mysql_query($query_personaggi);
if(mysql_num_rows($result_personaggi)==0){
	# tolgo l'associazione del giocatore dai vari gruppi cancellando dalla tabella giocatore<->gruppo i record che riguardano il giocatore 
	$query="DELETE FROM mephit_giocatore_gruppo WHERE fk_giocatore=".$_POST["id_item"];
	$result=mysql_query($query);
	if($result){
		# cancello il giocatore
		$query="DELETE FROM mephit_giocatore WHERE id_giocatore=".$_POST["id_item"];
		$result=mysql_query($query);
		if($result){
			$message="Giocatore eliminato correttamente<br><br>";
			$error=false;
		}else{
			$message="ERRORE: Giocatore non eliminato ma disassociato dai gruppi<br><br>";
		}
	}else{
		$message="ERRORE: Giocatore non eliminato<br><br>";
	}
}else{
	$message="ERRORE: Impossibile eliminare il giocatore perchè associato ai personaggi:<ul>";
	while($row=mysql_fetch_array($result_personaggi)){
		$message.="<li>".htmlspecialchars($row[0]);
	}
	$message.="</ul>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Giocatore</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action="index.php" method="post">
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=submit value="Indietro" onclick="document.f.action='delete_form.php'">
<?}?>
<input type=submit value="Torna al Giocatore">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
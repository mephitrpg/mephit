<?
require_once("../../include/config.php");
$sezione="giocatore";
$message="";
$error=true;
# controllo che i campi obbligatori siano compilati
if( trim($_POST["nick"])!="" && trim($_POST["nome"])!="" && trim($_POST["cognome"])!="" /*&& isset($_POST["gruppo"])*/ ){
	# modifico i dati nella tabella del giocatore
	$query="UPDATE mephit_giocatore SET nick='".trim($_POST["nick"])."',nome='".trim($_POST["nome"])."',cognome='".trim($_POST["cognome"])."',was_master='".$_POST["wasmaster"]."' WHERE id_giocatore=".$_POST["id_item"];
	$result=mysql_query($query);
	if($result){
/*
		# cancello tutte le associazioni col giocatore dalla tabella giocatore<->gruppo
		$query2="DELETE FROM mephit_giocatore_gruppo WHERE fk_giocatore=".$_POST["id_item"];
		$result2=mysql_query($query2);
		if($result2){
			# aggiorno la tabella giocatore<->gruppo
			$values=array();
			foreach($_POST["gruppo"] as $t){
				$values[]="('".$t."','".$_POST["id_item"]."')";
			}
			$query3="INSERT INTO mephit_giocatore_gruppo (fk_gruppo,fk_giocatore) VALUES ".implode(",",$values);
			$result3=mysql_query($query3);
			if($result3){
*/
				$message="Giocatore modificato correttamente<br><br>";
				$error=false;
/*
			}else{
				$message="ERRORE: Giocatore modificato ma disassociato dai gruppi<br><br>";
			}
		}else{
			$message="ERRORE: Giocatore modificato ma le associazioni coi gruppi sono rimaste invariate<br><br>";
		}
*/
	}else{
		$message="ERRORE: Giocatore non modificato<br><br>";
	}
}else{
	$message="ERRORE: Devi compilare tutti i campi obbligatori<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Giocatore</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action=index.php method=post>
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=hidden name=nick value="<?=htmlspecialchars(stripslashes($_POST["nick"]))?>">
<input type=hidden name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>">
<input type=hidden name=cognome value="<?=htmlspecialchars(stripslashes($_POST["cognome"]))?>">
<input type=hidden name=wasmaster value="<?=$_POST["wasmaster"]?>">
<?
if(isset($_POST["gruppo"])){
	foreach($_POST["gruppo"] as $t){
		echo"<input type=hidden name=gruppo[] value=\"".$t."\">";
	}
}
?>
<input type=submit value="Indietro" onclick="document.f.action='modify_form.php'">
<?}?>
<input type=submit value="Torna al Giocatore">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
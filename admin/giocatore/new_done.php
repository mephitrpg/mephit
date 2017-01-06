<?
require_once("../../include/config.php");
$sezione="giocatore";
$message="";
$error=true;
# controllo che i campi obbligatori siano compilati
if( trim($_POST["nick"])!="" && trim($_POST["nome"])!="" && trim($_POST["cognome"])!="" /*&& isset($_POST["gruppo"])*/ ){
	# inserisco i dati nella tabella del giocatore
	$query1="INSERT INTO mephit_giocatore (nick,nome,cognome,was_master) VALUES ('".htmlspecialchars(trim($_POST["nick"]))."','".trim($_POST["nome"])."','".trim($_POST["cognome"])."','".$_POST["wasmaster"]."')";
	$result1=mysql_query($query1);
	if($result1){
/*
		# inserisco le associazioni nella tabella giocatore<->gruppo
		$id_giocatore=mysql_insert_id();
		$values=array();
		# preparo i valori da inserire
		foreach($_POST["gruppo"] as $t){
			$values[]="('".$t."','".$id_giocatore."')";
		}
		# e li inserisco
		$query2="INSERT INTO mephit_giocatore_gruppo (fk_gruppo,fk_giocatore) VALUES ".implode(",",$values);
		$result2=mysql_query($query2);
		if($result2){
*/
			$message="Giocatore creato correttamente<br><br>";
			$error=false;
		}else{
/*
			# se l'inserimento non è riuscito, elimino il giocatore appena creato
			$result3=mysql_query("DELETE FROM mephit_giocatore WHERE id_giocatore=".$id_giocatore);
			if($result3){
				$message="ERRORE: Giocatore non creato<br><br>";
			}else{
				$message="ERRORE: Giocatore creato senza gruppi associati<br><br>";
			}
		}
	}else{
*/
		$message="ERRORE: Giocatore non creato<br><br>";
	}
}else{
	$message="ERRORE: Devi compilare tutti i campi obbligatori<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Giocatore</h1>
<form name=f action=index.php method=post>
<?
echo $message;
if($error){?>
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
<input type=submit value="Indietro" onclick="document.f.action='new_form.php'">
<?}?>
<input type=submit value="Torna al Giocatore">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
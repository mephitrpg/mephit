<?
require_once("../../include/config.php");
$sezione="gruppo";
$message="";
$error=true;
# cancello tutte le associazioni col gruppo dalla tabella giocatore<->gruppo
$query2="DELETE FROM mephit_giocatore_gruppo WHERE fk_gruppo=".$_POST["id_item"];
$result2=mysql_query($query2);
if($result2){
	if(isset($_POST["giocatore"])){
		# aggiorno la tabella giocatore<->gruppo
		$values=array();
		foreach($_POST["giocatore"] as $t){
			$values[]="('".$t."','".$_POST["id_item"]."')";
		}
		$query3="INSERT INTO mephit_giocatore_gruppo (fk_giocatore,fk_gruppo) VALUES ".implode(",",$values);
		$result3=mysql_query($query3);
		if($result3){
			$message="Membri modificati correttamente<br><br>";
			$error=false;
		}else{
			$message="ERRORE: Membri disassociati dai gruppi<br><br>";
		}
	}else{
		$message="Membri modificati correttamente<br><br>";
		$error=false;
	}
}else{
	$message="ERRORE: Membri non modificati<br><br>";
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
<?
if(isset($_POST["giocatore"])){
	foreach($_POST["giocatore"] as $t){
		echo"<input type=hidden name=giocatore[] value=\"".$t."\">";
	}
}
?>
<input type=submit value="Indietro" onclick="document.f.action='members_form.php'">
<?}?>
<input type=submit value="Torna al Giocatore">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
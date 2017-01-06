<?
require_once("../../include/config.php");
$sezione="personaggio";
$message="";
$error=true;
/*$query=="SELECT * FROM mephit_campagna WHERE fk_gruppo=".$_POST["id_item"];
$result=mysql_query($query);
if(mysql_num_rows($result)==0){
*/	$query="DELETE FROM mephit_personaggio WHERE id_personaggio=".$_POST["id_item"];
	$result=mysql_query($query);
	if($result){
		$message="Personaggio eliminato correttamente<br><br>";
		$error=false;
	}else{
		$message="ERRORE: Personaggio non eliminato<br><br>";
	}/*
}else{
	$message="ERRORE: Impossibile eliminare il gruppo perchè associato a delle campagne.<br><br>";
}*/
require_once("../../include/admin/theme_top.php");
?>
<br><h1>Personaggio</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action="index.php" method="post">
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=submit value="Indietro" onclick="document.f.action='delete_form.php'">
<?}?>
<input type=submit value="Torna al Personaggio">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
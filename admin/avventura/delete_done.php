<?
require_once("../../include/config.php");
$sezione="avventura";
$message="";
$error=true;
$query="SELECT nome FROM mephit_sessione WHERE fk_avventura=".$_POST["id_item"];
$result=mysql_query($query);
if(mysql_num_rows($result)==0){
	$query="DELETE FROM mephit_avventura WHERE id_avventura=".$_POST["id_item"];
	$result=mysql_query($query);
	if($result){
		$message="Avventura eliminata correttamente<br><br>";
		$error=false;
	}else{
		$message="ERRORE: Avventura non eliminata<br><br>";
	}
}else{
	$message="ERRORE: Impossibile eliminare l'avventura perchè associato alle sessioni:<ul>";
	while($row=mysql_fetch_array($result)){
		$message.="<li>".htmlspecialchars($row[0]);
	}
	$message.="</ul>";
}
require_once("../../include/admin/theme_top.php");
?>
<br><h1>Avventura</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action="index.php" method="post">
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=submit value="Indietro" onclick="document.f.action='delete_form.php'">
<?}?>
<input type=submit value="Torna all'Avventura">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
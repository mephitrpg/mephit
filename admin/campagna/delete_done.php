<?
require_once("../../include/config.php");
$sezione="campagna";
$message="";
$error=true;
$query_personaggi="SELECT nome FROM mephit_personaggio WHERE fk_campagna=".$_POST["id_item"];
$result_personaggi=mysql_query($query_personaggi);
if(mysql_num_rows($result_personaggi)==0){
	$query_avventure="SELECT nome FROM mephit_avventura WHERE fk_campagna=".$_POST["id_item"];
	$result_avventure=mysql_query($query_avventure);
	if(mysql_num_rows($result_avventure)==0){
		$query="DELETE FROM mephit_campagna WHERE id_campagna=".$_POST["id_item"];
		$result=mysql_query($query);
		if($result){
			$message="Campagna eliminata correttamente<br><br>";
			$error=false;
		}else{
			$message="ERRORE: Campagna non eliminata<br><br>";
		}
	}else{
		$message="ERRORE: Impossibile eliminare la campagna perchè associata alle avventure:<ul>";
		while($row=mysql_fetch_array($result_avventure)){
			$message.="<li>".htmlspecialchars($row[0]);
		}
		$message.="</ul>";
	}
}else{
	$message="ERRORE: Impossibile eliminare la campagna perchè associata ai personaggi:<ul>";
	while($row=mysql_fetch_array($result_personaggi)){
		$message.="<li>".htmlspecialchars($row[0]);
	}
	$message.="</ul>";
}
require_once("../../include/admin/theme_top.php");
?>
<br><h1>Campagna</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action="index.php" method="post">
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=submit value="Indietro" onclick="document.f.action='delete_form.php'">
<?}?>
<input type=submit value="Torna alla Campagna">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
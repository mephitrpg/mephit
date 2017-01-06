<?
require_once("../../include/config.php");
$sezione="gruppo";
$message="";
$error=true;
$query_campagne="SELECT nome FROM mephit_campagna WHERE fk_gruppo=".$_POST["id_item"]." ORDER BY nome";
$result_campagne=mysql_query($query_campagne);
$query_giocatori="SELECT DISTINCT t2.nome FROM mephit_giocatore_gruppo AS t1,mephit_giocatore AS t2 WHERE t1.fk_gruppo=".$_POST["id_item"]." AND t1.fk_giocatore=t2.id_giocatore ORDER BY t2.nome";
$result_giocatori=mysql_query($query_giocatori);
if(mysql_num_rows($result_campagne)==0){
	if(mysql_num_rows($result_giocatori)==0){
		$query="DELETE FROM mephit_gruppo WHERE id_gruppo=".$_POST["id_item"];
		$result=mysql_query($query);
		if($result){
			$message="Gruppo eliminato correttamente<br><br>";
			$error=false;
		}else{
			$message="ERRORE: Gruppo non eliminato<br><br>";
		}
	}else{
		$message="ERRORE: Impossibile eliminare il gruppo perchè associato ai giocatori:<ul>";
		while($row=mysql_fetch_array($result_giocatori)){
			$message.="<li>".htmlspecialchars($row[0]);
		}
		$message.="</ul>";
	}
}else{
	$message="ERRORE: Impossibile eliminare il gruppo perchè associato alle campagne:<ul>";
	while($row=mysql_fetch_array($result_campagne)){
		$message.="<li>".htmlspecialchars($row[0]);
	}
	$message.="</ul>";
}
require_once("../../include/admin/theme_top.php");
?>
<br><h1>Gruppo</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action="index.php" method="post">
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=submit value="Indietro" onclick="document.f.action='delete_form.php'">
<?}?>
<input type=submit value="Torna al Gruppo">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
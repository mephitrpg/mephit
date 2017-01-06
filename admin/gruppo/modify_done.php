<?
require_once("../../include/config.php");
$sezione="gruppo";
$message="";
$error=true;
if(trim($_POST["nome"])!=""){
	$query="UPDATE mephit_gruppo SET nome='".trim($_POST["nome"])."' WHERE id_gruppo=".$_POST["id_item"];
	$result=mysql_query($query);
	if($result){
		$message="Gruppo modificato correttamente<br><br>";
		$error=false;
	}else{
		$message="ERRORE: Gruppo non modificato<br><br>";
	}
}else{
	$message="ERRORE: Nome vuoto<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Gruppo</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action=index.php method=post>
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=hidden name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>">
<input type=submit value="Indietro" onclick="document.f.action='modify_form.php'">
<?}?>
<input type=submit value="Torna al Gruppo">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
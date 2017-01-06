<?
require_once("../../include/config.php");
$sezione="campagna";
$message="";
$error=true;
if(trim($_POST["nome"])!="" && $_POST["fk_gruppo"]!=""){
	$query="UPDATE mephit_campagna SET nome='".trim($_POST["nome"])."',fk_gruppo='".$_POST["fk_gruppo"]."' WHERE id_campagna=".$_POST["id_item"];
	$result=mysql_query($query);
	if($result){
		$message="Campagna modificata correttamente<br><br>";
		$error=false;
	}else{
		$message="ERRORE: Campagna non modificata<br><br>";
	}
}else{
	$message="ERRORE: Devi compilare tutti i campi obbligatori<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Campagna</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action=index.php method=post>
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=hidden name=nome value="<?=stripslashes(str_replace("\"","&quot;",$_POST["nome"]))?>">
<input type=submit value="Indietro" onclick="document.f.action='modify_form.php'">
<?}?>
<input type=submit value="Torna alla Campagna">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
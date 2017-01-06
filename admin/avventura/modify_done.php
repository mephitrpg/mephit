<?
require_once("../../include/config.php");
$sezione="avventura";
$message="";
$error=true;
if(trim($_POST["nome"])!="" && $_POST["fk_campagna"]!="" && $_POST["fk_master"]!=""){
	$query="UPDATE mephit_avventura SET nome='".trim($_POST["nome"])."',fk_campagna='".$_POST["fk_campagna"]."', fk_master='".$_POST["fk_master"]."' WHERE id_avventura=".$_POST["id_item"];
	$result=mysql_query($query);
	if($result){
		$message="Avventura modificata correttamente<br><br>";
		$error=false;
	}else{
		$message="ERRORE: Avventura non modificata<br><br>";
	}
}else{
	$message="ERRORE: Devi compilare tutti i campi obbligatori<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Avventura</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action=index.php method=post>
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=hidden name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>">
<input type=hidden name=fk_campagna value="<?=$_POST["fk_campagna"]?>">
<input type=hidden name=fk_master value="<?=$_POST["fk_master"]?>">
<input type=submit value="Indietro" onclick="document.f.action='modify_form.php'">
<?}?>
<input type=submit value="Torna all'Avventura">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
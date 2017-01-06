<?
require_once("../../include/config.php");
$sezione="avventura";
$message="";
$error=true;
if(trim($_POST["nome"])!="" && $_POST["fk_campagna"]!="" && $_POST["fk_master"]!=""){
	$query="INSERT INTO mephit_avventura (fk_campagna,nome,fk_master) VALUES ('".$_POST["fk_campagna"]."','".trim($_POST["nome"])."','".trim($_POST["fk_master"])."')";
	$result=mysql_query($query);
	if($result){
		$message="Avventura creata correttamente<br><br>";
		$error=false;
	}else{
		$message="ERRORE: Avventura non creata<br><br>";
	}
}else{
	$message="ERRORE: Devi compilare tutti i campi<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Avventura</h1>
<form name=f action=index.php method=post>
<?
echo $message;
if($error){?>
<input type=hidden name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>">
<input type=hidden name=fk_campagna value="<?=$_POST["fk_campagna"]?>">
<input type=hidden name=fk_master value="<?=$_POST["fk_master"]?>">
<input type=submit value="Indietro" onclick="document.f.action='new_form.php'">
<?}?>
<input type=submit value="Torna all'Avventura">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
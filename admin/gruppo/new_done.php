<?
require_once("../../include/config.php");
$sezione="gruppo";
$message="";
$error=true;
if(trim($_POST["nome"])!=""){
	$query="INSERT INTO mephit_gruppo (nome) VALUES ('".trim($_POST["nome"])."')";
	$result=mysql_query($query);
	if($result){
		$message="Gruppo creato correttamente<br><br>";
		$error=false;
	}else{
		$message="ERRORE: Gruppo non creato<br><br>";
	}
}else{
	$message="ERRORE: Nome vuoto<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Gruppo</h1>
<form name=f action=index.php method=post>
<?
echo $message;
if($error){?>
<input type=submit value="Indietro" onclick="document.f.action='new_form.php'">
<input type=hidden name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>">
<?}?>
<input type=submit value="Torna al Gruppo">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
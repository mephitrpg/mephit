<?
require_once("../../include/config.php");
$sezione="campagna";
$message="";
$error=true;
if(trim($_POST["nome"])!="" && $_POST["fk_gruppo"]!=""){
	$query="INSERT INTO mephit_campagna (fk_gruppo,nome) VALUES ('".$_POST["fk_gruppo"]."','".trim($_POST["nome"])."')";
	$result=mysql_query($query);
	if($result){
		$message="Campagna creata correttamente<br><br>";
		$error=false;
	}else{
		$message="ERRORE: Campagna non creata<br><br>";
	}
}else{
	$message="ERRORE: Devi compilare tutti i campi<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Campagna</h1>
<form name=f action=index.php method=post>
<?
echo $message;
if($error){?>
<input type=hidden name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>">
<input type=hidden name=fk_gruppo value="<?=$_POST["fk_gruppo"]?>">
<input type=submit value="Indietro" onclick="document.f.action='new_form.php'">
<?}?>
<input type=submit value="Torna alla Campagna">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
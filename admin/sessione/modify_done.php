<?
require_once("../../include/config.php");
$sezione="sessione";
$message="";
$error=true;
if(trim($_POST["nome"])!="" && $_POST["fk_avventura"]!=""){
	$data=$_POST[a].$_POST[m].$_POST[g].$_POST[H].$_POST[i]."00";
	$query="UPDATE mephit_sessione SET nome='".trim($_POST["nome"])."',data='".$data."',fk_avventura='".$_POST["fk_avventura"]."',diario='".$_POST["diario"]."',diario_public='".$_POST["diario_public"]."' WHERE id_sessione=".$_POST["id_item"];
	$result=mysql_query($query);
	if($result){
		$message="Sessione modificata correttamente<br><br>";
		$error=false;
	}else{
		$message="ERRORE: Sessione non modificata<br><br>";
	}
}else{
	$message="ERRORE: Devi compilare tutti i campi obbligatori<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Sessione</h1>
<form name=f action=index.php method=post>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=hidden name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>">
<input type=hidden name=fk_avventura value="<?=$_POST["fk_avventura"]?>">
<textarea name=diario style="display:none;"><?=htmlspecialchars(stripslashes($_POST["diario"]))?></textarea>
<input type=hidden name=diario_public value="<?=$_POST["diario_public"]?>">
<input type=hidden name=g value="<?=$_POST["g"]?>">
<input type=hidden name=m value="<?=$_POST["m"]?>">
<input type=hidden name=a value="<?=$_POST["a"]?>">
<input type=hidden name=H value="<?=$_POST["H"]?>">
<input type=hidden name=i value="<?=$_POST["i"]?>">
<input type=submit value="Indietro" onclick="document.f.action='modify_form.php'">
<?}?>
<input type=submit value="Torna alla Sessione">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>

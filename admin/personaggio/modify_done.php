<?
require_once("../../include/config.php");
$sezione="personaggio";
$message="";
$error=true;
if(trim($_POST["nome"])!="" && $_POST["fk_campagna"]!="" && $_POST["autore"]!=""){
	$query="SELECT fk_gruppo FROM mephit_campagna WHERE id_campagna='".$_POST["fk_campagna"]."'";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		$id_gruppo=$row[0];
	}
	$query="SELECT * FROM mephit_giocatore_gruppo WHERE autore='".$_POST["autore"]."' AND fk_gruppo='".$id_gruppo."'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		$query="UPDATE mephit_personaggio SET nome='".trim($_POST["nome"])."',fk_campagna='".$_POST["fk_campagna"]."',autore='".$_POST["autore"]."' WHERE id_personaggio=".$_POST["id_item"];
		$result=mysql_query($query);
		if($result){
			$message="Personaggio modificato correttamente<br><br>";
			$error=false;
		}else{
			$message="ERRORE: Personaggio non modificato<br><br>";
		}
	}else{
		$message="ERRORE: Il giocatore non partecipa alla campagna indicata<br><br>";
	}
}else{
	$message="ERRORE: Devi compilare tutti i campi obbligatori<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Personaggio</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action=index.php method=post>
<tr><td>
<?
echo $message;
if($error){?>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<input type=hidden name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>">
<input type=hidden name=fk_campagna value="<?=$_POST["fk_campagna"]?>">
<input type=hidden name=autore value="<?=$_POST["autore"]?>">
<input type=submit value="Indietro" onclick="document.f.action='modify_form.php'">
<?}?>
<input type=submit value="Torna al Personaggio">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
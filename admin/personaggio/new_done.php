<?
require_once("../../include/config.php");
$sezione="personaggio";
$message="";
$error=true;
if(trim($_POST["nome"])!="" /*&& $_POST["fk_campagna"]!="" */&& $_POST["autore"]!=""){
	/*
	$query="SELECT fk_gruppo FROM mephit_campagna WHERE id_campagna='".$_POST["fk_campagna"]."'";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		$id_gruppo=$row[0];
	}
	$query="SELECT * FROM mephit_giocatore_gruppo WHERE autore='".$_POST["autore"]."' AND fk_gruppo='".$id_gruppo."'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		$query="INSERT INTO mephit_personaggio (fk_campagna,autore,nome) VALUES ('".$_POST["fk_campagna"]."','".$_POST["autore"]."','".trim($_POST["nome"])."')";
		$result=mysql_query($query);
		if($result){
			$message="Personaggio creato correttamente<br><br>";
			$error=false;
		}else{
			$message="ERRORE: Personaggio non creato<br><br>";
		}
	}else{
		$message="ERRORE: Il giocatore non partecipa alla campagna indicata<br><br>";
	}
	*/
}else{
	$message="ERRORE: Devi compilare tutti i campi<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Personaggio</h1>
<form name=f action=index.php method=post>
<?
echo $message;
if($error){?>
<input type=hidden name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>">
<?/*<input type=hidden name=fk_campagna value="< ?=$_POST["fk_campagna"]? >">*/?>
<input type=hidden name=autore value="<?=$_POST["autore"]?>">
<input type=submit value="Indietro" onclick="document.f.action='new_form.php'">
<?}?>
<input type=submit value="Torna al Personaggio">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
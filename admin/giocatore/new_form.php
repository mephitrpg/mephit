<?
require_once("../../include/config.php");
$sezione="giocatore";
$fk_gruppo_options="";
/*
# leggo id e nomi di tutti i gruppi
$query="SELECT id_gruppo,nome FROM mephit_gruppo ORDER BY nome";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	# preparo i checkbox dei gruppi da inserire nella form
	$fk_gruppo_options="<table border=0 cellpadding=0 cellspacing=0>";
	if(!isset($_POST["gruppo"]))$_POST["gruppo"]=array();
	while(list($id,$nome)=mysql_fetch_array($result)){
		$fk_gruppo_options.="<tr valign=top><td><input type=checkbox name=gruppo[] value=".$id.((array_search($id,$_POST["gruppo"])!==false)?" checked":"")."></td><td>".htmlspecialchars($nome)."</td></tr>";
	}
	$fk_gruppo_options.="</table>";
}
*/
require_once("../../include/admin/theme_top.php");
?>
<br><h1>Giocatore</h1>

<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=new_done.php method=post>
<tr>
<td><b>Nick:</b></td>
<td><input name=nick value="<?=htmlspecialchars(stripslashes($_POST["nick"]))?>"></td>
</tr><tr>
<td><b>Nome:</b></td>
<td><input name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>"></td>
</tr><tr>
<td><b>Cognome:</b></td>
<td><input name=cognome value="<?=htmlspecialchars(stripslashes($_POST["cognome"]))?>"></td>
</tr>
<tr valign=top>
<td><b>Ha fatto il Master<br>almeno una volta:</b></td>
<td>
<input type=radio name=wasmaster value="1" class="radio"<?=($_POST["wasmaster"])?" checked":""?>> Sì&nbsp;&nbsp;
<input type=radio name=wasmaster value="0" class="radio"<?=(!$_POST["wasmaster"])?" checked":""?>> No
</td>
</tr>
<?/*
<tr valign=top>
<td><b>Gruppi associati:</b></td>
<td>< ?=$fk_gruppo_options? ></td>
</tr>
<tr>
*/?>
<td colspan=2>
<input type=submit value="Indietro" onclick="document.f.action='index.php'">
<input type=submit value="Avanti">
</td>
</tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
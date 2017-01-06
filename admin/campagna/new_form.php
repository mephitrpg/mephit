<?
require_once("../../include/config.php");
$sezione="campagna";
$fk_gruppo_options="";
$query="SELECT id_gruppo,nome FROM mephit_gruppo ORDER BY nome";
$result=mysql_query($query);
while(list($id,$nome)=mysql_fetch_array($result)){
	$fk_gruppo_options.="<option value=$id".(($id==$_POST["fk_gruppo"])?" selected":"").">".htmlspecialchars($nome)."\n";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Campagna</h1>

<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=new_done.php method=post>
<tr>
<td><b>Nome campagna:</b></td>
<td><input name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>"></td>
</tr>
<tr>
<td><b>Gruppo associato:</b></td>
<td><select name=fk_gruppo><option><?=$fk_gruppo_options?></select></td>
</tr>
<tr>
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
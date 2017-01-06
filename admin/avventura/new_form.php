<?
require_once("../../include/config.php");
$sezione="avventura";
$fk_campagna_options="";
$fk_master_options="";
$query="SELECT id_campagna,nome FROM mephit_campagna ORDER BY nome";
$result=mysql_query($query);
while(list($id,$nome)=mysql_fetch_array($result)){
	$fk_campagna_options.="<option value=$id".(($id==$_POST["fk_campagna"])?" selected":"").">".htmlspecialchars($nome)."\n";
}
$query="SELECT id_giocatore,nick FROM mephit_giocatore ORDER BY nick";
$result=mysql_query($query);
while(list($id,$nick)=mysql_fetch_array($result)){
	$fk_master_options.="<option value=$id".(($id==$_POST["fk_master"])?" selected":"").">".htmlspecialchars($nick)."\n";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Avventura</h1>

<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=new_done.php method=post>
<tr>
<td><b>Nome avventura:</b></td>
<td><input name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>"></td>
<tr>
<td><b>Campagna associata:</b></td>
<td><select name=fk_campagna><option><?=$fk_campagna_options?></select></td>
</tr>
<tr>
<td><b>Dungeos Master's:</b></td>
<td><select name=fk_master><option><?=$fk_master_options?></select></td>
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
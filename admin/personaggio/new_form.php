<?
require_once("../../include/config.php");
$sezione="personaggio";
$autore_options="";
$query="SELECT id_giocatore,nick FROM mephit_giocatore ORDER BY nome";
$result=mysql_query($query);
while(list($id,$nick)=mysql_fetch_array($result)){
	$autore_options.="<option value=$id".(($id==$_POST["autore"])?" selected":"").">".htmlspecialchars($nick)."\n";
}
/*
$fk_campagna_options="";
$query="SELECT id_campagna,nome FROM mephit_campagna ORDER BY nome";
$result=mysql_query($query);
while(list($id,$nome)=mysql_fetch_array($result)){
	$fk_campagna_options.="<option value=$id".(($id==$_POST["fk_campagna"])?" selected":"").">".htmlspecialchars($nome)."\n";
}
*/
require_once("../../include/admin/theme_top.php");
?>
<br><h1>Personaggio</h1>
<script src="namelist.js"></script>

<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=new_done.php method=post>
<tr>
<td><b>Nome personaggio:</b></td>
<td><input name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>"></td>
<td><input type=button value="Genera" onclick="MakeAName('nome')"></td>
</tr>
<tr>
<td><b>Autore:</b></td>
<td><select name=autore><option><?=$autore_options?></select></td>
<td></td>
</tr>
<?/*
<tr>
<td><b>Campagna associata:</b></td>
<td><select name=fk_campagna><option>< ?=$fk_campagna_options? ></select></td>
<td></td>
</tr>
*/?>
<tr>
<td colspan=3>
<input type=submit value="Indietro" onclick="document.f.action='index.php'">
<input type=submit value="Avanti">
</td>
</tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>
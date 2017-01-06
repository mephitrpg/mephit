<?
require_once("../../include/config.php");
$sezione="gruppo";

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Gruppo</h1>

<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=new_done.php method=post>
<tr>
<td><b>Nome gruppo:</b></td>
<td><input name=nome value="<?=htmlspecialchars(stripslashes($_POST["nome"]))?>"></td>
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
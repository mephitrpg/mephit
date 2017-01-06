<?
require_once("../../include/config.php");
$sezione="avventura";

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Avventura</h1>
<table border=0 cellpadding=0 cellspacing=0>
<form name=f action=delete_done.php method=post>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<tr><td>
Eliminare l'avventura?<br><br>
<input type=submit value="Sì">
<input type=submit value="No" onclick="document.f.action='index.php';">
</td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>

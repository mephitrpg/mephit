<?
require_once("../../include/config.php");
$sezione="gruppo";
if(!isset($_POST["nome"])){
	$query="SELECT nome FROM mephit_gruppo WHERE id_gruppo=".$_POST["id_item"];
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		while($row=mysql_fetch_array($result)){
			$_POST["nome"]=str_replace("\"","&quot;",$row[0]);
		}
	}else{
		
	}
}else{
	$_POST["nome"]=stripslashes(str_replace("\"","&quot;",$_POST["nome"]));
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Gruppo</h1>
<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=modify_done.php method=post>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<tr>
<td><b>Nome gruppo:</b></td>
<td><input name=nome value="<?=htmlspecialchars($_POST["nome"])?>"></td>
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

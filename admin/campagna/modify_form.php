<?
require_once("../../include/config.php");
$sezione="campagna";
$fk_gruppo_options="";
if(!isset($_POST["nome"])){
	$query="SELECT nome,fk_gruppo FROM mephit_campagna WHERE id_campagna=".$_POST["id_item"];
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		while($row=mysql_fetch_array($result)){
			$_POST["nome"]=htmlspecialchars($row[0]);
			$query_fk_gruppo_options="SELECT id_gruppo,nome FROM mephit_gruppo ORDER BY nome";
			$result_fk_gruppo_options=mysql_query($query_fk_gruppo_options);
			while(list($id,$nome)=mysql_fetch_array($result_fk_gruppo_options)){
				$fk_gruppo_options.="<option value=$id".(($id==$row[1])?" selected":"").">".htmlspecialchars($nome)."\n";
			}
		}
	}
}else{
	$_POST["nome"]=htmlspecialchars(stripslashes($_POST["nome"]));
	$query_fk_gruppo_options="SELECT id_gruppo,nome FROM mephit_gruppo ORDER BY nome";
	$result_fk_gruppo_options=mysql_query($query_fk_gruppo_options);
	while(list($id,$nome)=mysql_fetch_array($result_fk_gruppo_options)){
		$fk_gruppo_options.="<option value=$id".(($id==$_POST["fk_gruppo"])?" selected":"").">".htmlspecialchars($nome)."\n";
	}
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Campagna</h1>
<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=modify_done.php method=post>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<tr>
<td><b>Nome campagna:</b></td>
<td><input name=nome value="<?=$_POST["nome"]?>"></td>
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

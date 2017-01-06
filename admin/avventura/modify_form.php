<?
require_once("../../include/config.php");
$sezione="avventura";
$fk_campagna_options="";
$fk_master_options="";
if(!isset($_POST["nome"])){
	$query="SELECT nome,fk_campagna,fk_master FROM mephit_avventura WHERE id_avventura=".$_POST["id_item"];
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		while($row=mysql_fetch_array($result)){
			$_POST["nome"]=htmlspecialchars($row[0]);
			$query_fk_campagna_options="SELECT id_campagna,nome FROM mephit_campagna ORDER BY nome";
			$result_fk_campagna_options=mysql_query($query_fk_campagna_options);
			while(list($id,$nome)=mysql_fetch_array($result_fk_campagna_options)){
				$fk_campagna_options.="<option value=$id".(($id==$row[fk_campagna])?" selected":"").">".htmlspecialchars($nome)."\n";
			}
			$query_fk_master_options="SELECT id_giocatore,nick FROM mephit_giocatore ORDER BY nick";
			$result_fk_master_options=mysql_query($query_fk_master_options);
			while(list($id,$nick)=mysql_fetch_array($result_fk_master_options)){
				$fk_master_options.="<option value=$id".(($id==$row[fk_master])?" selected":"").">".htmlspecialchars($nick)."\n";
			}
		}
	}
}else{
	$_POST["nome"]=htmlspecialchars(stripslashes($_POST["nome"]));
	$query_fk_campagna_options="SELECT id_campagna,nome FROM mephit_campagna ORDER BY nome";
	$result_fk_campagna_options=mysql_query($query_fk_campagna_options);
	while(list($id,$nome)=mysql_fetch_array($result_fk_campagna_options)){
		$fk_campagna_options.="<option value=$id".(($id==$_POST["fk_campagna"])?" selected":"").">".htmlspecialchars($nome)."\n";
	}
	$query_fk_master_options="SELECT id_giocatore,nick FROM mephit_giocatore ORDER BY nick";
	$result_fk_master_options=mysql_query($query_fk_master_options);
	while(list($id,$nick)=mysql_fetch_array($result_fk_master_options)){
		$fk_master_options.="<option value=$id".(($id==$_POST["fk_master"])?" selected":"").">".htmlspecialchars($nick)."\n";
			}
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Avventura</h1>
<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=modify_done.php method=post>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<tr>
<td><b>Nome avventura:</b></td>
<td><input name=nome value="<?=$_POST["nome"]?>"></td>
</tr>
<tr>
<td><b>Dungeons Master's:</b></td>
<td><select name=fk_master><option><?=$fk_master_options?></select></td>
</tr>

<tr>
<td><b>Campagna associata:</b></td>
<td><select name=fk_campagna><option><?=$fk_campagna_options?></select></td>
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

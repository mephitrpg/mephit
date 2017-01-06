<?
require_once("../../include/config.php");
$sezione="personaggio";
$fk_gruppo_options="";
if(!isset($_POST["nome"])){
	$query="SELECT nome,fk_campagna,autore FROM mephit_personaggio WHERE id_personaggio=".$_POST["id_item"];
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		while($row=mysql_fetch_array($result)){
			$_POST["nome"]=htmlspecialchars($row[0]);
			$query_fk_campagna_options="SELECT id_campagna,nome FROM mephit_campagna ORDER BY nome";
			$result_fk_campagna_options=mysql_query($query_fk_campagna_options);
			while(list($id,$nome)=mysql_fetch_array($result_fk_campagna_options)){
				$fk_campagna_options.="<option value=$id".(($id==$row["fk_campagna"])?" selected":"").">".htmlspecialchars($nome)."\n";
			}
			$query_autore_options="SELECT id_giocatore,nick FROM mephit_giocatore ORDER BY nick";
			$result_autore_options=mysql_query($query_autore_options);
			while(list($id,$nick)=mysql_fetch_array($result_autore_options)){
				$autore_options.="<option value=$id".(($id==$row["autore"])?" selected":"").">".htmlspecialchars($nick)."\n";
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
	$query_autore_options="SELECT id_giocatore,nick FROM mephit_giocatore ORDER BY nick";
	$result_autore_options=mysql_query($query_autore_options);
	while(list($id,$nick)=mysql_fetch_array($result_autore_options)){
		$autore_options.="<option value=$id".(($id==$_POST["autore"])?" selected":"").">".htmlspecialchars($nick)."\n";
	}
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Personaggio</h1>
<script src="namelist.js"></script>
<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=modify_done.php method=post>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<tr>
<td><b>Nome personaggio:</b></td>
<td><input name=nome value="<?=$_POST["nome"]?>"></td>
<td><input type=button value="Genera" onclick="MakeAName('nome')"></td>
</tr>
<tr>
<td><b>Giocatore associato:</b></td>
<td><select name=autore><option><?=$autore_options?></select></td>
<td></td>
</tr>
<tr>
<td><b>Campagna associata:</b></td>
<td><select name=fk_campagna><option><?=$fk_campagna_options?></select></td>
<td></td>
</tr>
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

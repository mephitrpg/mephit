<?
require_once("../../include/config.php");
$sezione="giocatore";
$values=array();
$fk_gruppo_options="";
if(!isset($_POST["nome"])){
	# leggo i dati del giocatore
	$query="SELECT nick,nome,cognome,was_master FROM mephit_giocatore WHERE id_giocatore=".$_POST["id_item"];
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		while($row=mysql_fetch_array($result)){
			$_POST["nick"]=htmlspecialchars($row[0]);
			$_POST["nome"]=htmlspecialchars($row[1]);
			$_POST["cognome"]=htmlspecialchars($row[2]);
			$_POST["wasmaster"]=$row[3];
/*
			# leggo a quali gruppi è associato il giocatore
			$query2="SELECT fk_gruppo FROM mephit_giocatore_gruppo WHERE fk_giocatore=".$_POST["id_item"];
			$result2=mysql_query($query2);
			if(mysql_num_rows($result2)>0){
				$_POST["gruppo"]=array();
				while($row2=mysql_fetch_array($result2)){
					$_POST["gruppo"][]=$row2[0];
				}
			}
			# leggo id e nomi di tutti i gruppi
			$query_fk_gruppo_options="SELECT id_gruppo,nome FROM mephit_gruppo ORDER BY nome";
			$result_fk_gruppo_options=mysql_query($query_fk_gruppo_options);
			# preparo i checkbox dei gruppi da inserire nella form
			if(mysql_num_rows($result_fk_gruppo_options)>0){
				$fk_gruppo_options="<table border=0 cellpadding=0 cellspacing=0>";
				if(!isset($_POST["gruppo"]))$_POST["gruppo"]=array();
				while(list($id,$nome)=mysql_fetch_array($result_fk_gruppo_options)){
					$fk_gruppo_options.="<tr valign=top><td><input type=checkbox name=gruppo[] value=".$id.((array_search($id,$_POST["gruppo"])!==false)?" checked":"")."></td><td>".htmlspecialchars($nome)."</td></tr>";
				}
				$fk_gruppo_options.="</table>";
			}
*/
		}
	}
}else{
	$_POST["nick"]=htmlspecialchars(stripslashes($_POST["nick"]));
	$_POST["nome"]=htmlspecialchars(stripslashes($_POST["nome"]));
	$_POST["cognome"]=htmlspecialchars(stripslashes($_POST["cognome"]));
/*
	# leggo id e nomi di tutti i gruppi
	$query_fk_gruppo_options="SELECT id_gruppo,nome FROM mephit_gruppo ORDER BY nome";
	$result_fk_gruppo_options=mysql_query($query_fk_gruppo_options);
	# preparo i checkbox dei gruppi da inserire nella form
	if(mysql_num_rows($result_fk_gruppo_options)>0){
		$fk_gruppo_options="<table border=0 cellpadding=0 cellspacing=0>";
		if(!isset($_POST["gruppo"]))$_POST["gruppo"]=array();
		while(list($id,$nome)=mysql_fetch_array($result_fk_gruppo_options)){
			$fk_gruppo_options.="<tr valign=top><td><input type=checkbox name=gruppo[] value=".$id.((array_search($id,$_POST["gruppo"])!==false)?" checked":"")."></td><td>".htmlspecialchars($nome)."</td></tr>";
		}
		$fk_gruppo_options.="</table>";
	}
*/
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Giocatore</h1>
<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=modify_done.php method=post>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<tr>
<td><b>Nick:</b></td>
<td><input name=nick value="<?=$_POST["nick"]?>"></td>
</tr><tr>
<td><b>Nome:</b></td>
<td><input name=nome value="<?=$_POST["nome"]?>"></td>
</tr><tr>
<td><b>Cognome:</b></td>
<td><input name=cognome value="<?=$_POST["cognome"]?>"></td>
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
*/?>
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

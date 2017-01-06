<?
require_once("../../include/config.php");
$sezione="gruppo";
$query="SELECT nome FROM mephit_gruppo WHERE id_gruppo=".$_POST["id_item"];
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$nomeGruppo=htmlspecialchars($row[0]);
}
# leggo a quali gruppi è associato il giocatore
$query2="SELECT fk_giocatore FROM mephit_giocatore_gruppo WHERE fk_gruppo=".$_POST["id_item"];
$result2=mysql_query($query2);
if(mysql_num_rows($result2)>0){
	$_POST["giocatore"]=array();
	while($row2=mysql_fetch_array($result2)){
		$_POST["giocatore"][]=$row2[0];
	}
}
# leggo id e nomi di tutti i gruppi
$query_fk_giocatore_options="SELECT id_giocatore,nick FROM mephit_giocatore ORDER BY nick";
$result_fk_giocatore_options=mysql_query($query_fk_giocatore_options);
# preparo i checkbox dei gruppi da inserire nella form
if(mysql_num_rows($result_fk_giocatore_options)>0){
	$fk_giocatore_options="<table border=0 cellpadding=0 cellspacing=0>";
	if(!isset($_POST["giocatore"]))$_POST["giocatore"]=array();
	while(list($id,$nick)=mysql_fetch_array($result_fk_giocatore_options)){
		$fk_giocatore_options.="<tr valign=top><td><input type=checkbox name=giocatore[] value=".$id.((array_search($id,$_POST["giocatore"])!==false)?" checked":"")."></td><td>".htmlspecialchars($nick)."</td></tr>";
	}
	$fk_giocatore_options.="</table>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Gruppo</h1>
<h2 style="color:#000;background-color:#ddd;padding:4px;"><li><?=$nomeGruppo?></h2>
<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=members_done.php method=post>
<input type=hidden name=id_item value="<?=$_POST["id_item"]?>">
<tr valign=top>
<td><b>Giocatori associati:</b></td>
<td><?=$fk_giocatore_options?></td>
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

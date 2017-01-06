<?
require_once("../../include/config.php");
$sezione="giocatore";
$body="";
# leggo i giocatori
$query="SELECT id_giocatore,nick,nome,cognome FROM mephit_giocatore ORDER BY nick";
$result=mysql_query($query);
# se trovo giocatori preparo l'intestazione della tabella
if(mysql_num_rows($result)>0){
	$body="<table border=0 cellpadding=4 cellspacing=0 id=\"tabella\">";
	$body.="<tr>";
	$body.="<th>Azioni</th>";
	$body.="<th>Nick</th>";
	$body.="<th>Nome</th>";
	$body.="<th>Cognome</th>";
	$body.="</tr>";
	# inserisco i giocatori nella tabella
	while(list($id,$nick,$nome,$cognome)=mysql_fetch_array($result)){
		$body.="<tr><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">Modifica</a> - ";
		$body.="<a href=\"javascript:azione('elimina',".$id.")\">Elimina</a>";
		$body.="</td><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">".htmlspecialchars($nick)."</a><br>";
		$body.="</td>";
		$body.="<td>".htmlspecialchars($nome)."</td>";
		$body.="<td>".htmlspecialchars($cognome)."</td>";
		$body.="</tr>";
	}
	$body.="</table><br>";
}else{
	$body.="<b>Nessun giocatore trovato</b><br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Giocatore</h1>
<script>
function azione(q,i){
	switch(q){
		case"modifica":		document.f.action="modify_form.php";		break;
		case"elimina":		document.f.action="delete_form.php";		break;
		case"pg":			document.f.action="pg_form.php";			break;
	}
	document.f.id_item.value=i;
	document.f.submit();
}
</script>
<form name=f action=new_form.php method=post>
<input type=hidden name=id_item>
<?=$body?>
<input type=submit value="Crea Nuovo Giocatore">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
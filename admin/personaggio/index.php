<?
require_once("../../include/config.php");
$sezione="personaggio";
$body="";
$query="SELECT t1.id_personaggio,t1.nome,t3.nick FROM mephit_personaggio AS t1,mephit_giocatore AS t3 WHERE t1.autore=t3.id_giocatore ORDER BY t1.nome";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	$body="<table border=0 cellpadding=4 cellspacing=0 id=\"tabella\">";
	$body.="<tr>";
	$body.="<th>Azioni</th>";
	$body.="<th>Nome Personaggio</th>";
	$body.="<th>Autore</th>";
	$body.="</tr>";
	while(list($id,$personaggio,$giocatore)=mysql_fetch_array($result)){
		$body.="<tr><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">Modifica</a> - ";
		$body.="<a href=\"javascript:azione('elimina',".$id.")\">Elimina</a>";
		$body.="</td><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">".htmlspecialchars($personaggio)."</a><br>";
		$body.="</td><td>";
		$body.=htmlspecialchars($giocatore)."<br>";
		$body.="</td></tr>";
	}
	$body.="</table><br>";
}else{
	$body.="<b>Nessun Personaggio trovato</b><br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Personaggio</h1>
<script>
function azione(q,i){
	switch(q){
		case"modifica":		document.f.action="modify_form.php";		break;
		case"elimina":		document.f.action="delete_form.php";		break;
	}
	document.f.id_item.value=i;
	document.f.submit();
}
</script>
<form name=f action=new_form.php method=post>
<input type=hidden name=id_item>
<?=$body?>
<input type=submit value="Crea Nuovo Personaggio">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
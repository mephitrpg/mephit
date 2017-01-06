<?
require_once("../../include/config.php");
$sezione="avventura";
$body="";
$query="SELECT t1.id_avventura,t1.nome,t2.nome,t3.nick FROM mephit_avventura AS t1, mephit_campagna AS t2, mephit_giocatore AS t3 WHERE t1.fk_campagna=t2.id_campagna AND t1.fk_master=t3.id_giocatore ORDER BY t1.nome";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	$body="<table border=0 cellpadding=4 cellspacing=0 id=\"tabella\">";
	$body.="<tr>";
	$body.="<th>Azioni</th>";
	$body.="<th>Nome Avventura</th>";
	$body.="<th>Dungeons Master's</th>";
	$body.="<th>Campagna associata</th>";
	$body.="</tr>";
	while(list($id,$avventura,$campagna,$master)=mysql_fetch_array($result)){
		$body.="<tr><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">Modifica</a> - ";
		$body.="<a href=\"javascript:azione('elimina',".$id.")\">Elimina</a>";
		$body.="</td><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">".htmlspecialchars($avventura)."</a><br>";
		$body.="</td><td>";
		$body.=htmlspecialchars($master)."<br>";
		$body.="</td><td>";
		$body.=htmlspecialchars($campagna)."<br>";		
		$body.="</td></tr>";
	}
	$body.="</table><br>";
}else{
	$body.="<b>Nessuna Avventura trovata</b><br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Avventura</h1>
<script>i 
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
<input type=submit value="Crea Nuova Avventura">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
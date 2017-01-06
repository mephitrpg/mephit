<?
require_once("../../include/config.php");
$sezione="campagna";
$body="";
$query="SELECT t1.id_campagna,t1.nome,t2.nome FROM mephit_campagna AS t1, mephit_gruppo AS t2 WHERE t1.fk_gruppo=t2.id_gruppo ORDER BY t1.nome";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	$body="<table border=0 cellpadding=4 cellspacing=0 id=\"tabella\">";
	$body.="<tr>";
	$body.="<th>Azioni</th>";
	$body.="<th>Nome Campagna</th>";
	$body.="<th>Gruppo associato</th>";
	$body.="</tr>";
	while(list($id,$campagna,$gruppo)=mysql_fetch_array($result)){
		$body.="<tr><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">Modifica</a> - ";
		$body.="<a href=\"javascript:azione('elimina',".$id.")\">Elimina</a>";
		$body.="</td><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">".htmlspecialchars($campagna)."</a><br>";
		$body.="</td><td>";
		$body.=htmlspecialchars($gruppo)."<br>";
		$body.="</td></tr>";
	}
	$body.="</table><br>";
}else{
	$body.="<b>Nessuna Campagna trovata</b><br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Campagna</h1>
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
<input type=submit value="Crea Nuova Campagna">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
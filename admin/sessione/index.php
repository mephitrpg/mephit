<?
require_once("../../include/config.php");
$sezione="sessione";
$body="";
$query="SELECT t1.id_sessione,t1.nome,t2.nome FROM mephit_sessione AS t1, mephit_avventura AS t2 WHERE t1.fk_avventura=t2.id_avventura ORDER BY t1.nome";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	$body="<table border=0 cellpadding=4 cellspacing=0 id=\"tabella\">";
	$body.="<tr>";
	$body.="<th>Azioni</th>";
	$body.="<th>Nome Sessione</th>";
	$body.="<th>Avventura associata</th>";
	$body.="</tr>";
	while(list($id,$sessione,$avventura)=mysql_fetch_array($result)){
		$body.="<tr><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">Modifica</a> - ";
		$body.="<a href=\"javascript:azione('elimina',".$id.")\">Elimina</a>";
		$body.="</td><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">".htmlspecialchars($sessione)."</a><br>";
		$body.="</td><td>";
		$body.=htmlspecialchars($avventura)."<br>";
		$body.="</td></tr>";
	}
	$body.="</table><br>";
}else{
	$body.="<b>Nessuna Sessione trovata</b><br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Sessione</h1>
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
<input type=submit value="Crea Nuova Sessione">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
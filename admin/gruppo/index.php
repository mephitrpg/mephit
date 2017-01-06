<?
require_once("../../include/config.php");
$sezione="gruppo";
$body="";
$query="SELECT id_gruppo,nome FROM mephit_gruppo ORDER BY nome";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	$body="<table border=0 cellpadding=4 cellspacing=0 id=\"tabella\">";
	$body.="<tr>";
	$body.="<th>Azioni</th>";
	$body.="<th>Nome Gruppo</th>";
	$body.="</tr>";
	while(list($id,$nome)=mysql_fetch_array($result)){
		$body.="<tr><td>";
		$body.="<a href=\"javascript:azione('membri',".$id.")\">Membri</a> - ";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">Modifica</a> - ";
		$body.="<a href=\"javascript:azione('elimina',".$id.")\">Elimina</a>";
		$body.="</td><td>";
		$body.="<a href=\"javascript:azione('modifica',".$id.")\">".htmlspecialchars($nome)."</a><br>";
		$body.="</td></tr>";
	}
	$body.="</table><br>";
}else{
	$body.="<b>Nessun Gruppo trovato</b><br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Gruppo</h1>
<script>
function azione(q,i){
	switch(q){
		case"modifica":		document.f.action="modify_form.php";		break;
		case"elimina":		document.f.action="delete_form.php";		break;
		case"membri":		document.f.action="members_form.php";		break;
	}
	document.f.id_item.value=i;
	document.f.submit();
}
</script>
<form name=f action=new_form.php method=post>
<input type=hidden name=id_item>
<?=$body?>
<input type=submit value="Crea Nuovo Gruppo">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>
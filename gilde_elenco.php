<?php
$smarty->assign('title',$_LANG["guilds"]);

$query="SELECT * FROM mephit_gilda ORDER BY nome";

$jSQL=new jure_mysql();
$sql=$jSQL->getSelectResults($query,25);
if(!$sql[error]){
	
	$BODY.='<table border="0" cellpadding="0" cellspacing="0"><tr valign="top">';
	$BODY.='<td width="300">';
	if(!$sql["empty"]){
		$BODY.='<ul>';
		foreach($sql[rows] as $row){
			$BODY.="<li><a href=\"gilde.php?id=".$row["id_gilda"]."\">".$row["nome"]."</a></li>";
		}
		$BODY.='</ul>';
	}else{
		$BODY.="Nessuna gilda trovata";
	}
	$BODY.='</td>';
	$BODY.='<td width="20">&nbsp;</td>';
	$BODY.='<td width="300">Per creare una gilda, manda una richiesta a <a href="mailto:www.mephit.it@gmail.com">www.mephit.it@gmail.com</a></td>';
	$BODY.='</tr></table>';
	
}else{
	echo "<div>".implode("<br>",$result["error_messages"])."</div><br />";
}

$BODY.=$jSQL->dressMenuWithButtons($sql[menu]);

/*
if($_SESSION[logged]){
	$BODY.='<h3>'.'Crea nuovo gruppo'.'</h3>';
	$BODY.='<form action="my.php" method="post">';
	$BODY.='<table>';
	$BODY.='<tr valign="top">';
	$BODY.='<td><input name="nuovoGruppo" type="text"></td>';
	$BODY.='<td>';
	$BODY.='<input type="submit" value="Salva" class="btn">';
	$BODY.='</td>';
	$BODY.='</tr>';
	$BODY.='</table>';
	$BODY.='</form>';
}
*/
?>

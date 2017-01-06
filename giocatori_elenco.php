<?php
$smarty->assign('title',$_LANG["players"]);

$amici=getFriends();

$jSQL=new jure_mysql("nick");
$positionElements_giocatore=$jSQL->getPositionElements();

$query="SELECT * FROM mephit_giocatore AS t1 WHERE 1";
/*
$jSQL->addTableHeader("Seleziona");
$jSQL->addTableIndex("Nome","nick");
*/
$giocatori=$jSQL->getSelectResults($query,25);
if(!$giocatori[error]){
	$BODY.='<script>
	function richiediAmicizia(){
		var checks=$$(\'input[type=checkbox]:checked\');
		switch(checks.length){
			case 0:
				alert("Seleziona almeno un utente");
			break;
			case 1:
				$("f").submit();
			break;
			default:
				alert("Seleziona solo un utente");
			break;
		}
	}
	</script>
	<style>
	.friend,.me{display:none;}
	</style>';
	$BODY.='<form id="f" action="amici_request.php" method="post">';

	$BODY.='<table cellspacing="0" class="itemTable" width="100%">';
	$BODY.=$jSQL->dressHeaders();
	$BODY.='</table><br>';

	if(!$giocatori["empty"]){
		$BODY.='<div class="row">';
		foreach($giocatori[rows] as $item){
			$BODY.='<div style="float:left;width:120px;height:120px;">';
			$BODY.='<div style="padding:0 20px 20px 0;overflow:hidden;">';
			$BODY.=getAvatarBox(array("row"=>$item,"type"=>"link"));
			$BODY.='</div></div>'."\n";
			/*
			$BODY.='<tr>';
			$BODY.='<td width="1%" align="center">&nbsp;<input type="checkbox" class="'.((in_array($item[id_giocatore],$amici))?'friend':'').' '.(($item[id_giocatore]==$_SESSION[user_id])?'me':'').'" name="players[]" value="'.$item[id_giocatore].'">&nbsp;</td>';
			
			$BODY.='<td><a href="'.$_SERVER[PHP_SELF].'?id='.$item[id_giocatore].'">'.$item[nick].'</a></td>';
			$BODY.='<td align="center"><a href="#">nome</a></td>';
			$query2="SELECT id_avventura FROM mephit_avventura WHERE fk_master=$id";
			$result2=mysql_query($query2);
			if(mysql_num_rows($result2)>0){
				while($row=mysql_fetch_array($result2)){
					$BODY.=" [ <a href=\"diario.php?sessione=".$row[0]."\">Master</a> ]";
				}
			}
			$BODY.='<td align="center" width="22%"><a href="giocatori.php" title="'.'Invita'.'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_add_16x16.gif" alt="'.'Invita'.'" style="margin-right: 4px;" align="absmiddle"></a></td>';
			$BODY.='</tr>';
			*/
		}
		$BODY.='</div>';
	}else{
//		$BODY.='<tr><td colspan="'.($jSQL->getNumCols()).'" align="center">Nessun giocatore trovato</td></tr>';
		$l=(!isset($_GET[letter])||strlen(trim($_GET[letter]))!=1)?"A":$_GET[letter];
		$BODY.='<div>Nessun giocatore con iniziale "'.$l.'" trovato</div>';
	}
	$BODY.='</form>';
	$BODY.='<br>';
/*
		$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0"><tr>';
		$BODY.='<td>'.'Invita nel gruppo'.'</td><td>';
		$BODY.='&nbsp;<select>';
		$BODY.='<option>'.'Caotici Neutrali';
		$BODY.='</select>&nbsp;';
		$BODY.='</td><td><a href="giocatori.php" title="'.'Invita'.'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_add_16x16.gif" alt="'.'Invita'.'"></a></td>';
		$BODY.='</tr></table>';
*/
	
	$BODY.=$jSQL->dressMenuWithButtons($giocatori[menu]);
}
?>
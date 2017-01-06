<?php
$smarty->assign('title',$_LANG["classes"]);

$PATH='<a href="classi.php">'.$_LANG["classes"].'</a>';
$TAB1='risorse';

$fieldOrderBy="name_".$_MEPHIT[lang];
$jSQL=new jure_mysql($fieldOrderBy);
$positionElements_classe=$jSQL->getPositionElements();

$query ="SELECT id,".$fieldOrderBy." AS nome FROM srd35_class";

$classi=$jSQL->getSelectResults($query/*,2*/);
if(!$classi[error]){
	$BODY.='<table cellspacing="0" class="itemTable" width="100%">';
	$BODY.=$jSQL->dressHeaders();
	$BODY.='</table><br>';
	
	if(!$classi["empty"]){
		$BODY.='<ul>';
		foreach($classi[rows] as $item){
			$BODY.='<li>';
			$BODY.='<a href="classi.php?id='.$item[id].$pagPos_classe.'">'.$item[nome].'</a>';
			$BODY.='</li>';
		}
		$BODY.='</ul>';
	}else{
		$l=(!isset($_GET[letter])||strlen(trim($_GET[letter]))!=1)?"A":$_GET[letter];
		$BODY.='<div>Nessuna classe con iniziale "'.$l.'" trovata</div>';
	}
	$BODY.=$jSQL->dressMenuWithButtons($classi[menu]);
}else{
	xmp($classi);
	$BODY.='<div>'.implode('<br>',$classi[error_messages]).'</div>';
}

?>
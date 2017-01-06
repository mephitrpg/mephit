<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["create"]);

$BODY="";

require_once("include/functions_ogl.php");
require_once("include/functions_dnd.php");
require_once("include/functions_mephit.php");

$PATH='';
$TAB1='crea';

$query="SELECT * FROM mephit_crea ORDER BY title_".$_MEPHIT[lang];
$result=mysql_query($query	);
$BODY.='<div class="row">';
while($row=mysql_fetch_array($result)){
	$BODY.='<div class="col" style="width:32%;margin:0 6px 6px 0;">';
		$BODY.='<a href="creacon.php?dndtool='.$row[id_dndtool].'">';
		$BODY.='<img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/'.$row[icon].'" border="0" width="48" height="48" alt="" align="left">';
		$BODY.=$row['title_'.$_MEPHIT[lang]];
		$BODY.='</a><br>';
		$BODY.=$row['abstract'];
	$BODY.='</div>';
}
$BODY.='</div>';

require_once("include/dress_dynamic.php");
?>

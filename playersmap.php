<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["playersmap"]);

$PATH='';
$TAB1='risorse';

$BODY="";

$BODY.='<div align="center"><iframe src="http://www.gdrplayers.it/map_embed_615.html" width="615" height="500">
<p>Visualizza la mappa dei giocatori di ruolo italiani su <a href="http://www.gdrplayers.it/mappa/">GdR Players</a>.</p>
</iframe><br /><a href="http://www.gdrplayers.it" target="_blank">www.gdrplayers.it</a></div>';

require_once("include/dress_dynamic.php");
?>

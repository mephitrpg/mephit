<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["creations"]);

$PATH='';
$TAB1='creazioni';

$BODY="";

$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0"><tr valign="top"><td>';
$BODY.='<a href="personaggi.php"><img src="admin/i/m_personaggio_0.gif" width="48" height="48" alt="Personaggi" align="absmiddle" style="margin-right:4px;">Personaggi</a><br>';
$BODY.='</td></tr></table>';
if($_SESSION[logged]){
	$BODY.='<br>';
	$BODY.='<table summary="." style="border-style: solid; border-color: rgb(128, 0, 0); border-width: 1px 0px 0px 0px;" cellpadding="0" cellspacing="0" width="100%"><tr><td width="100%" align="right" nowrap><br /><a href="profile_my.php">My Mephit</a></td></tr></table>';
}

require_once("include/dress_dynamic.php");
?>

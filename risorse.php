<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["resources"]);

$PATH='';
$TAB1='risorse';

$BODY="";

$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0" width="100%"><tr>';

$BODY.='<td><a href="avventura.php" title="'.$_LANG[adventures].'"><img src="admin/i/m_avventura_0.gif" width="48" height="48" border="0" alt="'.$_LANG[adventures].'" align="absmiddle" style="margin-right:4px;">'.$_LANG[adventures].'</a></td>';
$BODY.='<td><a href="personaggi.php" title="'.$_LANG[characters].'"><img src="admin/i/m_personaggio_0.gif" width="48" height="48" border="0" alt="'.$_LANG[characters].'" align="absmiddle" style="margin-right:4px;">'.$_LANG[characters].'</a></td>';
$BODY.='<td><a href="links.php" title="'.$_LANG[links].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_gruppo.gif" width="48" height="48" border="0" alt="'.$_LANG[links].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG[links].'</a></td>';
// $BODY.='<td><a href="playersmap.php" title="'.$_LANG[playersmap].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_gmaps.gif" width="48" height="48" border="0" alt="'.$_LANG[playersmap].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG[playersmap].'</a></td>';
// $BODY.='<td><a href="eventi.php" title="'.$_LANG[events].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_gmaps.gif" width="48" height="48" border="0" alt="'.$_LANG[events].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG[events].'</a></td>';

$BODY.='</tr></table>';
/*
if($_SESSION[logged]){
	$BODY.='<br>';
	$BODY.='<table summary="." style="border-style: solid; border-color: rgb(128, 0, 0); border-width: 1px 0px 0px 0px;" cellpadding="0" cellspacing="0" width="100%"><tr><td width="100%" align="right" nowrap><br /><a href="profile_my.php">My Mephit</a></td></tr></table>';
}
*/
require_once("include/dress_dynamic.php");
?>

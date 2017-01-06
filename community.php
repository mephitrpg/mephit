<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

$PATH='';
$TAB1='community';

$smarty->assign('title',$_LANG["community"]);

$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0" width="100%"><tr>';

$BODY.='<td><a href="giocatori.php" title="'.$_LANG["players"].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_giocatore.gif" width="48" height="48" border="0" alt="'.$_LANG["players"].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG["players"].'</a></td>';
 $BODY.='<td><a href="amici.php" title="'.$_LANG["friends"].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_amico.gif" width="48" height="48" border="0" alt="'.$_LANG["friends"].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG["friends"].'</a></td>';
$BODY.='<td><a href="gilde.php" title="'.$_LANG["guilds"].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_gilda.gif" width="48" height="48" border="0" alt="'.$_LANG["guilds"].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG["guilds"].'</a></td>';
 $BODY.='<td><a href="gruppi.php" title="'.$_LANG["groups"].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_gruppo.gif" width="48" height="48" border="0" alt="'.$_LANG["groups"].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG["groups"].'</a></td>';
// $BODY.='<td><a href="party.php" title="'.$_LANG["parties"].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_party.gif" width="48" height="48" border="0" alt="'.$_LANG["parties"].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG["parties"].'</a></td>';
$BODY.='<td><a href="forum.php" title="'.$_LANG["forum"].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_forum.gif" width="48" height="48" border="0" alt="'.$_LANG["forum"].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG["forum"].'</a></td>';
$BODY.='<td><a href="chat.php" title="'.$_LANG["chat"].'"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/m_chat.gif" width="48" height="48" border="0" alt="'.$_LANG["chat"].'" style="margin-right: 4px;" align="absmiddle">'.$_LANG["chat"].'</a></td>';

$BODY.='</tr></table>';
/*
$BODY.='<br>';
$BODY.='<table summary="." style="border-style: solid; border-color: rgb(128, 0, 0); border-width: 1px 0px 0px 0px;" cellpadding="0" cellspacing="0" width="100%"><tr><td width="100%" align="right" nowrap><br /><a href="#">'.'Crea nuovo gruppo'.'</a></td></tr></table>';
*/
require_once("include/dress_dynamic.php");
?>

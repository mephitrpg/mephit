<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["home"]);

$PATH='';
$TAB1='home';

$BODY="";

$images_folder=$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/';
$css_folder=$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/css/';
$js_folder=$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/js/';

$BODY.='
<link rel=stylesheet href="'.$css_folder.'homepage.css">
<script src="js/homepage.js"></script>


<table border="0" cellpadding="0" cellspacing="0" align="center" height="255"><tr valign="bottom">
<td>'
.'<a href="crea.php" onmouseover="homeMenu.over(\'crea\')" onmouseout="homeMenu.out(\'crea\')"><img src="'.$images_folder.'crea.png" width="215" height="215" border="0" alt="'.$_LANG[create].'"></a>'
.'<div class="bigButton" id="scroller-crea" style="display:none;"><div class="bigButton-fix"><div class="bigButton-label" style="line-height:40px;">'.$_LANG[create].'</div></div></div>'
.'</td>
<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
<td>'
.'<a href="risorse.php" onmouseover="homeMenu.over(\'risorse\')" onmouseout="homeMenu.out(\'risorse\')"><img src="'.$images_folder.'risorse.png" width="215" height="215" border="0" alt="'.$_LANG[resources].'"></a>'
.'<div class="bigButton" id="scroller-risorse" style="display:none;"><div class="bigButton-fix"><div class="bigButton-label" style="line-height:40px;">'.$_LANG[resources].'</div></div></div>'
.'</td>
<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
<td>'
.'<a href="community.php" onmouseover="homeMenu.over(\'community\')" onmouseout="homeMenu.out(\'community\')"><img src="'.$images_folder.'community.png" width="215" height="215" border="0" alt="'.$_LANG[community].'"></a>'
.'<div class="bigButton" id="scroller-community" style="display:none;"><div class="bigButton-fix"><div class="bigButton-label" style="line-height:40px;">'.$_LANG[community].'</div></div></div>'
.'</td>
</tr></table>
';

/*
$BODY.="<b>MEPHIT 0.1 Demo</b><br />
<br />
Benvenuti in MEPHIT, il portale per i giocatori di Dungeons & Dragons!<br />
<br />
Questa è solo una piccola sbirciatina ai lavori, per cui non aspettatevi di vedere chissà cosa.<br />
<br />
<br />
<br />
Dungeons & Dragons e d20 sono marchi registrati dalla Wizards of the Coast";
*/

require_once("include/dress_dynamic.php");
?>
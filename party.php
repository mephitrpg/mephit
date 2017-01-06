<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

$PATH='<a href="party.php">'.$_LANG[party].'</a>';
$TAB1='community';

$smarty->assign('title',$_LANG["party"]);

require_once("include/dress_dynamic.php");
?>

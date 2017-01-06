<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

$PATH='<a href="forum.php">'.$_LANG[forum].'</a>';
$TAB1='community';

$smarty->assign('title',$_LANG["chat"]);

require_once("include/dress_dynamic.php");
?>

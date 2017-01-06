<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["options"]);

$BODY='';

$PATH='<a href="my_options.php">'.$_LANG[options].'</a>';
$TAB1='my';

require("include/menu_personal.php");



require_once("include/dress_dynamic.php");
?>
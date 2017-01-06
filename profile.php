<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["profile"]);

$BODY='';

require("include/menu_personal.php");

require_once("include/dress_dynamic.php");
?>

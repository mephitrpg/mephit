<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["favourites"]);

$BODY="";

require_once("include/dress_dynamic.php");
?>

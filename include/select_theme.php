<?php
define("SMARTY_DIR",dirname(__FILE__)."/smarty/");
require_once(SMARTY_DIR."Smarty.class.php");
$smarty=new Smarty;
$smarty->template_dir=$_SERVER[DOCUMENT_ROOT].$_MEPHIT[WWW_ROOT]."/themes/".$_COOKIE[mephit_theme]."/templates/";
$smarty->compile_dir=$_SERVER[DOCUMENT_ROOT].$_MEPHIT[WWW_ROOT]."/themes/".$_COOKIE[mephit_theme]."/templates_c/";
$smarty->config_dir=$_SERVER[DOCUMENT_ROOT].$_MEPHIT[WWW_ROOT]."/themes/".$_COOKIE[mephit_theme]."/configs/";
$smarty->cache_dir=$_SERVER[DOCUMENT_ROOT].$_MEPHIT[WWW_ROOT]."/themes/".$_COOKIE[mephit_theme]."/cache/";
$smarty->assign("theme_dir","/themes/".$_COOKIE[mephit_theme]);
$smarty->assign("_LANG",$_LANG);
?>
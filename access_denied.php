<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$titAccDen);

$BODY='<h3>'.$_LANG["access_denied"].'</h3>Stai cercando di accedere ad un\'area per utenti registrati.<br /><br />
<a href="register.php" style="font-size:200%;">Registrati</a><br><br>
<a href="javascript:history.back();">&laquo; Indietro</a> &nbsp; <a href="index.php">Vai all\'Homepage</a>';
$TAB1='';

$smarty->assign('body',$BODY);

require_once("include/dress_dynamic.php");
?>

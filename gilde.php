<?php
require_once("include/config.php");
require_once("include/dress.php");

$PATH='<a href="gilde.php">'.$_LANG["guilds"].'</a>';
$TAB1='community';

$BODY="";

if(isset($_GET["id"])){
	require("gilde_dettaglio.php");
}else{
	require("gilde_elenco.php");
}

require_once("include/dress_dynamic.php");
?>

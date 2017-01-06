<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

$PATH='<a href="giocatori.php">'.$_LANG[players].'</a>';
$TAB1='community';

if(isset($_GET["id"])){
	require"giocatori_dettaglio.php";
}else{
	require"giocatori_elenco.php";
}

require_once("include/dress_dynamic.php");
?>

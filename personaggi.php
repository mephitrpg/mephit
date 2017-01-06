<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

if(isset($_GET["id"])){
	require"personaggi_dettaglio.php";
}else{
	require"personaggi_elenco.php";
}

require_once("include/dress_dynamic.php");
?>

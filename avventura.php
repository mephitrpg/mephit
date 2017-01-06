<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

if(isset($_GET["id"])){
	require"avventura_dettaglio.php";
}else{
	require"avventura_elenco.php";
}

require_once("include/dress_dynamic.php");
?>

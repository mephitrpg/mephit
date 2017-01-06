<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

$PATH='<a href="playbychat.php">Play by Chat Migliorato</a>';
$TAB1='community';

if(isset($_GET["id"])){
	require"playbychat_app.php";
}else{
	require"playbychat_enter.php";
}

require_once("include/dress_dynamic.php");
?>
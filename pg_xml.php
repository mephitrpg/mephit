<?php
header ("content-type: text/xml");
echo'<?xml version="1.0" encoding="UTF-8" ?>';

if(!is_numeric($_GET[id]))die("<doc><error>ID must be a number</error></doc>");
$what=$_GET[what];

require"include/db_connect.php";
require"pg.php";
global $P;
$P=new PG($_GET[id]);

switch($what){
	case"str":case"dex":case"con":case"int":case"wis":case"cha":
		$c=$P->getAbilityTotal();
		echo'<doc><error>false</error><result><score>'.$c[score]["_".$what].'</score><mod>'.$c[mod]["_".$what].'</mod></result></doc>';
		exit;
	break;
}

die("<doc><error>Command not found</error></doc>");
?>
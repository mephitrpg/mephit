<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

if(isset($_GET[id])){
	require"pg.php";
	global $P;
	$P=new PG($_GET[id]);
}

$nome_personaggio=$P->row[personaggio][nome];

$smarty->assign('title',$nome_personaggio);

if($_GET["what"]=="doit"){
	require"personaggi_delete_doit.php";
}else{
	require"personaggi_delete_form.php";
}

require_once("include/dress_dynamic.php");
?>

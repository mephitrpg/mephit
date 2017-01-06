<?php
/*
$images=array(
	"Aqueduct.jpg",
	"Kobold Warren.jpg",
	"A Sacred Space.jpg",
	"dungeon-040.jpg",
);
$names=array(
	"Fortezza di Kagath",
	"Fortezza di Kagath",
	"Radura di Nym",
	"Fortezza di Kagath",
);
$subNames=array(
	"Sotterraneo (acquedotto)",
	"Sotterraneo (acquedotto)",
	"Radura",
	"Primo piano",
);
*/
if(is_numeric($_GET[item])){
	include("avventura_dettaglio_map_dettaglio.php");
}else{
	include("avventura_dettaglio_map_elenco.php");
}
?>
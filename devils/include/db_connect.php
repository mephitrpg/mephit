<?php
/*
$db_host="localhost";
$db_name="mephit";
$db_username="root";
$db_password="";

$db_host="localhost";
$db_name="beggiora.giorgio";
$db_username="beggiora.giorgio";
$db_password="4cwwp8xx";

$db_host="localhost";
$db_name="my_jure";
$db_username="root";
$db_password="";

@mysql_connect("$db_host", "$db_username", "$db_password") or die("<h3><font clor=880000>Errore durante la connessione al database</font></h3><br>");
@mysql_select_db("$db_name") or die("<h3><font clor=880000>Errore durante la selezione del database</font></h3><br>");
*/
$connection=array(
/*	array(
		"db_host"=>"localhost",
		"db_name"=>"mephit_test_2",
		"db_username"=>"mephittestus",
		"db_password"=>"gh14cc10"
	),
*/	array(
		"db_host"=>"localhost",
		"db_name"=>"mephit_test",
		"db_username"=>"mephittestus",
		"db_password"=>"!mephittestpw00"
	),
);

$valid_connection=0;
foreach($connection as $c){
	$conn=@mysql_connect($c[db_host], $c[db_username], $c[db_password]);
	if($conn){
		if(@mysql_select_db($c[db_name])){
			$valid_connection=0;
			break;
		}else{
			$valid_connection=2;
		}
	}else{
		$valid_connection=1;
	}
}
switch($valid_connection){
	case 1:	// no connection
		echo"<h3><font clor=880000>Errore durante la connessione al database</font></h3><br>";
	break;
	case 2:	// no db
		echo"<h3><font clor=880000>Errore durante la selezione del database</font></h3><br>";
	break;
	default:
		mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);
	break;
}
?>

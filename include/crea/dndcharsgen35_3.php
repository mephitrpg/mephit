<?php
$user_max_pc=$_MEPHIT[user][permission][$_SESSION[user_type]][max_pc];

if($user_max_pc<0){
	$continue=true;
}else{
	$query="SELECT * FROM mephit_personaggio WHERE autore=".$_SESSION[user_id];
	$result=mysql_query($query);
	$continue=mysql_num_rows($result)<$user_max_pc;
}

if(!$continue){
	$BODY.=$_LANG[too_many_pc];
}else{
	
	switch($_SESSION["metodo"]){
		case"rilancio":
		case"organici":
		case"medi_personalizzati":
		case"medi_casuali":
		case"potenziati":
		case"standard":
			require(dirname(__FILE__)."/dndcharsgen35_tpl_top.php");
			require(dirname(__FILE__)."/dndcharsgen35_3_".$_SESSION["metodo"].".php");
			require(dirname(__FILE__)."/dndcharsgen35_tpl_bottom.php");
		break;
	}
	
}
?>
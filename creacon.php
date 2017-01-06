<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

require_once("include/functions_ogl.php");
require_once("include/functions_dnd.php");
require_once("include/functions_mephit.php");

$query="SELECT * FROM mephit_crea WHERE id_dndtool=".$_GET["dndtool"];
$result=mysql_query($query);
if(mysql_num_rows($result)==0){
	$query="SELECT * FROM mephit_crea ORDER BY title_".substr($_COOKIE[mephit_lang],0,2)." LIMIT 0,1";
	$result=mysql_query($query);
}
while($row=mysql_fetch_array($result)){
	$page=$row["page"];
	$found=false;
	if($_GET["dndtool"]==2){	// Personaggio 3.5
		$query_roll="SELECT * FROM mephit_crea_personaggio WHERE fk_giocatore=".$_SESSION[user_id];
		$result_roll=mysql_query($query_roll);
		if(mysql_num_rows($result_roll)!=0){
			while($row_roll=mysql_fetch_array($result_roll)){
				if($_GET[step]<=$row_roll[step]){
					$stepp=$row_roll[step];
					$_POST[metodo]=$row_roll[metodo];
					$found=true;
				}
			}
		}
	}
	if(!$found){
		if( isset($_GET["step"]) && $_GET["step"]>0 && $_GET["step"]<=$row["step"] ){
			$stepp=$_GET["step"]*1;
		}else{
			$stepp=1;
		}
	}
	$smarty->assign('title',$row["title_".substr($_COOKIE[mephit_lang],0,2)]);
	$PATH='<a href="creacon.php?dndtool='.$_GET[dndtool].'">'.$row["title_".substr($_COOKIE[mephit_lang],0,2)].'</a>';
	$TAB1='crea';
}

if(isset($page)){
	require("include/crea/".$page."_".$stepp.".php");
}

require_once("include/dress_dynamic.php");
?>
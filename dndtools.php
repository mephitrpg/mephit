<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["dndtools"]);

$PATH='<a href="index.php">'.$_LANG["home"].'</a> &raquo; <a href="dndtools.php">DnDTools</a>';

$BODY="";

require_once("include/functions_ogl.php");
require_once("include/functions_dnd.php");
require_once("include/functions_mephit.php");

if(isset($_GET["dndtool"])){
	$query="SELECT * FROM mephit_dndtool WHERE id_dndtool=".$_GET["dndtool"];
	$result=mysql_query($query);
	if(mysql_num_rows($result)==0){
		$query="SELECT * FROM mephit_dndtool ORDER BY title LIMIT 0,1";
		$result=mysql_query($query);
	}
	while($row=mysql_fetch_array($result)){
		$PATH.=" &raquo; <a href=\"".$_SERVER[PHP_SELF]."?dndtool=".$_GET[dndtool]."\">".$row["title_".substr($_COOKIE[mephit_lang],0,2)]."</a>";
		require("include/dndtools/".$row[page].".php");
	}
}else{
	$query="SELECT * FROM mephit_dndtool ORDER BY title_".substr($_COOKIE[mephit_lang],0,2);
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		$BODY.="<a href=\"dndtools.php?dndtool=".$row["id_dndtool"]."\">".$row["title_".substr($_COOKIE[mephit_lang],0,2)]."</a><br>".$row["abstract"]."<br><br>";
	}
}

require_once("include/dress_dynamic.php");
?>

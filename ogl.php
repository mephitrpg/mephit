<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["ogl"]);

$BODY="";
$BODY.="<p>".nl2br(implode("",file("include/languages/ogl/".$_COOKIE["mephit_lang"].".txt")))."</p>";
$BODY.="<a name=\"software\"></a><h3>Software</h3>";
if($_SERVER["HTTP_REFERER"]!=""){
	$BODY.="<div>".$_LANG["ogl_software"]." <a href=\"".$_SERVER["HTTP_REFERER"]."\">".$_SERVER["HTTP_REFERER"]."</a> :</div><br>";
	$BODY.="<form><textarea style=\"width:100%;\" rows=\"10\" wrap=\"virtual\">".htmlspecialchars(implode("",file($_SERVER["HTTP_REFERER"])))."</textarea></form>";
}else{
	$BODY.="In qualsiasi pagina, clicca sul pulsante \"OGL SOFTWARE\" per visualizzare il sorgente di quella pagina"."<br><br>";
	$BODY.="<a href=\"\"><img src=\"".$_MEPHIT["HTDOCS"]."/themes/".$_COOKIE["mephit_theme"]."/images/ad_oglSoftware_120x15.gif\" width=\"120\" height=\"15\" border=0></a>";
}

require_once("include/dress_dynamic.php");
?>

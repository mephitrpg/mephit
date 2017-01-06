<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["events"]);

$PATH='';
$TAB1='risorse';

$BODY="";

$BODY.='<div align="center"><iframe src="http://www.google.com/calendar/embed?src=qjasma1dfltihrdqmp8sgbr8ao%40group.calendar.google.com&ctz=Europe/Rome" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe><br /><a href="http://www.gioconomicon.net" target="_blank">www.gioconomicon.net</a></div>';

$BODY.='<br />';

$BODY.='<div align="center"><iframe width="800" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.it/maps?f=q&amp;source=embed&amp;hl=it&amp;geocode=&amp;q=http:%2F%2Fwww.gioconomicon.net%2Fgmappipe%2Fgpg19.kml&amp;ie=UTF8&amp;ll=42.779275,12.348633&amp;spn=15.475114,28.125&amp;output=embed"></iframe><br /><a href="http://www.gioconomicon.net" target="_blank">www.gioconomicon.net</a></div>';

require_once("include/dress_dynamic.php");
?>

<?php
header ("content-type: text/javascript");

if(!is_numeric($_GET[id]))die("{error:'ID must be a number'}");
$what=$_GET[what];

global $_MEPHIT;
$_MEPHIT=array();
switch($_GET[lang]){
	case"it":case"en":
		$_MEPHIT[lang]=$_GET[lang];
	break;
}

require"include/db_connect.php";
require"pg.php";
global $P;
$P=new PG($_GET[id]);

switch($what){
	case"str":case"dex":case"con":case"int":case"wis":case"cha":
		$c=$P->getAbilityTotal();
		echo'{error:false,result:{score:'.$c[score]["_".$what].',mod:'.$c[mod]["_".$what].'}}';
		exit;
	break;
	case"badge":
		$n=addslashes($P->row[personaggio][nome]);
		$a=$P->getAlignment();
		$an=addslashes($a[name]);
		$r=$P->getRace();
		$rn=addslashes($r[name]);
		$classi=$P->getMulticlass();
		$output=array();
		foreach($classi as $c)$output[]="{id:".addslashes($c[id]).",name:'".addslashes($c[name])."',short:'".addslashes($c[short])."',level:".$c[level]."}";
		$c="[".implode(",",$output)."]";
		
		$i=rawurlencode("http://www.parolemobili.it/image.php?u=16296&dateline=1247151789");
		echo"{error:false,result:{name:'".$n."',race:'".$rn."',alignment:'".$an."',image:'".$i."',level:".count($classi).",classes:'".$c."'}}";
		exit;
	break;
}

die("{error:'Command not found'}");
?>
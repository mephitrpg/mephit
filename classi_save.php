<?php
$debug=0;
require_once("include/config.php");
$classID=$_POST[id]*1;

if($debug){
	xmp($_POST);
	xmp($_FILES);
}

function arrayValuesAreNotNumeric($arr){
	foreach($arr as $v)if(!is_numeric($v))return true;
	return false;
}
function redirectToDetailPage(){
	header("location: classi.php?id=".$_POST[id]);exit;
}
function extractNumberFromString($q){
	return  preg_replace('/\D/', '', $q);
}

if(
	(isset($_POST[skills])&&!is_array($_POST[skills]))
	||
	(isset($_POST[classTypes])&&!is_array($_POST[classTypes]))
	||
	(isset($_POST[languages])&&!is_array($_POST[languages]))
){
	redirectToDetailPage();
}

if(arrayValuesAreNotNumeric($_POST[skills])||arrayValuesAreNotNumeric(array_keys($_POST[languages]))){
	redirectToDetailPage();
}

$canIedit=$_SESSION[user_type]=="admin"||$_POST[what]=="crea";
if(!$canIedit){
	redirectToDetailPage();
}

$query="SELECT * FROM srd35_class WHERE id=".$classID;
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$autore=$row[autore];
	$canIedit=$canIedit||$_SESSION[user_id]==$autore;
}
if(!$canIedit){
	redirectToDetailPage();
}

switch($_POST[what]){
	case"modifica":
		
		//languages
		$query="DELETE FROM srd35_class_lang WHERE fk_classe = ".$classID;
		$result=mysql_query($query);
		$values=array();
		foreach($_POST[languages] as $lang_id=>$availability){
			switch($availability){
				case"A":
				case"B":
					$values[]="(".$classID.",".$lang_id.",'".$availability."')";
				break;
			}
		}
		if(count($values)){
			$query="INSERT INTO srd35_class_lang (fk_classe,fk_lang,lang_availability) VALUES ".implode(",",$values);
			$result=mysql_query($query);
		}
		
		// class skills
		$query="DELETE FROM srd35_class_skill WHERE fk_classe = ".$classID;
		$result=mysql_query($query);
		$values=array();
		foreach($_POST[skills] as $v)$values[]="(".$classID.",".$v.")";
		if(count($values)){
			$query="INSERT INTO srd35_class_skill (fk_classe,fk_abilita) VALUES ".implode(",",$values);
			$result=mysql_query($query);
		}
				
		// levels
		$query="DELETE FROM srd35_class_level WHERE fk_classe = ".$classID;
		$result=mysql_query($query);
		$values=array();
		foreach($_POST[levels] as $level=>$v)$values[]="(".implode(",",array(
			$classID,
			"'".mysql_real_escape_string($level)."'",
			"'".mysql_real_escape_string($v[bab])."'",
			"'".mysql_real_escape_string($v["for"])."'",
			"'".mysql_real_escape_string($v[ref])."'",
			"'".mysql_real_escape_string($v[wil])."'",
			"'".mysql_real_escape_string($v[hd])."'",
			"'".mysql_real_escape_string($v[sp])."'",
			"'".mysql_real_escape_string($v[special])."'",
		)).")";
		if(count($values)){
			$query="INSERT INTO srd35_class_level (fk_classe,level,base_attack_bonus,fort_save,ref_save,will_save,dv,pa,special) VALUES ".implode(",",$values);
			$result=mysql_query($query);
		}
		
		// types
		if(in_array("martial",$_POST[classTypes])){
			$psion=0;
			$divine=0;
			$arcane=0;
		}else{
			$psion=in_array("psionic",$_POST[classTypes])?1:0;
			$divine=in_array("divine",$_POST[classTypes])?1:0;
			$arcane=in_array("arcane",$_POST[classTypes])?1:0;
		}
		$query="UPDATE srd35_class SET psion=".$psion.",divine=".$divine.",arcane=".$arcane.", WHERE id=".$classID;
		$result=mysql_query($query);
		
	break;
}

if(!$debug){
	redirectToDetailPage();
}
?>

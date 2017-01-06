<?php

// MEPHIT global declaration
global $_MEPHIT;$_MEPHIT=array();

// user
$_MEPHIT[user]=array();

// user permissions
$_MEPHIT[user][permission]=array(
	"admin"=>array(
		"max_pc"=>-1,
		"max_adv"=>-1,
		"max_class"=>-1,
	),
	"free"=>array(
		"max_pc"=>3,
		"max_adv"=>3,
		"max_class"=>12,
	),
);

$thisfolder=dirname(__FILE__);

if(!isset($_SESSION))session_start();
if(!isset($_SESSION["logged"]))$_SESSION["logged"]=false;

// PHP compatibility
if(!isset($_SERVER)){
	$_GET=$HTTP_GET_VARS;
	$_POST=$HTTP_POST_VARS;
	$_FILES=$HTTP_POST_FILES;
	$_COOKIE=$HTTP_COOKIE_VARS;
	$_SERVER=$HTTP_SERVER_VARS;
	$_SESSION=$HTTP_SESSION_VARS;
	$_ENV=$HTTP_ENV_VARS;
}

// MySQL Injection

function MySQL_injection($var,$type){
	switch($type){
		case"str":	if($var!=addslashes($var))return false;								break;
		case"id":	if( "".($var*1)."" !== $var )return false;							break;
		case"num":	if(!is_numeric($var))return false;									break;
		case"arr":	if(!is_array($var))return false;									break;
		case"boo":	if($var!==0&&$var!==1&&$var!==true&&$var!==false)return false;		break;
	}
	if(trim($var)=="")return false;
	return true;
}

$getVars=array(
	array("id","id"),
	array("item","id"),
	array("arr","arr"),
	array("from","id"),
	array("to","id"),
	array("gruppo","id"),
	array("luogo","id"),
	array("dndtool","id"),
	array("step","id"),
	array("key","str"),
	array("what","str"),
	array("pag","id"),
	array("orderby","num"),
	array("size","id")
);
for($i=0;$i<count($getVars);$i++){
	$k=$getVars[$i][0];
	$t=$getVars[$i][1];
	if ( isset($_GET[$k]) && !MySQL_injection($_GET[$k],$t) ) unset($_GET[$k]);
}
unset($getVars);

if(!ini_get('magic_quotes_gpc')){
	foreach(array_keys($_POST) as $t){
		if(!is_array($_POST[$t]))$_POST[$t]=addslashes($_POST[$t]);
	}
}

// DOCUMENT_ROOT
$_MEPHIT[DOCUMENT_ROOT]=str_replace("\\","/",realpath(dirname(__FILE__)."/.."));
$_MEPHIT[WWW_ROOT]=substr($_MEPHIT[DOCUMENT_ROOT],strlen($_SERVER[DOCUMENT_ROOT]));

// functions

require_once($thisfolder."/functions.php");
require_once($thisfolder."/functions_mephit.php");
require_once($thisfolder."/jure_date.php");
require_once($thisfolder."/jure_mysql.php");

// retrive MEPHIT settings

require_once($thisfolder."/db_connect.php");

$query="SELECT chiave,valore FROM mephit_settings";
$result=mysql_query($query);
if($result){
	while($row=mysql_fetch_array($result)){
		$_MEPHIT[$row[0]]=$row[1];
	}
/*	$documentRoot=explode("/",str_replace("\\","/",__FILE__));
	array_pop($documentRoot);
	array_pop($documentRoot);
	$documentRoot=implode("/",$documentRoot);
	$_MEPHIT["DOCUMENT_ROOT"]=$documentRoot;
*/}else{
	echo"<b><font color=ff0000>ERRORE: impossibile leggere le impostazioni di MEPHIT dal database.</font></b><br>";
}
unset($documentRoot);

if(!isset($_COOKIE["mephit_theme"])){
	setcookie("mephit_theme","Chaotic Red 2",time()+24*60*60*365*2,"/");
	$_COOKIE["mephit_theme"]="Chaotic Red 2";
}
if(!isset($_COOKIE["mephit_lang"])){
	setcookie("mephit_lang","it_Italiano",time()+24*60*60*365*2,"/");
	$_COOKIE["mephit_lang"]="it_Italiano";
}
if(!isset($_COOKIE["mephit_adm_target"])){
	setcookie("mephit_adm_target","ask",time()+24*60*60*365*2,"/");
	$_COOKIE["mephit_adm_target"]="ask";
}

$_MEPHIT[lang]=substr($_COOKIE[mephit_lang],0,2);
$_MEPHIT[language]=$_COOKIE["mephit_lang"];

header('Content-Type: text/html; charset=utf-8');

require_once($thisfolder."/languages/".$_COOKIE["mephit_lang"].".php");
require_once($thisfolder."/select_theme.php");

function SELECT($query){
	$arr=array();
	$result=mysql_query("SELECT ".$query);
	while($row=mysql_fetch_array($result)){
		$i=0;
		foreach(array_keys($row) as $r){
			if(!is_numeric($r))$arr[$i][$r]=$row[$r];
		}
		$i++;
	}
	return $arr;
}
$_MEPHIT[mailer_headers] ="From: ".$_MEPHIT[mailer_name]." <".$_MEPHIT[mailer_address].">\n";
$_MEPHIT[mailer_headers].="Reply-To: ".$_MEPHIT[mailer_name]." <".$_MEPHIT[mailer_address].">\n";
$_MEPHIT[mailer_headers].="Return-path:".$_MEPHIT[mailer_address]."\n";
$_MEPHIT[mailer_headers].="Message-ID: <".time().".".$_MEPHIT[mailer_address].">\n";
$_MEPHIT[mailer_headers].="X-Mailer: PHP/".phpversion()."\n\n";
$_MEPHIT[HOST]='http://'.$_SERVER[HTTP_HOST]/*.':'.$_SERVER[REMOTE_PORT]*/;
$_MEPHIT[gd_enabled]=function_exists('getimagesize');

$_MEPHIT[avatar_default]=$_MEPHIT[HOST].$_MEPHIT[WWW_ROOT].'/images/avatar.png';
$_MEPHIT[avatar_maxWidth]=100;		// px
$_MEPHIT[avatar_maxHeight]=100;		// px
$_MEPHIT[avatar_maxSize]=10*1024;	// k

$_MEPHIT[pgthumb_default]=$_MEPHIT[HOST].$_MEPHIT[WWW_ROOT].'/images/pg_thumb.gif';
$_MEPHIT[pgthumb_maxWidth]=100;		// px
$_MEPHIT[pgthumb_maxHeight]=100;	// px
$_MEPHIT[pgthumb_maxSize]=10*1024;	// k

$_MEPHIT[pgimage_default]=$_MEPHIT[HOST].$_MEPHIT[WWW_ROOT].'/images/pg_image.jpg';
$_MEPHIT[pgimage_maxWidth]=1024;	// px
$_MEPHIT[pgimage_maxHeight]=1024;	// px
$_MEPHIT[pgimage_maxSize]=500*1024;	// k

// user folders
$_MEPHIT[user][folders]=array(
	"avatar"		=>	"/avatar",
	"foto"			=>	"/foto",
	"pg"			=>	"/pg",
	"pg_portraits"	=>	"/pg/portrait",
	"pg_printable"	=>	"/pg/printable",
	"pg_tooltip"	=>	"/pg/tooltip"
);

// regexp
$_MEPHIT["regexp"]=array(
	"email"	=>	"/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/"
);

// login
require_once($thisfolder."/login/login_doIt.php");
?>
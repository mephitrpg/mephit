<?php
$accessDeniedTitle=$_LANG["access_denied"];
$protectedPages=array(
//	"crea.php",
	"creacon.php",
//	"creazioni.php",
	"profile.php",
	"profile_my.php",
	"profile_options.php",
	"profile_avatar.php",
	"pm.php",
	"my.php",
	"my_notices.php",
	"request.php",
	"request_accept.php",
	"request_refuse.php",
	"request_delete.php",
);

switch(basename($_SERVER["PHP_SELF"])){
	case "crea.php":
		$titAccDen=$_LANG["create"];
//		$PATH='<a href="index.php">'.$_LANG["home"].'</a> &raquo; <a href="crea.php">'.$_LANG[create].'</a>';
		$PATH='';
		$TAB1='';
	break;
	case "creazioni.php":
		$titAccDen=$_LANG["creations"];
//		$PATH='<a href="index.php">'.$_LANG["home"].'</a> &raquo; <a href="creazioni.php">'.$_LANG[creations].'</a>';
		$PATH='';
		$TAB1='';
	break;
	case "profile.php":
		$titAccDen=$_LANG["profile"];
//		$PATH='<a href="index.php">'.$_LANG["home"].'</a> &raquo; <a href="profile.php">'.$_LANG[profile].'</a>';
		$PATH='';
		$TAB1='';
	break;
	case "profile_my.php":
		$titAccDen=$_LANG["profile"];
//		$PATH='<a href="index.php">'.$_LANG["home"].'</a> &raquo; <a href="profile.php">'.$_LANG[profile].'</a>';
		$PATH='';
		$TAB1='';
	break;
	case "profile_options.php":
		$titAccDen=$_LANG["profile"];
//		$PATH='<a href="index.php">'.$_LANG["home"].'</a> &raquo; <a href="profile.php">'.$_LANG[profile].'</a>';
		$PATH='';
		$TAB1='';
	break;
	case "profile_avatar.php":
		$titAccDen=$_LANG["profile"];
//		$PATH='<a href="index.php">'.$_LANG["home"].'</a> &raquo; <a href="profile.php">'.$_LANG[profile].'</a>';
		$PATH='';
		$TAB1='';
	break;
	case "pm.php":
		$titAccDen=$_LANG["pm"];
//		$PATH='<a href="index.php">'.$_LANG["home"].'</a> &raquo; <a href="pm.php">'.$_LANG[private_messages].'</a>';
		$PATH='';
		$TAB1='';
	break;
	case "sheet_frameset.php":
		$titAccDen=$_LANG["pm"];
//		$PATH='<a href="index.php">'.$_LANG["home"].'</a> &raquo; <a href="pm.php">'.$_LANG[private_messages].'</a>';
		$PATH='';
		$TAB1='';
	break;
	default:
		$titAccDen=$_LANG["access_denied"];
//		$PATH='<a href="index.php">'.$_LANG["home"].'</a>';
		$PATH='';
		$TAB1='';
	break;
}


if(in_array(basename($_SERVER["PHP_SELF"]),$protectedPages) && !$_SESSION["logged"]){
	$path=dirname(__FILE__)."/../../access_denied.php";
	$path=realpath($path);
	include_once($path);
	exit;
}
?>
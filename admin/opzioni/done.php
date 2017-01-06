<?
require_once("../../include/config.php");
$sezione="opzioni";
setcookie("mephit_theme",stripslashes($_POST["theme"]),time()+24*60*60*365*2,"/");
$_COOKIE["mephit_theme"]=stripslashes($_POST["theme"]);
setcookie("mephit_lang",stripslashes($_POST["language"]),time()+24*60*60*365*2,"/");
$_COOKIE["mephit_lang"]=stripslashes($_POST["language"]);
setcookie("mephit_adm_target",stripslashes($_POST["mephit_adm_target"]),time()+24*60*60*365*2,"/");
$_COOKIE["mephit_adm_target"]=stripslashes($_POST["mephit_adm_target"]);
if(substr($_POST["include_dir_root"],strlen($_POST["include_dir_root"])-1,1)!="/")$_POST["include_dir_root"]=$_POST["include_dir_root"]."/";

$valid=true;
foreach(array_keys($_POST) as $t){
	if( $t!="language" && $t!="theme" ){
		$query="UPDATE mephit_settings SET valore='".$_POST[$t]."' WHERE chiave='".$t."';";
		$result=mysql_query($query);
		if(!$result)$valid=false;
	}
}

if($valid){
	$message="Opzioni modificate correttamente<br><br>";
}else{
	$message="ERRORE: Opzioni non modificate<br><br>";
}

require_once("../../include/admin/theme_top.php");
?>
<br><h1>Opzioni MEPHIT</h1>

<form name=f action="index.php" method="post">
<?=$message?>
<input type=submit value="Torna alle Opzioni">
</form>
<?
require_once("../../include/admin/theme_bottom.php");
?>

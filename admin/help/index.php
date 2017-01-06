<?
require_once("../../include/config.php");
$sezione="help";
$langDir="../../include/languages";
$handle=opendir($langDir);
$languages=array();
while($file = readdir($handle)){if( $file!="." && $file!=".." && !is_dir($langDir."/".$file) ){
	$t=substr($file,0,strlen($file)-4);
	$languages[]="<option value=\"$t\"".(($t==$_COOKIE["mephit_lang"])?" selected":"").">".substr($t,3,strlen($t));
}}
sort($languages);
$languages=implode("\n",$languages);
$handle=opendir(dirname(__FILE__)."/../../themes");
$themes=array();
while($file = readdir($handle)){if($file!="."&&$file!=".."){
	$themes[]="<option value=\"$file\"".(($file==$_COOKIE["mephit_theme"])?" selected":"").">".$file;
}}
sort($themes);
$themes=implode("\n",$themes);
require_once("../../include/admin/theme_top.php");
?>
<script>
function set(q,v){
	document.f.elements[q].value=v;
}
</script>
<br><h1>Help</h1>
<?
require_once("../../include/admin/theme_bottom.php");
?>

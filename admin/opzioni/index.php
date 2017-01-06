<?
require_once("../../include/config.php");
$sezione="opzioni";
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
<br><h1>Opzioni MEPHIT</h1>
<table border=0 cellpadding=4 cellspacing=0>
<form name=f action="done.php" method="post">
<tr bgcolor="eeeeee"><td><b>Lingua:</b></td><td align="right"><select name=language><?=$languages?></select></td><td></td></tr>
<tr bgcolor="eeeeee"><td><b>Tema:</b></td><td align="right"><select name=theme><?=$themes?></select></td><td></td></tr>
<tr bgcolor="eeeeee"><td><b>Titolo del sito:</b></td><td align="right"><input name=website_title value="<?=$_MEPHIT["website_title"]?>"></td><td></td></tr>
<tr bgcolor="eeeeee"><td><b>Directory di MEPHIT:</b></td><td align="right">http://<?=$_SERVER["SERVER_NAME"]?>&nbsp;<input name=HTDOCS value="<?=$_MEPHIT["HTDOCS"]?>"></td><td><input type=button value="Default" onclick=set("HTDOCS","")> <input type=button value="Suggerimento"  onclick=set("HTDOCS","<?
$t=explode("/",str_replace("\\","/",$_SERVER["PHP_SELF"]));
array_splice($t,count($t)-3);
echo $HTDOCS_suggest=implode("/",$t);
?>")></td></tr>
<tr bgcolor="eeeeee"><td><b>Apri in:</b></td><td align="right">
<select name="mephit_adm_target">
<option value="ask""<?=($_COOKIE["mephit_adm_target"]=="ask")?" selected":""?>">Chiedi
<option value="new""<?=($_COOKIE["mephit_adm_target"]=="new")?" selected":""?>">Nuova finestra
<option value="same""<?=($_COOKIE["mephit_adm_target"]=="same")?" selected":""?>">Stessa finestra
<option value="frame""<?=($_COOKIE["mephit_adm_target"]=="frame")?" selected":""?>">Frame
</select>
</td><td></td></tr>
<tr><td colspan=3><br><br><h3>E-mail</h3></td></tr>
<tr bgcolor="eeeeee"><td><b>Mailer name:</b></td><td align="right"><input name=mailer_name value="<?=$_MEPHIT["mailer_name"]?>"></td><td><input type=button value="Default" onclick=set("mailer_name","~MEPHIT~ Robot")></td></tr>
<tr bgcolor="eeeeee"><td><b>Mailer address:</b></td><td align="right"><input name=mailer_address value="<?=$_MEPHIT["mailer_address"]?>"></td><td><input type=button value="Default" onclick=set("mailer_address","noreply@mephit_portal.com")> <input type=button value="Suggerimento" onclick=set("mailer_address","noreply@<?

//$t=explode(".",$_SERVER["SERVER_NAME"]);
$t=explode(".","www.mephit.it");
if(count($t)>2)$t=array_splice($t,1,count($t)-1);
echo implode(".",$t);
?>")></td></tr>
<tr><td colspan=3><br><br><h3>Opzioni Avanzate</h3></td></tr>
<tr bgcolor="eeeeee"><td><b>DOCUMENT_ROOT:</b></td><td align="right"><input name=DOCUMENT_ROOT value="<?=$_SERVER["DOCUMENT_ROOT"]?>"></td><td><input type=button value="Default" onclick=set("DOCUMENT_ROOT","<?=$_SERVER["DOCUMENT_ROOT"]?>")> <input type=button value="Suggerimento"  onclick=set("DOCUMENT_ROOT","<?
$t=explode("/",str_replace("\\","/",dirname(__FILE__)));
array_splice($t,count($t)-2);
$t=implode("/",$t);
if( substr($t,strlen($t)-strlen($HTDOCS_suggest),strlen($HTDOCS_suggest)) == $HTDOCS_suggest ){
	$t=substr($t,0,strlen($t)-strlen($HTDOCS_suggest));
}
echo $DOCUMENT_ROOT_suggest=$t;
?>")></td></tr>
<tr bgcolor="eeeeee"><td><b>Directory di inclusione:</b></td><td align="right">http://<?=$_SERVER["SERVER_NAME"]?>&nbsp;<input name=include_path value="<?=$_MEPHIT["include_path"]?>"></td><td><input type=button value="Default" onclick=set("include_path","/include")> <input type=button value="Suggerimento"  onclick=set("include_path","<?=$HTDOCS_suggest?>/include")></td></tr>
<tr><td colspan=2><br><br><input type=submit value="Modifica"></td></tr>
</form>
</table>
<?
require_once("../../include/admin/theme_bottom.php");
?>

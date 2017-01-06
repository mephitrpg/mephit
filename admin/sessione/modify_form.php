<?
require_once("../../include/config.php");
require_once("../../include/jure_date.php");
$D=new jureDate();
$D->setLang(substr($_COOKIE["mephit_lang"],0,2));
$sezione="sessione";
$fk_avventura_options="";
if(!isset($_POST[nome])){
	$query="SELECT nome,fk_avventura,DATE_FORMAT(data,'%Y'),DATE_FORMAT(data,'%m'),DATE_FORMAT(data,'%d'),DATE_FORMAT(data,'%H'),DATE_FORMAT(data,'%i'),diario,diario_public FROM mephit_sessione WHERE id_sessione=".$_POST["id_item"];
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		while(list($nome,$fk_avventura,$Y,$m,$d,$H,$i,$diario,$diario_public)=mysql_fetch_array($result)){
			$_POST[diario]=$diario;
			$_POST[diario_public]=$diario_public;
			$_POST[nome]=htmlspecialchars($nome);
			$_POST[a]=$Y;
			$_POST[m]=$m;
			$_POST[g]=$d;
			$_POST[H]=$H;
			$_POST[i]=$i;
			$query_fk_avventura_options="SELECT id_avventura,nome FROM mephit_avventura ORDER BY nome";
			$result_fk_avventura_options=mysql_query($query_fk_avventura_options);
			while(list($id,$nome,$d,$p)=mysql_fetch_array($result_fk_avventura_options)){
				$fk_avventura_options.="<option value=$id".(($id==$fk_avventura)?" selected":"").">".htmlspecialchars($nome)."\n";
			}
		}
	}
}else{
	$_POST[nome]=htmlspecialchars(stripslashes($_POST[nome]));
	$_POST[diario]=stripslashes($_POST[diario]);
	$_POST[diario_public]=htmlspecialchars(stripslashes($_POST[diario_public]));
	$query_fk_avventura_options="SELECT id_avventura,nome FROM mephit_avventura ORDER BY nome";
	$result_fk_avventura_options=mysql_query($query_fk_avventura_options);
	while(list($id,$nome,$d,$p)=mysql_fetch_array($result_fk_avventura_options)){
		$fk_avventura_options.="<option value=$id".(($id==$_POST[fk_avventura])?" selected":"").">".htmlspecialchars($nome)."\n";
	}
}
$w=date("w",$D->data2date($_POST[g]."-".$_POST[m]."-".$_POST[a]));
require_once("../../include/admin/theme_top.php");
?>
<script>
_editor_url = "<?=$_MEPHIT["HTDOCS"]?>/js/htmlarea/";
_editor_lang = "<?=substr($_COOKIE["mephit_lang"],0,2)?>";
</script>
<script src="<?=$_MEPHIT["HTDOCS"]?>/js/htmlarea/htmlarea_config.js"></script>
<br><h1>Sessione</h1>
<table border=0 cellpadding=4 cellspacing=0>
<form name=f action=modify_done.php method=post>
<input type=hidden name=id_item value="<?=$_POST[id_item]?>">
<tr>
<td><b>Nome sessione:</b></td>
<td><input name=nome value="<?=$_POST[nome]?>" style="width:100%"></td>
</tr>
<tr>
<td><b>Data sessione:</b></td>
<td>
<input name="d" value="<?=$D->lang[$D->lang["current"]]["dayName"][$w]?>" size="13" readonly><!-- Donnerstag --><!-- $D->getLangElement("dayName",date("w")) -->
<?
echo $D->drawSelect("day",$_POST[g],"name=\"g\"");
echo " ";
echo $D->drawSelect("monthName",$_POST[m],"name=\"m\"");
echo " ";
echo $D->drawSelect("yearFull",$_POST[a],"name=\"a\"");
?>
</td>
</tr>
<tr>
<td><b>Ora sessione:</b></td>
<td><?
echo $D->drawSelect("H",$_POST[H],"name=\"H\"");
echo "<b>&nbsp;:&nbsp;</b>";
echo $D->drawSelect("i",$_POST[i],"name=\"i\"");
?>
</td>
</tr>
<tr>
<td><b>Avventura associata:</b></td>
<td><select name=fk_avventura><option><?=$fk_avventura_options?></select></td>
</tr>
<tr valign="top">
<td>Diario:</td>
<td><table border=0 cellpadding=1 cellspacing=0><tr><td width="560" bgcolor="#666666"><textarea name=diario id=diario style="width:560px;" rows="20"><?=htmlspecialchars(stripslashes($_POST[diario]))?></textarea></td></tr></table></td>
</tr>
<tr>
<td>Pubblica il diario</td><td>
<input type=radio name=diario_public value="1" class="radio"<?=($_POST[diario_public])?" checked":""?>> Sì&nbsp;&nbsp;
<input type=radio name=diario_public value="0" class="radio"<?=(!$_POST[diario_public])?" checked":""?>> No
</td>
</tr>
<tr>
<td colspan=2>
<input type=submit value="Indietro" onclick="document.f.action='index.php'">
<input type=submit value="Avanti">
</td>
</tr>
</form>
</table>
<script>
if(document.all)document.body.onload=function(){initEditor('diario')};
else initEditor('diario');
</script>
<?
require_once("../../include/admin/theme_bottom.php");
?>

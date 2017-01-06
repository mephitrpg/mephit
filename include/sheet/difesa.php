<?php
$y_top="1090";
$y_select="555";
$y_range="99";
$label=array($_LANG["armor"]."/",$_LANG["shield"]."/","","");
$class=array($_LANG["armor"]."/",$_LANG["shield"]."/","","");
for($i=1;$i<5;$i++){
?>
<!-- <?=$i+8+5?> -->
<div style="top:<?=($y_top-$y_range)+($i*$y_range)?>px;left:0px;">
<table border=0 cellpadding=0 cellspacing=0>

<tr>
<td width=2 rowspan=2 bgcolor=000000></td>
<td colspan=7 class=cell-black rowspan=2 align=center<?if($i<3)echo" style=\"font-family:'Arial Narrow'\"";?>><?=$label[$i-1]?><?=$_LANG["protective_item"]?></td>
<td width=1></td>
<td height=10></td>
<td width=1></td>
<td></td>
<td width=1></td>
<td></td>
</tr>

<tr align=center>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["ac_bonus"]?></b></span></td>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["max_dex"]?></b></span></td>
<td width=1 bgcolor=000000></td>
</tr>

<tr>
<td bgcolor=000000></td>
<td colspan=7><input name=difesa<?=$i?> class=empty style="width:221px;" value="<?=$values["difesa".$i]?>"></td>
<td width=1 bgcolor=000000></td>
<td><input name=ac_bonus<?=$i?> class=empty style="width:50px;" value="<?=$values["ac_bonus".$i]?>"></td>
<td bgcolor=000000></td>
<td><input name=max_dex<?=$i?> class=empty style="width:42px;" value="<?=$values["max_dex".$i]?>"></td>
<td width=2 bgcolor=000000></td>
</tr>

<tr><td colspan=13 height=1 bgcolor=000000></td></tr>

<tr>
<td bgcolor=000000></td>
<td class=cell-black><span class=under><b><?=$_LANG["notes"]?></b></span></td>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["type"]?></b></span></td>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["weight"]?></b></span></td>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["speed"]?></b></span></td>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["failure"]?></b></span></td>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["penality"]?></b></span></td>
<td bgcolor=000000></td>
</tr>

<tr>
<td bgcolor=000000></td>
<td><input name=noteDifesa<?=$i?> class=empty style="width:100px;" value="<?=$values["noteDifesa".$i]?>"></td>
<td bgcolor=000000></td>
<td><input name=tipoDifesa<?=$i?>_print class=empty style="width:36px;" value="<?=$values["tipoDifesa".$i."_string"]?>"><select name=tipoDifesa<?=$i?> class=text style="width:36px;display:none;" onchange="document.f.elements[this.name+'_print'].value=this.options[this.options.selectedIndex].text;">
<option value=0>
<option value=1<?=($values["tipoDifesa".$i]==1)?" selected":""?>><?=$_LANG["light"]."\n"?>
<option value=2<?=($values["tipoDifesa".$i]==2)?" selected":""?>><?=$_LANG["medium"]."\n"?>
<option value=3<?=($values["tipoDifesa".$i]==3)?" selected":""?>><?=$_LANG["heavy"]."\n"?>
</select></td>
<td bgcolor=000000></td>
<td><input name=pesoDifesa<?=$i?> class=empty style="width:40px;" value="<?=$values["pesoDifesa".$i]?>"></td>
<td bgcolor=000000></td>
<td><input name=velocitaDifesa<?=$i?> class=empty style="width:42px;" value="<?=$values["velocitaDifesa".$i]?>"></td>
<td bgcolor=000000></td>
<td><input name=fallimentoDifesa<?=$i?> class=empty style="width:50px;" value="<?=$values["fallimentoDifesa".$i]?>"></td>
<td bgcolor=000000></td>
<td><input name=penalitaDifesa<?=$i?> class=empty style="width:42px;" value="<?=$values["penalitaDifesa".$i]?>"></td>
<td bgcolor=000000></td>
</tr>
<tr><td colspan=13 height=2 bgcolor=000000></td></tr>
</table>
</div>

<?php } ?>




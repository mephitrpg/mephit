<?php
$y_top="499";
$y_select="555";
$y_range="99";
for($i=1;$i<=5;$i++){
?>
<!-- <?=$i+8?> -->
<div style="top:<?=($y_top-$y_range)+($i*$y_range)?>px;left:0px;">
<!-- <table border=1 cellpadding=4 cellspacing=0 bordercolor="#000000"><tr><td><textarea style=width:200;height:195;>Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo Il mio testo va a capo </textarea></td></tr></table>
 -->
<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td width=2 rowspan=2 bgcolor=000000></td>
<td colspan=3 class=cell-black rowspan=2 align=center><?=$_LANG["attack"]?></td>
<td width=1></td>
<td height=10></td>
<td width=1></td>
<td></td>
<td width=1></td>
<td></td>
</tr>
<tr align=center>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["attack_bonus"]?></b></span></td>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["damage"]?></b></span></td>
<td width=1></td>
<td class=cell-black><span class=under><b><?=$_LANG["critical"]?></b></span></td>
<td width=1 bgcolor=000000></td>
</tr>
<tr>
<td bgcolor=000000></td>
<td colspan=3><input name=attacco<?=$i?> class=empty style="width:110px;" value="<?=$values["attacco".$i]?>"></td>
<td width=1 bgcolor=000000></td>
<td><input name=bab<?=$i?> class=empty style="width:83px;" value="<?=$values["bab".$i]?>"></td>
<td width=1 bgcolor=000000></td>
<td><input name=danni<?=$i?> class=empty style="width:60px;" value="<?=$values["danni".$i]?>"></td>
<td width=1 bgcolor=000000></td>
<td><input name=critico<?=$i?> class=empty style="width:60px;" value="<?=$values["critico".$i]?>"></td>
<td width=2 bgcolor=000000></td>
</tr>
<tr><td colspan=11 height=1 bgcolor=000000></td></tr>
<tr>
<td bgcolor=000000></td>
<td class=cell-black><span class=under><b><?=$_LANG["range"]?></b></span></td>
<td></td>
<td class=cell-black><span class=under><b><?=$_LANG["type"]?></b></span></td>
<td></td>
<td colspan=3 class=cell-black><span class=under><b><?=$_LANG["notes"]?></b></span></td>
<td></td>
<td class=cell-black><span class=under><b><?=$_LANG["ammunition"]?></b></span></td>
<td bgcolor=000000></td>
</tr>
<tr>
<td bgcolor=000000></td>
<td><input name=gittata<?=$i?> class=empty style="width:40px;" value="<?=$values["gittata".$i]?>"></td>
<td bgcolor=000000></td>
<td><input name=tipoAttacco<?=$i?>_print class=empty style="width:69px;" value="<?=$values["tipoAttacco".$i."_string"]?>" readonly>
<select name=tipoAttacco<?=$i?> class=text style="width:69px;display:none;" onchange="document.f.elements[this.name+'_print'].value=this.options[this.options.selectedIndex].text;">
<option value=0>
<option value=1<?=($values["tipoAttacco".$i]==1)?" selected":""?>><?=$_LANG["slashing"]."\n"?>
<option value=2<?=($values["tipoAttacco".$i]==2)?" selected":""?>><?=$_LANG["piercing"]."\n"?>
<option value=3<?=($values["tipoAttacco".$i]==3)?" selected":""?>><?=$_LANG["bludgeoning"]."\n"?>
</select></td>
<td bgcolor=000000></td>
<td colspan=3><input name=noteAttacco<?=$i?> class=empty style="width:144px;" value="<?=$values["noteAttacco".$i]?>"></td>
<td bgcolor=000000></td>
<td><input name=munizioni<?=$i?> class=empty style="width:60px;" value="<?=$values["munizioni".$i]?>"></td>
<td bgcolor=000000></td>
</tr>
<tr><td colspan=11 height=2 bgcolor=000000></td></tr>
</table>
</div>

<?php } ?>

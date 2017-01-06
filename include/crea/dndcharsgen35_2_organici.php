<?php
$BODY.='
<form name="f" action="'.$_SERVER[PHP_SELF].'?dndtool='.$_GET["dndtool"].'&step=3" method="post">
<table border=0 cellpadding=4 cellspacing=0 id="tableCAR">
<input type="hidden" name="metodo" value="organici">
<tr>
<th>Scegli</th>
<th>Caratt</th>
<th>Punt</th>
<th>Mod</th>
</tr>
<tr align=center>
<td><input type="radio" name="rilancio" value="for" checked></td>
<td align="right">FOR</td>
<td><input name=for size=2 value="'.$for.'" readonly></td>
<td><input name=modFOR size=2 value="'.M($for).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="rilancio" value="des"></td>
<td align="right">DES</td>
<td><input name=des size=2 value="'.$des.'" readonly></td>
<td><input name=modDES size=2 value="'.M($des).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="rilancio" value="cos"></td>
<td align="right">COS</td>
<td><input name=cos size=2 value="'.$cos.'" readonly></td>
<td><input name=modCOS size=2 value="'.M($cos).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="rilancio" value="int"></td>
<td align="right">INT</td>
<td><input name=int size=2 value="'.$int.'" readonly></td>
<td><input name=modINT size=2 value="'.M($int).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="rilancio" value="sag"></td>
<td align="right">SAG</td>
<td><input name=sag size=2 value="'.$sag.'" readonly></td>
<td><input name=modSAG size=2 value="'.M($sag).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="rilancio" value="car"></td>
<td align="right">CAR</td>
<td><input name=car size=2 value="'.$car.'" readonly></td>
<td><input name=modCAR size=2 value="'.M($car).'" readonly></td>
</tr>
</table><br />
<input type="submit" value="Rilancia" class="btn">
</form>
';
?>
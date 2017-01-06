<?php
#FORM
$BODY.='<script>
P=new Array('.implode(",",$acquisto[dnd]).');
pmax='.$punti_residui.';
</script>
<table border=0 cellpadding=4 cellspacing=0 id="tableCAR">
<tr>
<th>Caratt</th>
<th>Punt</th>
<th>Punti<br>residui</th>
<th>Bonus<br>Razza</th>
<th>Punt<br>Tot</th>
<th>Mod</th>
</tr>
<tr>
<td align="right">FOR</td>
<td><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input size=2 class="txt" name=punNobonusFOR style="text-align:right;" readonly value="'.$for.'"></td>
<td><input type=button class="plus" onclick="this.blur();add(1,\'FOR\');"><input type=button class="null"><br>
<input type=button class="minus" onclick="this.blur();add(-1,\'FOR\');"><input type=button class="down" onclick="this.blur();sposta(\'FOR\',\'DES\')"></td>
</tr></table></td>
<td rowspan="6" align="center"><input size=2 name=pun_tot style="text-align:center;" readonly value="'.$punti_residui.'"></td>
<td align="center"><input size=2 name=razFOR style="text-align:right;" readonly value="0"></td>
<td><input size=2 name=punFOR style="text-align:right;" readonly value="'.$for.'"></td>
<td><input size=2 name=modFOR style="text-align:right;" readonly value="'.M($for).'"></td>
</tr>
<tr>
<td align="right">DES</td>
<td><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input size=2 class="txt" name=punNobonusDES style="text-align:right;" readonly value="'.$des.'"></td>
<td><input type=button class="plus" onclick="this.blur();add(1,\'DES\');"><input type=button class="up" onclick="this.blur();sposta(\'DES\',\'FOR\')"><br>
<input type=button class="minus" onclick="this.blur();add(-1,\'DES\');"><input type=button class="down" onclick="this.blur();sposta(\'DES\',\'COS\')"></td>
</tr></table></td>
<td align="center"><input size=2 name=razDES style="text-align:right;" readonly value="0"></td>
<td><input size=2 name=punDES style="text-align:right;" readonly value="'.$des.'"></td>
<td><input size=2 name=modDES style="text-align:right;" readonly value="'.M($des).'"></td>
</tr>
<tr>
<td align="right">COS</td>
<td><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input size=2 class="txt" name=punNobonusCOS style="text-align:right;" readonly value="'.$cos.'"></td>
<td><input type=button class="plus" onclick="this.blur();add(1,\'COS\');"><input type=button class="up" onclick="this.blur();sposta(\'COS\',\'DES\')"><br>
<input type=button class="minus" onclick="this.blur();add(-1,\'COS\');"><input type=button class="down" onclick="this.blur();sposta(\'COS\',\'INT\')"></td>
</tr></table></td>
<td align="center"><input size=2 name=razCOS style="text-align:right;" readonly value="0"></td>
<td><input size=2 name=punCOS style="text-align:right;" readonly value="'.$cos.'"></td>
<td><input size=2 name=modCOS style="text-align:right;" readonly value="'.M($cos).'"></td>
</tr>
<tr>
<td align="right">INT</td>
<td><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input size=2 class="txt" name=punNobonusINT style="text-align:right;" readonly value="'.$int.'"></td>
<td><input type=button class="plus" onclick="this.blur();add(1,\'INT\');"><input type=button class="up" onclick="this.blur();sposta(\'INT\',\'COS\')"><br>
<input type=button class="minus" onclick="this.blur();add(-1,\'INT\');"><input type=button class="down" onclick="this.blur();sposta(\'INT\',\'SAG\')"></td>
</tr></table></td>
<td align="center"><input size=2 name=razINT style="text-align:right;" readonly value="0"></td>
<td><input size=2 name=punINT style="text-align:right;" readonly value="'.$int.'"></td>
<td><input size=2 name=modINT style="text-align:right;" readonly value="'.M($int).'"></td>
</tr>
<tr>
<td align="right">SAG</td>
<td><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input size=2 class="txt" name=punNobonusSAG style="text-align:right;" readonly value="'.$sag.'"></td>
<td><input type=button class="plus" onclick="this.blur();add(1,\'SAG\');"><input type=button class="up" onclick="this.blur();sposta(\'SAG\',\'INT\')"><br>
<input type=button class="minus" onclick="this.blur();add(-1,\'SAG\');"><input type=button class="down" onclick="this.blur();sposta(\'SAG\',\'CAR\')"></td>
</tr></table></td>
<td align="center"><input size=2 name=razSAG style="text-align:right;" readonly value="0"></td>
<td><input size=2 name=punSAG style="text-align:right;" readonly value="'.$sag.'"></td>
<td><input size=2 name=modSAG style="text-align:right;" readonly value="'.M($sag).'"></td>
</tr>
<tr>
<td align="right">CAR</td>
<td><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input size=2 class="txt" name=punNobonusCAR style="text-align:right;" readonly value="'.$car.'"></td>
<td><input type=button class="plus" onclick="this.blur();add(1,\'CAR\');"><input type=button class="up" onclick="this.blur();sposta(\'CAR\',\'SAG\')"><br>
<input type=button class="minus" onclick="this.blur();add(-1,\'CAR\');"><input type=button class="null"></td>
</tr></table></td>
<td align="center"><input size=2 name=razCAR style="text-align:right;" readonly value="0"></td>
<td><input size=2 name=punCAR style="text-align:right;" readonly value="'.$car.'"></td>
<td><input size=2 name=modCAR style="text-align:right;" readonly value="'.M($car).'"></td>
</tr>
</table>
';
?>
<?php
#FORM
$BODY.='<script src="js/dndtools/dndcharsgen35_mephit.js"></script>
<table border=0 cellpadding=4 cellspacing=0 id="tableCAR">
<input type=hidden name=togliMettiTemp>
<tr>
<th>Caratt</th>
<th>Punt</th>
<th>Bonus<br>Razza</th>
<th colspan=3>Togli 2, Metti 1</th>
<th>Punt<br>Tot</th>
<th>Mod</th>
</tr>
<tr align=center>
<td align="right">FOR</td>
<td align=left><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input class="txt" name=punNobonusFOR size=2 value="'.$for.'" readonly></td>
<td><input type=button class="null"><br>
<input type=button class="down" onclick="this.blur();sposta(\'FOR\',\'DES\')"></td>
</tr></table></td>
<td><input name=razFOR size=2 value=0 readonly></td>
<td><input type=button class="btn" name=togliFOR value=-2 onclick="togli(\'FOR\')" style="width:30px;"><input type=button class="btn" name=mettiFOR onclick="metti(\'FOR\')" value=+1 style="width:30px;" disabled></td>
<td><input name=_21FOR size=2 value=0 readonly></td>
<td rowspan=6>Scambi punti:<br><select name=togliMettiTot size=7 style="width:86px;"></select><br><input type=button class="btn" name=togliMettiElimina onclick="togliMettiElimina_doIt()" value="Elimina" style="width:86px;text-align:center;" disabled><br><input type=button class="btn" name=togliMettiAnnulla value="Annulla" onclick="togliMettiAnnulla_doIt()" style="width:86px;text-align:center;" disabled></td>
<td><input name=punFOR size=2 value="'.$for.'" readonly></td>
<td><input name=modFOR size=2 value="'.M($for).'" readonly></td>
</tr>
<tr align=center>
<td align="right">DES</td>
<td align=left><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input class="txt" name=punNobonusDES size=2 value="'.$des.'" readonly></td>
<td><input type=button class="up" onclick="this.blur();sposta(\'DES\',\'FOR\')"><br>
<input type=button class="down" onclick="this.blur();sposta(\'DES\',\'COS\')"></td>
</tr></table></td>
<td><input name=razDES size=2 value=0 readonly></td>
<td><input type=button class="btn" name=togliDES value=-2 onclick=togli("DES") style="width:30px;"><input type=button class="btn" name=mettiDES onclick=metti("DES") value=+1 style="width:30px;" disabled></td>
<td><input name=_21DES size=2 value=0 readonly></td>
<td><input name=punDES size=2 value="'.$des.'" readonly></td>
<td><input name=modDES size=2 value="'.M($des).'" readonly></td>
</tr>
<tr align=center>
<td align="right">COS</td>
<td align=left><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input class="txt" name=punNobonusCOS size=2 value="'.$cos.'" readonly></td>
<td><input type=button class="up" onclick="this.blur();sposta(\'COS\',\'DES\')"><br>
<input type=button class="down" onclick="this.blur();sposta(\'COS\',\'INT\')"></td>
</tr></table></td>
<td><input name=razCOS size=2 value=0 readonly></td>
<td><input type=button class="btn" name=togliCOS value=-2 onclick=togli("COS") style="width:30px;"><input type=button class="btn" name=mettiCOS onclick=metti("COS") value=+1 style="width:30px;" disabled></td>
<td><input name=_21COS size=2 value=0 readonly></td>
<td><input name=punCOS size=2 value="'.$cos.'" readonly></td>
<td><input name=modCOS size=2 value="'.M($cos).'" readonly></td>
</tr>
<tr align=center>
<td align="right">INT</td>
<td align=left><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input class="txt" name=punNobonusINT size=2 value="'.$int.'" readonly></td>
<td><input type=button class="up" onclick="this.blur();sposta(\'INT\',\'COS\')"><br>
<input type=button class="down" onclick="this.blur();sposta(\'INT\',\'SAG\')"></td>
</tr></table></td>
<td><input name=razINT size=2 value=0 readonly></td>
<td><input type=button class="btn" name=togliINT value=-2 onclick=togli("INT") style="width:30px;"><input type=button class="btn" name=mettiINT onclick=metti("INT") value=+1 style="width:30px;" disabled></td>
<td><input name=_21INT size=2 value=0 readonly></td>
<td><input name=punINT size=2 value="'.$int.'" readonly></td>
<td><input name=modINT size=2 value="'.M($int).'" readonly></td>
</tr>
<tr align=center>
<td align="right">SAG</td>
<td align=left><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input class="txt" name=punNobonusSAG size=2 value="'.$sag.'" readonly></td>
<td><input type=button class="up" onclick="this.blur();sposta(\'SAG\',\'INT\')"><br>
<input type=button class="down" onclick="this.blur();sposta(\'SAG\',\'CAR\')"></td>
</tr></table></td>
<td><input name=razSAG size=2 value=0 readonly></td>
<td><input type=button class="btn" name=togliSAG value=-2 onclick=togli("SAG") style="width:30px;"><input type=button class="btn" name=mettiSAG onclick=metti("SAG") value=+1 style="width:30px;" disabled></td>
<td><input name=_21SAG size=2 value=0 readonly></td>
<td><input name=punSAG size=2 value="'.$sag.'" readonly></td>
<td><input name=modSAG size=2 value="'.M($sag).'" readonly></td>
</tr>
<tr align=center>
<td align="right">CAR</td>
<td align=left><table border=0 cellpadding=0 cellspacing=0 id="tabellaStruttura"><tr>
<td><input class="txt" name=punNobonusCAR size=2 value="'.$car.'" readonly></td>
<td><input type=button class="up" onclick="this.blur();sposta(\'CAR\',\'SAG\')"><br>
<input type=button class="null"></td>
</tr></table></td>
<td><input name=razCAR size=2 value=0 readonly></td>
<td><input type=button class="btn" name=togliCAR value=-2 onclick=togli("CAR") style="width:30px;"><input type=button class="btn" name=mettiCAR onclick=metti("CAR") value=+1 style="width:30px;" disabled></td>
<td><input name=_21CAR size=2 value=0 readonly></td>
<td><input name=punCAR size=2 value="'.$car.'" readonly></td>
<td><input name=modCAR size=2 value="'.M($car).'" readonly></td>
</tr>
</table>
';
?>
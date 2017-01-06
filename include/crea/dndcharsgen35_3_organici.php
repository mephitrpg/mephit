<?php
#FORM
$query_roll="SELECT * FROM mephit_crea_personaggio WHERE fk_giocatore=".$_SESSION[user_id]." AND  step>=3";
$result_roll=mysql_query($query_roll);
if(mysql_num_rows($result_roll)==0){
	$_POST[$_POST["rilancio"]]=rollAndDiscardLower("4d6",1);
	$for=$_POST["for"];
	$des=$_POST["des"];
	$cos=$_POST["cos"];
	$int=$_POST["int"];
	$sag=$_POST["sag"];
	$car=$_POST["car"];
	$query_upStep="UPDATE mephit_crea_personaggio SET step=3,_for=".$for.",_des=".$des.",_cos=".$cos.",_int=".$int.",_sag=".$sag.",_car=".$car." WHERE fk_giocatore=".$_SESSION[user_id];
	$result_upStep=mysql_query($query_upStep);
}else{
	while($row_roll=mysql_fetch_array($result_roll)){
		$for=$row_roll[_for];
		$des=$row_roll[_des];
		$cos=$row_roll[_cos];
		$int=$row_roll[_int];
		$sag=$row_roll[_sag];
		$car=$row_roll[_car];
	}
}

$BODY.='<script src="js/dndtools/dndcharsgen_organici.js"></script>
<table border=0 cellpadding=4 cellspacing=0 id="tableCAR">
<input type="hidden" name="metodo" value="organici">
<tr>
<th colspan="2">Scambia<br />Caratteristiche</th>
<th>Caratt</th>
<th>Punt</th>
<th>Bonus<br>Razza</th>
<th>Punt<br>Tot</th>
<th>Mod</th>
</tr>
<tr align=center>
<td><input type="radio" name="car0" value="for" onclick="controllaScambio(0,0)" checked></td>
<td><input type="radio" name="car1" value="for" onclick="controllaScambio(1,0)"></td>
<td align="right">FOR</td>
<td><input name=punNobonusFOR size=2 value="'.$for.'" readonly></td>
<td><input name=razFOR size=2 value=0 readonly></td>
<td><input name=punFOR size=2 value="'.$for.'" readonly></td>
<td><input name=modFOR size=2 value="'.M($for).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="car0" value="des" onclick="controllaScambio(0,1)"></td>
<td><input type="radio" name="car1" value="des" onclick="controllaScambio(1,1)" checked></td>
<td align="right">DES</td>
<td><input name=punNobonusDES size=2 value="'.$des.'" readonly></td>
<td><input name=razDES size=2 value=0 readonly></td>
<td><input name=punDES size=2 value="'.$des.'" readonly></td>
<td><input name=modDES size=2 value="'.M($des).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="car0" value="cos" onclick="controllaScambio(0,2)"></td>
<td><input type="radio" name="car1" value="cos" onclick="controllaScambio(1,2)"></td>
<td align="right">COS</td>
<td><input name=punNobonusCOS size=2 value="'.$cos.'" readonly></td>
<td><input name=razCOS size=2 value=0 readonly></td>
<td><input name=punCOS size=2 value="'.$cos.'" readonly></td>
<td><input name=modCOS size=2 value="'.M($cos).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="car0" value="int" onclick="controllaScambio(0,3)"></td>
<td><input type="radio" name="car1" value="int" onclick="controllaScambio(1,3)"></td>
<td align="right">INT</td>
<td><input name=punNobonusINT size=2 value="'.$int.'" readonly></td>
<td><input name=razINT size=2 value=0 readonly></td>
<td><input name=punINT size=2 value="'.$int.'" readonly></td>
<td><input name=modINT size=2 value="'.M($int).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="car0" value="sag" onclick="controllaScambio(0,4)"></td>
<td><input type="radio" name="car1" value="sag" onclick="controllaScambio(1,4)"></td>
<td align="right">SAG</td>
<td><input name=punNobonusSAG size=2 value="'.$sag.'" readonly></td>
<td><input name=razSAG size=2 value=0 readonly></td>
<td><input name=punSAG size=2 value="'.$sag.'" readonly></td>
<td><input name=modSAG size=2 value="'.M($sag).'" readonly></td>
</tr>
<tr align=center>
<td><input type="radio" name="car0" value="car" onclick="controllaScambio(0,5)"></td>
<td><input type="radio" name="car1" value="car" onclick="controllaScambio(1,5)"></td>
<td align="right">CAR</td>
<td><input name=punNobonusCAR size=2 value="'.$car.'" readonly></td>
<td><input name=razCAR size=2 value=0 readonly></td>
<td><input name=punCAR size=2 value="'.$car.'" readonly></td>
<td><input name=modCAR size=2 value="'.M($car).'" readonly></td>
</tr>
<tr align=center>
<td colspan="2"><input type="button" class="btn" name="btnScambia" value="Scambia" onclick="scambia(this.name)" style="width:120px;"></td>
<td colspan="5">&nbsp;</td>
</tr>
</table>
';
?>
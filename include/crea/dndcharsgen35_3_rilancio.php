<?php
#FORM
$query_roll="SELECT * FROM mephit_crea_personaggio WHERE fk_giocatore=".$_SESSION[user_id]." AND lanci!=''";
$result_roll=mysql_query($query_roll);

if(mysql_num_rows($result_roll)>0){
	if(!isset($_POST["for"])){
		while($row_roll=mysql_fetch_array($result_roll)){
			$t=split(",",$row_roll[lanci]);
			$_POST["for"]=serialize(array($t[0],$t[1],$t[2],$t[3]));
			$_POST["des"]=serialize(array($t[4],$t[5],$t[6],$t[7]));
			$_POST["cos"]=serialize(array($t[8],$t[9],$t[10],$t[11]));
			$_POST["int"]=serialize(array($t[12],$t[13],$t[14],$t[15]));
			$_POST["sag"]=serialize(array($t[16],$t[17],$t[18],$t[19]));
			$_POST["car"]=serialize(array($t[20],$t[21],$t[22],$t[23]));
		}
	}else{
		$_POST["for"]=unserialize(stripslashes($_POST["for"]));
		$_POST["des"]=unserialize(stripslashes($_POST["des"]));
		$_POST["cos"]=unserialize(stripslashes($_POST["cos"]));
		$_POST["int"]=unserialize(stripslashes($_POST["int"]));
		$_POST["sag"]=unserialize(stripslashes($_POST["sag"]));
		$_POST["car"]=unserialize(stripslashes($_POST["car"]));
	}
	
	if( $_POST["rilancio"]!="none" ){
		sort($_POST[$_POST["rilancio"]]);
		$_POST[$_POST["rilancio"]]=array_splice($_POST[$_POST["rilancio"]],1-count($_POST[$_POST["rilancio"]]));
		$_POST[$_POST["rilancio"]][]=D(6);
	}
	sort($_POST["for"]);
	$for=array_sum(array_splice($_POST["for"],1-count($_POST["for"])));
	sort($_POST["des"]);
	$des=array_sum(array_splice($_POST["des"],1-count($_POST["des"])));
	sort($_POST["cos"]);
	$cos=array_sum(array_splice($_POST["cos"],1-count($_POST["cos"])));
	sort($_POST["int"]);
	$int=array_sum(array_splice($_POST["int"],1-count($_POST["int"])));
	sort($_POST["sag"]);
	$sag=array_sum(array_splice($_POST["sag"],1-count($_POST["sag"])));
	sort($_POST["car"]);
	$car=array_sum(array_splice($_POST["car"],1-count($_POST["car"])));
	$query_upStep="UPDATE mephit_crea_personaggio SET step=3,lanci='',_for=".$for.",_des=".$des.",_cos=".$cos.",_int=".$int.",_sag=".$sag.",_car=".$car." WHERE fk_giocatore=".$_SESSION[user_id];
	$result_upStep=mysql_query($query_upStep);
}else{
	$query_roll="SELECT * FROM mephit_crea_personaggio WHERE fk_giocatore=".$_SESSION[user_id];
	$result_roll=mysql_query($query_roll);
	if(mysql_num_rows($result_roll)>0){
		while($row_roll=mysql_fetch_array($result_roll)){
			$for=$row_roll[_for];
			$des=$row_roll[_des];
			$cos=$row_roll[_cos];
			$int=$row_roll[_int];
			$sag=$row_roll[_sag];
			$car=$row_roll[_car];
		}
	}else{
		if(isset($_POST["for"])){
			$_POST["for"]=unserialize(stripslashes($_POST["for"]));
			$_POST["des"]=unserialize(stripslashes($_POST["des"]));
			$_POST["cos"]=unserialize(stripslashes($_POST["cos"]));
			$_POST["int"]=unserialize(stripslashes($_POST["int"]));
			$_POST["sag"]=unserialize(stripslashes($_POST["sag"]));
			$_POST["car"]=unserialize(stripslashes($_POST["car"]));
			sort($_POST["for"]);
			$for=array_sum(array_splice($_POST["for"],1-count($_POST["for"])));
			sort($_POST["des"]);
			$des=array_sum(array_splice($_POST["des"],1-count($_POST["des"])));
			sort($_POST["cos"]);
			$cos=array_sum(array_splice($_POST["cos"],1-count($_POST["cos"])));
			sort($_POST["int"]);
			$int=array_sum(array_splice($_POST["int"],1-count($_POST["int"])));
			sort($_POST["sag"]);
			$sag=array_sum(array_splice($_POST["sag"],1-count($_POST["sag"])));
			sort($_POST["car"]);
			$car=array_sum(array_splice($_POST["car"],1-count($_POST["car"])));
			$query_upStep="UPDATE mephit_crea_personaggio SET step=3,lanci='',_for=".$for.",_des=".$des.",_cos=".$cos.",_int=".$int.",_sag=".$sag.",_car=".$car." WHERE fk_giocatore=".$_SESSION[user_id];
			$result_upStep=mysql_query($query_upStep);
		}
	}
}

$BODY.='
<table border=0 cellpadding=4 cellspacing=0 id="tableCAR">
<tr>
<th>Caratt</th>
<th>Punt</th>
<th>Bonus<br>Razza</th>
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
<td><input name=punCAR size=2 value="'.$car.'" readonly></td>
<td><input name=modCAR size=2 value="'.M($car).'" readonly></td>
</tr>
</table>
';
?>
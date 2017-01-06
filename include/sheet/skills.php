<?php
# Creo un array con tutte le proprietà di ogni abilità
$skills_properties=array(
	"appraise"				=>	array(
									"name"			=>	$_LANG["appraise"],
									"name_field"	=>	"appraise",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["int"],
									"char_value"	=>	$values["_int_mod"]
								),
	"balance"				=>	array(
									"name"			=>	$_LANG["balance"],
									"name_field"	=>	"balance",
									"training"		=>	false,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["dex"],
									"char_value"	=>	$values["_des_mod"]
								),
	"bluff"					=>	array(
									"name"			=>	$_LANG["bluff"],
									"name_field"	=>	"bluff",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["cha"],
									"char_value"	=>	$values["_car_mod"]
								),
	"climb"					=>	array(
									"name"			=>	$_LANG["climb"],
									"name_field"	=>	"climb",
									"training"		=>	false,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["str"],
									"char_value"	=>	$values["_for_mod"]
								),
	"concentration"			=>	array(
									"name"			=>	$_LANG["concentration"],
									"name_field"	=>	"concentration",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["con"],
									"char_value"	=>	$values["_cos_mod"]
								),
	"craft"					=>	array(
									"name"			=>	$_LANG["craft"],
									"name_field"	=>	"craft",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["int"],
									"char_value"	=>	$values["_int_mod"]
								),
	"deciphter_script"		=>	array(
									"name"			=>	$_LANG["deciphter_script"],
									"name_field"	=>	"deciphter_script",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["int"],
									"char_value"	=>	$values["_int_mod"]
								),
	"diplomacy"				=>	array(
									"name"			=>	$_LANG["diplomacy"],
									"name_field"	=>	"diplomacy",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["cha"],
									"char_value"	=>	$values["_car_mod"]
								),
	"disable_device"		=>	array(
									"name"			=>	$_LANG["disable_device"],
									"name_field"	=>	"disable_device",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["int"],
									"char_value"	=>	$values["_int_mod"]
								),
	"disguise"				=>	array(
									"name"			=>	$_LANG["disguise"],
									"name_field"	=>	"disguise",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["cha"],
									"char_value"	=>	$values["_car_mod"]
								),
	"escape_artist"			=>	array(
									"name"			=>	$_LANG["escape_artist"],
									"name_field"	=>	"escape_artist",
									"training"		=>	false,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["dex"],
									"char_value"	=>	$values["_des_mod"]
								),
	"forgery"				=>	array(
									"name"			=>	$_LANG["forgery"],
									"name_field"	=>	"forgery",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["int"],
									"char_value"	=>	$values["_int_mod"]
								),
	"gather_information"	=>	array(
									"name"			=>	$_LANG["gather_information"],
									"name_field"	=>	"gather_information",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["cha"],
									"char_value"	=>	$values["_car_mod"]
								),
	"handle_animal"			=>	array(
									"name"			=>	$_LANG["handle_animal"],
									"name_field"	=>	"handle_animal",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["cha"],
									"char_value"	=>	$values["_car_mod"]
								),
	"heal"					=>	array(
									"name"			=>	$_LANG["heal"],
									"name_field"	=>	"heal",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["wis"],
									"char_value"	=>	$values["_sag_mod"]
								),
	"hide"					=>	array(
									"name"			=>	$_LANG["hide"],
									"name_field"	=>	"hide",
									"training"		=>	true,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["dex"],
									"char_value"	=>	$values["_des_mod"]
								),
	"intimidate"			=>	array(
									"name"			=>	$_LANG["intimidate"],
									"name_field"	=>	"intimidate",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["cha"],
									"char_value"	=>	$values["_car_mod"]
								),
	"jump"					=>	array(
									"name"			=>	$_LANG["jump"],
									"name_field"	=>	"jump",
									"training"		=>	false,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["str"],
									"char_value"	=>	$values["_for_mod"]
								),
	"knowledge"				=>	array(
									"name"			=>	$_LANG["knowledge"],
									"name_field"	=>	"knowledge",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["int"],
									"char_value"	=>	$values["_int_mod"]
								),
	"listen"				=>	array(
									"name"			=>	$_LANG["listen"],
									"name_field"	=>	"listen",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["wis"],
									"char_value"	=>	$values["_sag_mod"]
								),
	"move_silently"			=>	array(
									"name"			=>	$_LANG["move_silently"],
									"name_field"	=>	"move_silently",
									"training"		=>	false,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["dex"],
									"char_value"	=>	$values["_des_mod"]
								),
	"open_lock"				=>	array(
									"name"			=>	$_LANG["open_lock"],
									"name_field"	=>	"open_lock",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["dex"],
									"char_value"	=>	$values["_des_mod"]
								),
	"perform"				=>	array(
									"name"			=>	$_LANG["perform"],
									"name_field"	=>	"perform",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["cha"],
									"char_value"	=>	$values["_car_mod"]
								),
	"profession"			=>	array(
									"name"			=>	$_LANG["profession"],
									"name_field"	=>	"profession",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["wis"],
									"char_value"	=>	$values["_sag_mod"]
								),
	"ride"					=>	array(
									"name"			=>	$_LANG["ride"],
									"name_field"	=>	"ride",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["dex"],
									"char_value"	=>	$values["_des_mod"]
								),
	"search"				=>	array(
									"name"			=>	$_LANG["search"],
									"name_field"	=>	"search",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["int"],
									"char_value"	=>	$values["_int_mod"]
								),
	"sense_motive"			=>	array(
									"name"			=>	$_LANG["sense_motive"],
									"name_field"	=>	"sense_motive",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["wis"],
									"char_value"	=>	$values["_sag_mod"]
								),
	"sleight_of_hand"		=>	array(
									"name"			=>	$_LANG["sleight_of_hand"],
									"name_field"	=>	"sleight_of_hand",
									"training"		=>	true,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["dex"],
									"char_value"	=>	$values["_des_mod"]
								),
	"spellcraft"			=>	array(
									"name"			=>	$_LANG["spellcraft"],
									"name_field"	=>	"spellcraft",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["int"],
									"char_value"	=>	$values["_int_mod"]
								),
	"spot"					=>	array(
									"name"			=>	$_LANG["spot"],
									"name_field"	=>	"spot",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["wis"],
									"char_value"	=>	$values["_sag_mod"]
								),
	"survival"				=>	array(
									"name"			=>	$_LANG["survival"],
									"name_field"	=>	"survival",
									"training"		=>	false,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["wis"],
									"char_value"	=>	$values["_sag_mod"]
								),
	"swim"					=>	array(
									"name"			=>	$_LANG["swim"],
									"name_field"	=>	"swim",
									"training"		=>	false,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["str"],
									"char_value"	=>	$values["_for_mod"]
								),
	"tumble"				=>	array(
									"name"			=>	$_LANG["tumble"],
									"name_field"	=>	"tumble",
									"training"		=>	true,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["dex"],
									"char_value"	=>	$values["_des_mod"]
								),
	"use_magic_device"		=>	array(
									"name"			=>	$_LANG["use_magic_device"],
									"name_field"	=>	"use_magic_device",
									"training"		=>	true,
									"penality"		=>	false,
									"char_name"		=>	$_LANG["cha"],
									"char_value"	=>	$values["_car_mod"]
								),
	"use_rope"				=>	array(
									"name"			=>	$_LANG["use_rope"],
									"name_field"	=>	"use_rope",
									"training"		=>	false,
									"penality"		=>	true,
									"char_name"		=>	$_LANG["dex"],
									"char_value"	=>	$values["_des_mod"]
								)
);

# Non conoscendo la lingua, per elencare in ordine alfabetico le abilità facciamo riferimento agli indici dell'array. Usiamo la funzione "asort" che ordina in ordine alfabetico gli elementi di un array mantenendo l'associazione degli indici.
$skills_order=array(
	"appraise"				=>	$_LANG["appraise"],
	"balance"				=>	$_LANG["balance"],
	"bluff"					=>	$_LANG["bluff"],
	"climb"					=>	$_LANG["climb"],
	"concentration"			=>	$_LANG["concentration"],
	"craft"					=>	$_LANG["craft"],
	"deciphter_script"		=>	$_LANG["deciphter_script"],
	"diplomacy"				=>	$_LANG["diplomacy"],
	"disable_device"		=>	$_LANG["disable_device"],
	"disguise"				=>	$_LANG["disguise"],
	"escape_artist"			=>	$_LANG["escape_artist"],
	"forgery"				=>	$_LANG["forgery"],
	"gather_information"	=>	$_LANG["gather_information"],
	"handle_animal"			=>	$_LANG["handle_animal"],
	"heal"					=>	$_LANG["heal"],
	"hide"					=>	$_LANG["hide"],
	"intimidate"			=>	$_LANG["intimidate"],
	"jump"					=>	$_LANG["jump"],
	"knowledge"				=>	$_LANG["knowledge"],
	"listen"				=>	$_LANG["listen"],
	"move_silently"			=>	$_LANG["move_silently"],
	"open_lock"				=>	$_LANG["open_lock"],
	"perform"				=>	$_LANG["perform"],
	"profession"			=>	$_LANG["profession"],
	"ride"					=>	$_LANG["ride"],
	"search"				=>	$_LANG["search"],
	"sense_motive"			=>	$_LANG["sense_motive"],
	"sleight_of_hand"		=>	$_LANG["sleight_of_hand"],
	"spellcraft"			=>	$_LANG["spellcraft"],
	"spot"					=>	$_LANG["spot"],
	"survival"				=>	$_LANG["survival"],
	"swim"					=>	$_LANG["swim"],
	"tumble"				=>	$_LANG["tumble"],
	"use_magic_device"		=>	$_LANG["use_magic_device"],
	"use_rope"				=>	$_LANG["use_rope"]
);
asort($skills_order);
$skills_order=array_keys($skills_order);

$skills=array();
foreach($skills_order as $t){
	$skills[]=$skills_properties[$t];
}
?>

<script>
function check(q){
	var t;
	switch(document.f.elements[q].value){
		case"0":	t=2;	break;
		case"1":	t=0;	break;
		case"2":	t=1;	break;
	}
	document.f.elements[q].value=t;
	document.images["xskill_"+q].src="images/sheet/chk"+t+".gif";
}
</script>
<tr align="center">
<td style="font:8px 'arial narrow'" align=center><?=$_LANG["cc"]?></td>
<td width="125" style="font:8px 'arial narrow'" nowrap align=left><?=$_LANG["skill_name"]?></td>
<td style="font:8px 'arial narrow'"><?=$_LANG["key_ability"]?></td>
<td style="font:8px 'arial narrow'"><?=$_LANG["skill_modifier"]?></td>
<td></td>
<td style="font:8px 'arial narrow'"><?=$_LANG["ability_modifier"]?></td>
<td></td>
<td style="font:8px 'arial narrow'"><?=$_LANG["ranks"]?></td>
<td></td>
<td style="font:8px 'arial narrow'"><?=$_LANG["misc_modifier"]?></td>
</tr>
<tr><td colspan="10" height="1" bgcolor="#000000"></td></tr>

<?php
$skill_count=array(
	"craft"			=>	3,
	"knowledge"		=>	5,
	"perform"		=>	3,
	"profession"	=>	2
);
foreach($skills as $s){
	if( in_array($s["name_field"],array_keys($skill_count)) ){
		$quanteCopie=$skill_count[$s["name_field"]];
	}else{
		$quanteCopie=1;
	}
	for($i=0;$i<$quanteCopie;$i++){
		if( in_array($s["name_field"],array_keys($skill_count)) ){
			$counter="_".($i+1);
			$field_free=" (<input name=\"".$s["name_field"]."_free".$counter."\" value=\"".htmlspecialchars($values[$s["name_field"]."_free".$counter])."\" class=text style=\"width:40px;\">)";
		}else{
			$counter="";
			$field_free="";
		}
		$disabled=($values[$s["name_field"]."_cross".$counter]==2)?true:false;
		if(!$disabled)$cc=($values[$s["name_field"]."_cross".$counter]==0)?true:false;
		$tot=$s["char_value"]+$values[$s["name_field"]."_ranks".$counter]+$values[$s["name_field"]."_misc".$counter];
?>
<tr>
<input type=hidden name=<?=$s["name_field"]?>_cross<?=$counter?> value="<?=$values[$s["name_field"]."_cross".$counter]?>">
<td><img src=images/sheet/chk<?=$values[$s["name_field"]."_cross".$counter]?>.gif border=0 name=xskill_<?=$s["name_field"]?>_cross<?=$counter?> onmouseup="check('<?=$s["name_field"]?>_cross<?=$counter?>')" style="cursor:hand;cursor:pointer"></td>
<td width="125" class=skill nowrap><?=$s["name"].$field_free?><?=$s["training"]?"":" <img src=images/sheet/notraining.gif>"?></td>
<td class=skill><?=$s["char_name"]?><?=($s["penality"])?"*":""?></td>
<td><input name=<?=$s["name_field"]?>_tot<?=$counter?> class=text style="width:20px;text-align:center;" value="<?=$tot?>"></td>
<td style="font:11px arial">=</td>
<td><input name=<?=$s["name_field"]?>_char<?=$counter?> class=text style="width:20px;text-align:center;" value="<?=$s["char_value"]?>" readonly></td>
<td style="font:11px arial">+</td>
<td><input name=<?=$s["name_field"]?>_ranks<?=$counter?> class=text style="width:20px;text-align:center;<?php
// 0 = cc
// 1 = ci
// 2 = disabled
if(!$disabled){
	if( $cc && $values[$s["name_field"]."_ranks".$counter] > $values["grado_classe"] )echo"background-color:#ff0000;color:#ffffff;";
	else if( !$cc && $values[$s["name_field"]."_ranks".$counter] > $values["grado_classe_incrociata"] )echo"background-color:#ff0000;color:#ffffff;";
}
?>" value="<?=$values[$s["name_field"]."_ranks".$counter]?>"></td>
<td style="font:11px arial">+</td>
<td><input name=<?=$s["name_field"]?>_misc<?=$counter?> class=text style="width:20px;text-align:center;" value="<?=$values[$s["name_field"]."_misc".$counter]?>"></td>
</tr>
<?php/*
$query="ALTER TABLE `mephit_personaggio` ADD `".$s["name_field"]."_ranks".$counter."` TINYINT;";
$result=mysql_query($query);
$query="ALTER TABLE `mephit_personaggio` ADD `".$s["name_field"]."_misc".$counter."` TINYINT;";
$result=mysql_query($query);
$query="ALTER TABLE `mephit_personaggio` ADD `".$s["name_field"]."_cross".$counter."` TINYINT;";
$result=mysql_query($query);
if($field_free!=""){
	$query="ALTER TABLE `mephit_personaggio` ADD `".$s["name_field"]."_free".$counter."` TINYINT;";
	$result=mysql_query($query);
}
*/
}}?>
<script>
if(top.menu){
top.menu.rnks=new Array(
	"appraise_ranks",
	"balance_ranks",
	"bluff_ranks",
	"climb_ranks",
	"concentration_ranks",
	"craft_ranks_1",
	"craft_ranks_2",
	"craft_ranks_3",
	"deciphter_script_ranks",
	"diplomacy_ranks",
	"disable_device_ranks",
	"disguise_ranks",
	"escape_artist_ranks",
	"forgery_ranks",
	"gather_information_ranks",
	"handle_animal_ranks",
	"heal_ranks",
	"hide_ranks",
	"intimidate_ranks",
	"jump_ranks",
	"knowledge_ranks_1",
	"knowledge_ranks_2",
	"knowledge_ranks_3",
	"knowledge_ranks_4",
	"knowledge_ranks_5",
	"listen_ranks",
	"move_silently_ranks",
	"open_lock_ranks",
	"perform_ranks_1",
	"perform_ranks_2",
	"perform_ranks_3",
	"profession_ranks_1",
	"profession_ranks_2",
	"ride_ranks",
	"search_ranks",
	"sense_motive_ranks",
	"sleight_of_hand_ranks",
	"spellcraft_ranks",
	"spot_ranks",
	"survival_ranks",
	"swim_ranks",
	"tumble_ranks",
	"use_magic_device_ranks",
	"use_rope_ranks"
);
top.menu.err_chk=new Array();
for(i=0;i<top.menu.rnks.length;i++){
	top.menu.err_chk[top.menu.rnks[i]]=new Array();
	top.menu.err_chk[top.menu.rnks[i]]["colorOff"]=document.f.elements[top.menu.rnks[i]].style.backgroundColor;
	if(top.menu.err_chk[top.menu.rnks[i]]["colorOff"]=="")top.menu.err_chk[top.menu.rnks[i]]["colorOff"]==top.menu.colorOff;
	top.menu.err_chk[top.menu.rnks[i]]["fontOff"]=document.f.elements[top.menu.rnks[i]].style.color;
	if(top.menu.err_chk[top.menu.rnks[i]]["fontOff"]=="")top.menu.err_chk[top.menu.rnks[i]]["fontOff"]==top.menu.colorOff;
}
}
</script>
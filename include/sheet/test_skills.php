<?php
# Configuration (language)
require_once("config.php");

# Language Selection
require_once("../languages/sheet/".$_COOKIE[mephit_lang].".php");

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
									"char_name"		=>	$values["_int_mod"]
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
	"craft"					=>	$_LANG["craft"],
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
	"knowledge"				=>	$_LANG["knowledge"],
	"knowledge"				=>	$_LANG["knowledge"],
	"knowledge"				=>	$_LANG["knowledge"],
	"knowledge"				=>	$_LANG["knowledge"],
	"listen"				=>	$_LANG["listen"],
	"move_silently"			=>	$_LANG["move_silently"],
	"open_lock"				=>	$_LANG["open_lock"],
	"perform"				=>	$_LANG["perform"],
	"perform"				=>	$_LANG["perform"],
	"perform"				=>	$_LANG["perform"],
	"profession"			=>	$_LANG["profession"],
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
function check(t,n){
	imgPath="images/sheet/"
	if(t.indexOf('chk1.gif')!=-1)document.images[n].src=imgPath+'chk0.gif';
	else if(t.indexOf('chk0.gif')!=-1)document.images[n].src=imgPath+'chk2.gif';
	else if(t.indexOf('chk2.gif')!=-1)document.images[n].src=imgPath+'chk1.gif';
}
</script>

<?php
$skill_old="";
foreach($skills as $s){
?>
<tr>
<td><img src=images/sheet/chk1.gif border=0 name=xskill_<?=$s["name_field"]?> onmouseup="check(this.src,this.name)" style="cursor:hand;cursor:pointer"></td>
<td width="125" class=skill nowrap><?=$s["name"]?></td>
<td class=skill><?=$s["char_name"]?></td>
<td><input name=<?=$s["name_field"]?>_tot class=text style="width:20px;text-align:center;" value="<?=$values[$s["name_field"]."_tot"]?>"></td>
<td style="font:11px arial">=</td>
<td><input name=<?=$s["name_field"]?>_char class=text style="width:20px;text-align:center;" value="<?=$s["char_value"]?>" readonly></td>
<td style="font:11px arial">+</td>
<td><input name=<?=$s["name_field"]?>_ranks class=text style="width:20px;text-align:center;" value="<?=$values[$s["name_field"]."_ranks"]?>"></td>
<td style="font:11px arial">+</td>
<td><input name=<?=$s["name_field"]?>_misc class=text style="width:20px;text-align:center;" value="<?=$values[$s["name_field"]."_ranks"]?>"></td>
</tr>
<?php } ?>
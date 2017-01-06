<?php
$skills=array(
	$_LANG["appraise"]." <img src=images/sheet/notraining.gif>|".$_LANG["int"]."|".$values["_int_mod"]."|appraise",
	$_LANG["balance"]." <img src=images/sheet/notraining.gif>|".$_LANG["dex"]."*|".$values["_des_mod"]."|balance",
	$_LANG["bluff"]." <img src=images/sheet/notraining.gif>|".$_LANG["cha"]."|".$values["_car_mod"]."|bluff",
	$_LANG["climb"]." <img src=images/sheet/notraining.gif>|".$_LANG["str"]."*|".$values["_for_mod"]."|climb",
	$_LANG["concentration"]." <img src=images/sheet/notraining.gif>|".$_LANG["con"]."|".$values["_cos_mod"]."|concentration",
	$_LANG["craft"]." <img src=images/sheet/notraining.gif> (<input class=text style=\"width:50px;\">)|".$_LANG["int"]."|".$values["_int_mod"]."|craft-1",
	$_LANG["craft"]." <img src=images/sheet/notraining.gif> (<input class=text style=\"width:50px;\">)|".$_LANG["int"]."|".$values["_int_mod"]."|craft-2",
	$_LANG["craft"]." <img src=images/sheet/notraining.gif> (<input class=text style=\"width:50px;\">)|".$_LANG["int"]."|".$values["_int_mod"]."|craft-3",
	$_LANG["deciphter_script"]."|".$_LANG["int"]."|".$values["_int_mod"]."|deciphter_script",
	$_LANG["diplomacy"]." <img src=images/sheet/notraining.gif>|".$_LANG["cha"]."|".$values["_car_mod"]."|diplomacy",
	$_LANG["disable_device"]."|".$_LANG["int"]."|".$values["_int_mod"]."|disable_device",
	$_LANG["disguise"]." <img src=images/sheet/notraining.gif>|".$_LANG["cha"]."|".$values["_car_mod"]."|disguise",
	$_LANG["escape_artist"]." <img src=images/sheet/notraining.gif>|".$_LANG["dex"]."*|".$values["_des_mod"]."|escape_artist",
	$_LANG["forgery"]." <img src=images/sheet/notraining.gif>|".$_LANG["int"]."|".$values["_int_mod"]."|forgery",
	$_LANG["gather_information"]." <img src=images/sheet/notraining.gif>|".$_LANG["cha"]."|".$values["_car_mod"]."|gather_information",
	$_LANG["handle_animal"]."|".$_LANG["cha"]."|".$values["_car_mod"]."|handle_animal",
	$_LANG["heal"]."|".$_LANG["wis"]."|".$values["_sag_mod"]."|heal",
	$_LANG["hide"]."|".$_LANG["dex"]."*|".$values["_des_mod"]."|hide",
	$_LANG["intimidate"]." <img src=images/sheet/notraining.gif>|".$_LANG["cha"]."|".$values["_car_mod"]."|intimidate",
	$_LANG["jump"]." <img src=images/sheet/notraining.gif>|".$_LANG["str"]."*|".$values["_for_mod"]."|jump",
	$_LANG["knowledge"]." (<input class=text style=\"width:40px;\">)|".$_LANG["int"]."|".$values["_int_mod"]."|knowledge-1",
	$_LANG["knowledge"]." (<input class=text style=\"width:40px;\">)|".$_LANG["int"]."|".$values["_int_mod"]."|knowledge-2",
	$_LANG["knowledge"]." (<input class=text style=\"width:40px;\">)|".$_LANG["int"]."|".$values["_int_mod"]."|knowledge-3",
	$_LANG["knowledge"]." (<input class=text style=\"width:40px;\">)|".$_LANG["int"]."|".$values["_int_mod"]."|knowledge-4",
	$_LANG["knowledge"]." (<input class=text style=\"width:40px;\">)|".$_LANG["int"]."|".$values["_int_mod"]."|knowledge-5",
	$_LANG["listen"]." <img src=images/sheet/notraining.gif>|".$_LANG["wis"]."|".$values["_sag_mod"]."|listen",
	$_LANG["move_silently"]." <img src=images/sheet/notraining.gif>|".$_LANG["dex"]."*|".$values["_des_mod"]."|move_silently",
	$_LANG["open_lock"]."|".$_LANG["dex"]."|".$values["_des_mod"]."|open_lock",
	$_LANG["perform"]." (<input class=text style=\"width:50px;\">)|".$_LANG["cha"]."|".$values["_car_mod"]."|perform-1",
	$_LANG["perform"]." (<input class=text style=\"width:50px;\">)|".$_LANG["cha"]."|".$values["_car_mod"]."|perform-2",
	$_LANG["perform"]." (<input class=text style=\"width:50px;\">)|".$_LANG["cha"]."|".$values["_car_mod"]."|perform-3",
	$_LANG["profession"]." (<input class=text style=\"width:50px;\">)|".$_LANG["wis"]."|".$values["_sag_mod"]."|profession-1",
	$_LANG["profession"]." (<input class=text style=\"width:50px;\">)|".$_LANG["wis"]."|".$values["_sag_mod"]."|profession-2",
	$_LANG["ride"]." <img src=images/sheet/notraining.gif>|".$_LANG["dex"]."|".$values["_des_mod"]."|ride",
	$_LANG["search"]." <img src=images/sheet/notraining.gif>|".$_LANG["int"]."|".$values["_int_mod"]."|search",
	$_LANG["sense_motive"]." <img src=images/sheet/notraining.gif>|".$_LANG["wis"]."|".$values["_sag_mod"]."|sense_motive",
	$_LANG["sleight_of_hand"]."|".$_LANG["dex"]."*|".$values["_des_mod"]."|sleight_of_hand",
	$_LANG["spellcraft"]."|".$_LANG["int"]."|".$values["_int_mod"]."|spellcraft",
	$_LANG["spot"]." <img src=images/sheet/notraining.gif>|".$_LANG["wis"]."|".$values["_sag_mod"]."|spot",
	$_LANG["survival"]." <img src=images/sheet/notraining.gif>|".$_LANG["wis"]."|".$values["_sag_mod"]."|survival",
	$_LANG["swim"]." <img src=images/sheet/notraining.gif>|".$_LANG["str"]."*|".$values["_for_mod"]."|swim",
	$_LANG["tumble"]."	|".$_LANG["dex"]."*|".$values["_des_mod"]."|tumble",
	$_LANG["use_magic_device"]."|".$_LANG["cha"]."|".$values["_car_mod"]."|use_magic_device",
	$_LANG["use_rope"]." <img src=images/sheet/notraining.gif>|".$_LANG["dex"]."*|".$values["_des_mod"]."|use_rope"
);
sort($skills);
$skills[]="<input class=text style=\"width:100px;\">|<input class=text style=\"width:30px;\">||user-1";
$skills[]="<input class=text style=\"width:100px;\">|<input class=text style=\"width:30px;\">||user-2";
?>
<script>
function check(t,n){
	imgPath="images/sheet/"
	if(t.indexOf('chk1.gif')!=-1)document.images[n].src=imgPath+'chk0.gif';
	else if(t.indexOf('chk0.gif')!=-1)document.images[n].src=imgPath+'chk2.gif';
	else if(t.indexOf('chk2.gif')!=-1)document.images[n].src=imgPath+'chk1.gif';
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
foreach($skills as $t){
$t=explode("|",$t);
?>
<tr>
<td><img src=images/sheet/chk1.gif border=0 name=xskill_<?=$t[3]?> onmouseup="check(this.src,this.name)" style="cursor:hand;cursor:pointer"></td>
<td width="125" class=skill nowrap><?=$t[0]?></td>
<td class=skill><?=$t[1]?></td>
<td><input name=str_score class=text style="width:20px;text-align:center;"></td>
<td style="font:11px arial">=</td>
<td><input name=str_score class=text style="width:20px;text-align:center;" value="<?=$t[2]?>" readonly></td>
<td style="font:11px arial">+</td>
<td><input name=str_score class=text style="width:20px;text-align:center;"></td>
<td style="font:11px arial">+</td>
<td><input name=str_score class=text style="width:20px;text-align:center;"></td>
</tr>
<?php } ?>
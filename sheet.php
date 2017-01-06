<?php
# Configuration (language)
require_once("include/sheet/config.php");

# Language Selection
require_once("include/languages/sheet/".$_COOKIE["mephit_lang"].".php");

# Database Connection
require_once("include/db_connect.php");

# Functions Declaration
require_once("include/sheet/functions.php");

# Update Sheet
if(isset($_POST[id_personaggio])){
	require_once("include/sheet/query_update.inc.php");
}

# Get character data from DB
require_once("include/sheet/query_select.inc.php");
?>
<html><head><title><?=$_LANG["TITLE"]?></title>
<link rel="stylesheet" href="css/sheet.css">
<script src="js/sheet.js"></script>
</head><body bgcolor=ffffff topmargin=0 marginheight=0 leftmargin=0 marginwidth=0 rightmargin=0 bottommargin=0 onload="if(document.all){for(t in document.images){if(document.images[t].src){document.images[t].src=document.images[t].src;}}if(!document.getElementById)document.getElementById=document.all;}">
<table border=0 cellpadding=1 cellspacing=0 width=649 height=974 bgcolor="ffffff">
<form name=f action="<?=$_SERVER[PHP_SELF]."?id=".$_GET[id]?>" method="post">
<input type=hidden value=<?=$_GET[id]?> name="id_personaggio">
<tr><td>
<table border=0 cellpadding=0 cellspacing=0 width=100% height=100% bgcolor="ffffff"><tr><td>
<div style="top:20px;left:517px;"><img src="<?=$_LANG["LOGO"]?>"></div>

<!-- 1 -->
<div style="top:0px;left:0px;" class="under"><input name=nome class=text style="width:199px;" value="<?=$values["nome"]?>"><br><?=$_LANG["character_name"]?></div>
<div style="top:0px;left:223px;" class="under"><input name=giocatore class=text style="width:199px;" value="<?=$values["giocatore"]?>"><br><?=$_LANG["player"]?></div>

<!-- 2 -->
<div style="top:30px;left:0px;" class="under"><input name=classi class=text style="width:199px;" value="<?=$values["classi"]?>"><br><?=$_LANG["class_and_level"]?></div>
<div style="top:30px;left:223px;" class="under"><input name=race class=text style="width:54px;" value="<?=$values["race"]?>"><br><?=$_LANG["race"]?></div>
<div style="top:30px;left:292;" class="under"><input name=allineamento_print class=text style="width:54px;" value="<?=$values["allineamento_string"]?>" readonly><select name=allineamento class=text style="width:54px;display:none;" onchange="document.f.elements[this.name+'_print'].value=this.options[this.options.selectedIndex].text;">
<?=$allineamento_options?>
</select><br><?=$_LANG["alignment"]?></div>
<div style="top:30px;left:368px;" class="under"><input name=divinita class=text style="width:54px;" value="<?=$values["divinita"]?>"><br><?=$_LANG["deity"]?></div>

<div style="top:60px;left:0px;" class="under"><input name=taglia_print class=text style="width:73px;" value="<?=$values["taglia_string"]?>" readonly><select name=taglia class=text style="width:73px;display:none;" onchange="document.f.elements[this.name+'_print'].value=this.options[this.options.selectedIndex].text;">
<?=$taglia_options?>
</select>
<br><?=$_LANG["size"]?></div>
<div style="top:60px;left:81px;" class="under"><input name=eta class=text style="width:33;" value="<?=$values["eta"]?>"><br><?=$_LANG["age"]?></div>
<div style="top:60px;left:123px;" class="under"><input name=sex_print class=text style="width:33;" value="<?=$values["sex"]?>" readonly><select name=sex class=text style="width:33;display:none;" onchange="document.f.elements[this.name+'_print'].value=this.options[this.options.selectedIndex].text;">
<option value="M"<?=($values["sex"]=="M")?" selected":""?>>M
<option value="F"<?=($values["sex"]=="F")?" selected":""?>>F
</select><br><?=$_LANG["gender"]?></div>
<div style="top:60px;left:166;" class="under"><input name=altezza class=text style="width:33;" value="<?=$values["altezza"]?>"><br><?=$_LANG["height"]?></div>
<div style="top:60px;left:223px;" class="under"><input name=peso class=text style="width:43;" value="<?=$values["peso"]?>"><br><?=$_LANG["weight"]?></div>
<div style="top:60px;left:274;" class="under"><input name=occhi class=text style="width:43;" value="<?=$values["occhi"]?>"><br><?=$_LANG["eyes"]?></div>
<div style="top:60px;left:326;" class="under"><input name=capelli class=text style="width:43;" value="<?=$values["capelli"]?>"><br><?=$_LANG["hair"]?></div>
<div style="top:60px;left:379;" class="under"><input name=skin class=text style="width:43;" value="<?=$values["skin"]?>" maxlength=60><br><?=$_LANG["skin"]?></div>

<!-- 4 -->
<div style="top:100px;left:0px;"><table border=0 cellpadding=0 cellspacing=0>
<tr align="center">
<td class=under><?=$_LANG["ability_name"]?></td>
<td class=under><?=$_LANG["ability_score"]?></td>
<td class=under><?=$_LANG["ability_modifier"]?></td>
<td class=under><?=$_LANG["temporary_score"]?></td>
<td class=under><?=$_LANG["temporary_modifier"]?></td>
</tr>
<tr>
<td class=cell-black><?=$_LANG["str"]?><br><span class=under style="color:#ffffff"><?=$_LANG["strength"]?></span></td>
<td class=cell-white><input name=_for class=box style="width:25px;" value="<?=$values["_for"]?>"></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["_for_mod"])?>" readonly></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
</tr>
<tr>
<td class=cell-black><?=$_LANG["dex"]?><br><span class=under style="color:#ffffff"><?=$_LANG["dexterity"]?></span></td>
<td class=cell-white><input name=_des class=box style="width:25px;" value="<?=$values["_des"]?>"></td>
<td class=cell-white><input name=_des_mod class=box style="width:25px;" value="<?=sign($values["_des_mod"])?>" readonly></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
</tr>
<tr>
<td class=cell-black><?=$_LANG["con"]?><br><span class=under style="color:#ffffff"><?=$_LANG["constitution"]?></span></td>
<td class=cell-white><input name=_cos class=box style="width:25px;" value="<?=$values["_cos"]?>"></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["_cos_mod"])?>" readonly></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
</tr>
<tr>
<td class=cell-black><?=$_LANG["int"]?><br><span class=under style="color:#ffffff"><?=$_LANG["intelligence"]?></span></td>
<td class=cell-white><input name=_int class=box style="width:25px;" value="<?=$values["_int"]?>"></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["_int_mod"])?>" readonly></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
</tr>
<tr>
<td class=cell-black><?=$_LANG["wis"]?><br><span class=under style="color:#ffffff"><?=$_LANG["wisdom"]?></span></td>
<td class=cell-white><input name=_sag class=box style="width:25px;" value="<?=$values["_sag"]?>"></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["_sag_mod"])?>" readonly></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
</tr>
<tr>
<td class=cell-black><?=$_LANG["cha"]?><br><span class=under style="color:#ffffff"><?=$_LANG["charisma"]?></span></td>
<td class=cell-white><input name=_car class=box style="width:25px;" value="<?=$values["_car"]?>"></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["_car_mod"])?>" readonly></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
<td class=cell-gray><input class=box style="width:25px;"></td>
</tr>
</table></div>

<!-- 5 -->
<div style="top:108;left:223px;"><table border=0 cellpadding=0 cellspacing=0>
<tr align="center">
<td class=under></td>
<td class=under><?=$_LANG["total"]?></td>
<td class=under colspan=9><?=$_LANG["wounds_current_hp"]?></td>
<td class=under colspan=4><?=$_LANG["nonlethal_damage"]?></td>
<td class=under><?=$_LANG["speed"]?></td>
</tr>
<tr>
<td class=cell-black><?=$_LANG["hp"]?><br><span class=under style="color:#ffffff"><?=$_LANG["hit_points"]?></span></td>
<td class=cell-white><input name=_pf class=box style="width:25px;" value="<?=$values["_pf"]?>"></td>
<td class=cell-white colspan=9><input name=_pf_now class=box style="width:200px;" value="<?=$values["_pf_now"]?>"></td>
<td class=cell-white colspan=4><input name=_pf_debilitanti class=box style="width:90px;" value="<?=$values["_pf_debilitanti"]?>"></td>
<td class=cell-white><input name=velocita class=box style="width:25px;" value="<?=$values["velocita"]?>"></td>
</tr>
<tr><td colspan=16 height=4></td></tr>
<tr align="center">
<td class=cell-black><?=$_LANG["ac"]?><br><span class=under style="color:#ffffff"><?=$_LANG["armor_class"]?></span></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["CA"]?>" readonly></td>
<td style="font:bold 12px 'arial'" nowrap>= 10 +</td>
<td class=cell-white><input name=armatura class=box style="width:25px;" value="<?=$values["armatura"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=armatura_scudo class=box style="width:25px;" value="<?=$values["armatura_scudo"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=armatura_mod_des_max class=box style="width:25px;" value="<?=$values["armatura_mod_des_max"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["taglia_mod"]?>" readonly></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=armatura_naturale class=box style="width:25px;" value="<?=$values["armatura_naturale"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=armatura_deviazione class=box style="width:25px;" value="<?=$values["armatura_deviazione"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=armatura_var class=box style="width:25px;" value="<?=$values["armatura_var"]?>"></td>
</tr>
<tr align="center" valign="top">
<td></td>
<td class=under><?=$_LANG["total"]?></td>
<td style="font:bold 12px 'arial'" nowrap></td>
<td class=under><?=$_LANG["armor_bonus"]?></td>
<td></td>
<td class=under><?=$_LANG["shield_bonus"]?></td>
<td></td>
<td class=under><?=$_LANG["dex_modifier"]?></td>
<td></td>
<td class=under><?=$_LANG["size_modifier"]?></td>
<td></td>
<td class=under><?=$_LANG["natural_armor"]?></td>
<td></td>
<td class=under><?=$_LANG["deflection_modifier"]?></td>
<td></td>
<td class=under><?=$_LANG["misc_modifier"]?></td>
</tr>
</table>
</div>

<!-- 6 -->
<div style="top:225px;left:223px;" class="under">
<table border=0 cellpadding=0 cellspacing=0 bgcolor="#ff00ff">
<tr>
<td class=cell-black><?=$_LANG["touch"]?><br><span class=under style="color:#ffffff"><?=$_LANG["armor_class"]?></span></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["CA_contatto"]?>" readonly></td>
<td class=cell-black><?=$_LANG["flat_footed"]?><br><span class=under style="color:#ffffff"><?=$_LANG["armor_class"]?></span></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["CA_sprovvista"]?>" readonly></td>
<td class=cell-black><?=$_LANG["base_attack_bonus"]?></td>
<td class=cell-white><input name=bab class=box style="width:25px;" value="<?=$values["bab"]?>"></td>
</tr>
</table>
<br>
<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td class=cell-black><?=$_LANG["initiative"]?><br><span class=under style="color:#ffffff"><?=$_LANG["modifier"]?></span></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["iniziativa_tot"])?>" readonly></td>
<td style="font:bold 12px 'arial'" nowrap>=</td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["_des_mod"]?>" readonly></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=iniziativa class=box style="width:25px;" value="<?=$values["iniziativa"]?>"></td>
<td class=cell-black><?=$_LANG["spell_resistance"]?></td>
<td class=cell-white><input name=ri class=box style="width:25px;" value="<?=$values["ri"]?>"></td>
</tr>
<tr align="center" valign="top">
<td></td>
<td class=under><?=$_LANG["total"]?></td>
<td></td>
<td class=under><?=$_LANG["dex_modifier"]?></td>
<td></td>
<td class=under><?=$_LANG["misc_modifier"]?></td>
<td></td>
<td></td>
</tr>
</table>
</div>

<!-- 7 -->
<div style="top:328px;left:323px;">
<table border=0 cellpadding=0 cellspacing=4>
<tr><td colspan="10" class=cell-black>

<table border=0 cellpadding=0 cellspacing=0 width="100%"><tr>
<td width="50%"></td>
<td class=cell-black><?=$_LANG["skills"]?></td>
<td width="50%">

<table border=0 cellpadding=0 cellspacing=0 width="100%" height="20"><tr>
<td class=under style="color:#ffffff" nowrap><?=$_LANG["max_ranks"]?></td>
<td width="3" nowrap></td>
<td class=cell-white width="100%">

<table border=0 cellpadding=0 cellspacing=0><tr>
<td><input style="width:12;border-style:none;text-align:center;" value="<?=$values["grado_classe"]?>" readonly></td>
<td>/</td>
<td><input style="width:16;border-style:none;text-align:center;" value="<?=$values["grado_classe_incrociata"]?>" readonly></td>
</tr></table>


</td>
</tr></table>

</td>
</tr></table>

</td></tr>
<?require("include/sheet/skills.php")?>
<tr>
	<td colspan="10">
		<script>
		s ="<style>\n";
		if(document.all){
			s+="TEXTAREA{margin:-1px 0px -2px 0px;}\n";
		}else{
			s+="TEXTAREA{margin:0px 0px -1px 0px;}\n";
		}
		s+="</style>";
		document.write(s);
		function tAreaTit(q){
			document.write('<div class="cell-black" style="position:relative;'+((!document.all)?'height:17px;':'')+'">'+q+'</div>')
		}
		</script>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr valign="top"><?// h = ( rows * 12 ) + 1 ?>
			<td width="146"><script>tAreaTit("<?=$_LANG["feats"]?>")</script>
			<textarea name="feats" style="width:146px;height:169px;margin-bottom:10px;"><?=$values["feats"]?></textarea>
			<script>tAreaTit("<?=$_LANG["special_abilities"]?>")</script>
			<textarea name="special_abilities" style="width:146px;height:529px;margin-bottom:10px;""><?=$values["special_abilities"]?></textarea>
			<script>tAreaTit("<?=$_LANG["languages"]?>")</script>
			<textarea name="languages" style="width:146px;height:73px;"><?=$values["languages"]?></textarea></td>
			<td width="100%" class=under align="right">
			<br><br><br>0&nbsp;&nbsp;<br><br><br><br><br><br><br><br><br><br><br>
			<?=$_LANG["1st"]?>&nbsp;&nbsp;<br><br><br><br><br><br><br><br><br><br>
			<?=$_LANG["2nd"]?>&nbsp;&nbsp;<br><br><br><br><br><br><br><br><br><br><br>
			<?=$_LANG["3rd"]?>&nbsp;&nbsp;<br><br><br><br><br><br><br><br><br><br>
			<?=$_LANG["4th"]?>&nbsp;&nbsp;<br><br><br><br><br><br><br><br><br><br><br>
			<?=$_LANG["5th"]?>&nbsp;&nbsp;<br><br><br><br><br><br><br><br><br><br>
			<?=$_LANG["6th"]?>&nbsp;&nbsp;<br><br><br><br><br><br><br><br><br><br><br>
			<?=$_LANG["7th"]?>&nbsp;&nbsp;<br><br><br><br><br><br><br><br><br><br>
			<?=$_LANG["8th"]?>&nbsp;&nbsp;<br><br><br><br><br><br><br><br><br><br><br>
			<?=$_LANG["9th"]?>&nbsp;&nbsp;
			</td>
			<td width="146"><script>tAreaTit("<?=$_LANG["spells"]?>")</script>
			<textarea name="spells_0" style="width:146px;height:85px;" wrap="virtual"><?=$values["spells_0"]?></textarea><br>
			<textarea name="spells_1" style="width:146px;height:85px;"><?=$values["spells_1"]?></textarea><br>
			<textarea name="spells_2" style="width:146px;height:85px;"><?=$values["spells_2"]?></textarea><br>
			<textarea name="spells_3" style="width:146px;height:85px;"><?=$values["spells_3"]?></textarea><br>
			<textarea name="spells_4" style="width:146px;height:85px;"><?=$values["spells_4"]?></textarea><br>
			<textarea name="spells_5" style="width:146px;height:85px;"><?=$values["spells_5"]?></textarea><br>
			<textarea name="spells_6" style="width:146px;height:85px;"><?=$values["spells_6"]?></textarea><br>
			<textarea name="spells_7" style="width:146px;height:85px;"><?=$values["spells_7"]?></textarea><br>
			<textarea name="spells_8" style="width:146px;height:85px;"><?=$values["spells_8"]?></textarea><br>
			<textarea name="spells_9" style="width:146px;height:85px;"><?=$values["spells_9"]?></textarea><br>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
</div>

<!-- 8 -->
<div style="top:316px;left:0px;">
<table border=0 cellpadding=0 cellspacing=0>
<tr align="center">
<td></td>
<td class=under><?=$_LANG["total"]?></td>
<td style="font:bold 12px 'arial'" nowrap></td>
<td class=under><?=$_LANG["base_save"]?></td>
<td></td>
<td class=under><?=$_LANG["ability_modifier"]?></td>
<td></td>
<td class=under><?=$_LANG["magic_modifier"]?></td>
<td></td>
<td class=under><?=$_LANG["misc_modifier"]?></td>
<td></td>
<td class=under><?=$_LANG["temp_modifier"]?></td>
</tr>
<tr>
<td class=cell-black><?=$_LANG["fortitude"]?><br><span class=under style="color:#ffffff">(<?=$_LANG["constitution"]?>)</span></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["_tem_tot"])?>" readonly></td>
<td style="font:bold 12px 'arial'" nowrap>=</td>
<td class=cell-white><input name=_tem class=box style="width:25px;" value="<?=$values["_tem"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["_cos_mod"]?>" readonly></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=_tem_mag class=box style="width:25px;" value="<?=$values["_tem_mag"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=_tem_var class=box style="width:25px;" value="<?=$values["_tem_var"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-gray><input class=box style="width:25px;" readonly></td>
</tr>
<tr><td colspan="12" height="4"></td></tr>
<tr>
<td class=cell-black><?=$_LANG["reflex"]?><br><span class=under style="color:#ffffff">(<?=$_LANG["dexterity"]?>)</span></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["_rif_tot"])?>" readonly></td>
<td style="font:bold 12px 'arial'" nowrap>=</td>
<td class=cell-white><input name=_rif class=box style="width:25px;" value="<?=$values["_rif"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["_des_mod"]?>" readonly></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=_rif_mag class=box style="width:25px;" value="<?=$values["_rif_mag"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=_rif_var class=box style="width:25px;" value="<?=$values["_rif_var"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-gray><input class=box style="width:25px;" readonly></td>
</tr>
<tr><td colspan="12" height="4"></td></tr>
<tr>
<td class=cell-black><?=$_LANG["will"]?><br><span class=under style="color:#ffffff">(<?=$_LANG["wisdom"]?>)</span></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["_vol_tot"])?>" readonly></td>
<td style="font:bold 12px 'arial'" nowrap>=</td>
<td class=cell-white><input name=_vol class=box style="width:25px;" value="<?=$values["_vol"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["_sag_mod"]?>" readonly></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=_vol_mag class=box style="width:25px;" value="<?=$values["_vol_mag"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=_vol_var class=box style="width:25px;" value="<?=$values["_vol_var"]?>"></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-gray><input class=box style="width:25px;" readonly></td>
</tr>
<tr><td colspan="12" height=16></td></tr>
<tr>
<td class=cell-black><?=$_LANG["grapple"]?><br><span class=under style="color:#ffffff"><?=$_LANG["modifier"]?></span></td>
<td class=cell-white><input class=box style="width:25px;" value="<?=sign($values["grapple_tot"])?>" readonly></td>
<td style="font:bold 12px 'arial'" nowrap>=</td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["bab"]?>" readonly></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["_for_mod"]?>" readonly></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input class=box style="width:25px;" value="<?=$values["taglia_mod"]?>" readonly></td>
<td style="font:lighter 12px 'arial'">+</td>
<td class=cell-white><input name=grapple_var class=box style="width:25px;" value="<?=$values["grapple_var"]?>"></td>
</tr>
<tr align="center">
<td></td>
<td class=under><?=$_LANG["total"]?></td>
<td style="font:bold 12px 'arial'" nowrap></td>
<td class=under><?=str_replace(" ","<br>",$_LANG["base_attack_bonus"])?></td>
<td></td>
<td class=under><?=$_LANG["str_modifier"]?></td>
<td></td>
<td class=under><?=$_LANG["size_modifier"]?></td>
<td></td>
<td class=under><?=$_LANG["misc_modifier"]?></td>
</tr>
</table>
</div>

<?php require("include/sheet/attacco.php"); ?>

<!-- EQUIPAGGIAMENTO -->
<div style="top:980px;left:0px;width:319px;">
<input name="fk_campagna_print" class=text style="width:100%;" value="<?=$campagna?>" readonly><select name=fk_campagna class=text style="width:100%;display:none;" onchange="document.f.elements[this.name+'_print'].value=this.options[this.options.selectedIndex].text;">
<?=$campagna_options?>
</select><div class=under><?=$_LANG["campaign"]?></div><br><br>
<input name="xp" style="width:100%;" class=box value="<?=$values["xp"]?>"><div class=under><?=$_LANG["experience_points"]?></div><br><br>
<table border=0 cellpadding=0 cellspacing=0 width="100%">
<tr><td class=cell-black><?=$_LANG["gear"]?></td></tr>
</table>
</div>

<?php require("include/sheet/difesa.php"); ?>

<!-- 18 -->
<div style="top:1490px;left:0px;">
<style>
#equipment,#equipment TD{border:1px solid #000000;border-left-width:2px;}
#equipment TD{border-width:0px 1px 1px 0px;}
#equipment INPUT{border-style:none;font-size:10pt;}
#equipment .n{width:112px;padding:1px;}
#equipment .p{width:44px;padding:1px;text-align:right;}
#equipment .m{width:50px;text-align:right;}
</style>
<table border=0 cellpadding=0 cellspacing=0 width="319" id="equipment">
<tr>
<td colspan="4" class="cell-black"><?=$_LANG["other_possessions"]?></td>
</tr>
<tr align="center">
	<td class="under"><?=$_LANG["object"]?></td>
	<td class="under"><?=$_LANG["weight"]?></td>
	<td class="under"><?=$_LANG["object"]?></td>
	<td class="under"><?=$_LANG["weight"]?></td>
</tr>
<tr>
	<td><input name="object0" value="<?=$values["object0"]?>" class="n"></td>
	<td><input name="weight0" value="<?=$values["weight0"]?>" class="p"></td>
	<td><input name="object17" value="<?=$values["object17"]?>" class="n"></td>
	<td><input name="weight17" value="<?=$values["weight17"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object1" value="<?=$values["object1"]?>" class="n"></td>
	<td><input name="weight1" value="<?=$values["weight1"]?>" class="p"></td>
	<td><input name="object18" value="<?=$values["object18"]?>" class="n"></td>
	<td><input name="weight18" value="<?=$values["weight18"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object2" value="<?=$values["object2"]?>" class="n"></td>
	<td><input name="weight2" value="<?=$values["weight2"]?>" class="p"></td>
	<td><input name="object19" value="<?=$values["object19"]?>" class="n"></td>
	<td><input name="weight19" value="<?=$values["weight19"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object3" value="<?=$values["object3"]?>" class="n"></td>
	<td><input name="weight3" value="<?=$values["weight3"]?>" class="p"></td>
	<td><input name="object20" value="<?=$values["object20"]?>" class="n"></td>
	<td><input name="weight20" value="<?=$values["weight20"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object4" value="<?=$values["object4"]?>" class="n"></td>
	<td><input name="weight4" value="<?=$values["weight4"]?>" class="p"></td>
	<td><input name="object21" value="<?=$values["object21"]?>" class="n"></td>
	<td><input name="weight21" value="<?=$values["weight21"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object5" value="<?=$values["object5"]?>" class="n"></td>
	<td><input name="weight5" value="<?=$values["weight5"]?>" class="p"></td>
	<td><input name="object22" value="<?=$values["object22"]?>" class="n"></td>
	<td><input name="weight22" value="<?=$values["weight22"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object6" value="<?=$values["object6"]?>" class="n"></td>
	<td><input name="weight6" value="<?=$values["weight6"]?>" class="p"></td>
	<td><input name="object23" value="<?=$values["object23"]?>" class="n"></td>
	<td><input name="weight23" value="<?=$values["weight23"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object7" value="<?=$values["object7"]?>" class="n"></td>
	<td><input name="weight7" value="<?=$values["weight7"]?>" class="p"></td>
	<td><input name="object24" value="<?=$values["object24"]?>" class="n"></td>
	<td><input name="weight24" value="<?=$values["weight24"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object8" value="<?=$values["object8"]?>" class="n"></td>
	<td><input name="weight8" value="<?=$values["weight8"]?>" class="p"></td>
	<td><input name="object25" value="<?=$values["object25"]?>" class="n"></td>
	<td><input name="weight25" value="<?=$values["weight25"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object9" value="<?=$values["object9"]?>" class="n"></td>
	<td><input name="weight9" value="<?=$values["weight9"]?>" class="p"></td>
	<td><input name="object26" value="<?=$values["object26"]?>" class="n"></td>
	<td><input name="weight26" value="<?=$values["weight26"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object10" value="<?=$values["object10"]?>" class="n"></td>
	<td><input name="weight10" value="<?=$values["weight10"]?>" class="p"></td>
	<td><input name="object27" value="<?=$values["object27"]?>" class="n"></td>
	<td><input name="weight27" value="<?=$values["weight27"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object11" value="<?=$values["object11"]?>" class="n"></td>
	<td><input name="weight11" value="<?=$values["weight11"]?>" class="p"></td>
	<td><input name="object28" value="<?=$values["object28"]?>" class="n"></td>
	<td><input name="weight28" value="<?=$values["weight28"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object12" value="<?=$values["object12"]?>" class="n"></td>
	<td><input name="weight12" value="<?=$values["weight12"]?>" class="p"></td>
	<td><input name="object29" value="<?=$values["object29"]?>" class="n"></td>
	<td><input name="weight29" value="<?=$values["weight29"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object13" value="<?=$values["object13"]?>" class="n"></td>
	<td><input name="weight13" value="<?=$values["weight13"]?>" class="p"></td>
	<td><input name="object30" value="<?=$values["object30"]?>" class="n"></td>
	<td><input name="weight30" value="<?=$values["weight30"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object14" value="<?=$values["object14"]?>" class="n"></td>
	<td><input name="weight14" value="<?=$values["weight14"]?>" class="p"></td>
	<td><input name="object31" value="<?=$values["object31"]?>" class="n"></td>
	<td><input name="weight31" value="<?=$values["weight31"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object15" value="<?=$values["object15"]?>" class="n"></td>
	<td><input name="weight15" value="<?=$values["weight15"]?>" class="p"></td>
	<td><input name="object32" value="<?=$values["object32"]?>" class="n"></td>
	<td><input name="weight32" value="<?=$values["weight32"]?>" class="p"></td>
</tr>
<tr>
	<td><input name="object16" value="<?=$values["object16"]?>" class="n"></td>
	<td><input name="weight16" value="<?=$values["weight16"]?>" class="p"></td>
	<td style="font:bold 8pt tahoma;" align="right"><?=$_LANG["total"]?>&nbsp;</td>
	<td><input name="weight_gear_total" value="<?=$values["weight_gear_total"]?>" class="p"></td>
</tr>
<tr>
	<td colspan="4" align="center">
		<style>
		#classic INPUT{border:1px solid #000000;}
		#classic TD{border-style:none;}
		</style>
		<table border="0" cellpadding="0" cellspacing="0" id="classic">
			<tr valign=top align=center>
				<?php
if($values["weight_gear_total"]<$values["medium_load"])$load="light_load";
else if($values["weight_gear_total"]<$values["heavy_load"])$load="medium_load";
else if($values["weight_gear_total"]<$values["lift_over_head"])$load="heavy_load";
else if($values["weight_gear_total"]<$values["lift_off_ground"])$load="lift_off_ground";
else if($values["weight_gear_total"]<$values["push_or_drag"])$load="push_or_drag";
else $load="impossibile";
$style="border-width:2px;"
				?>
				<td class=cell-white><input name="light_load" class=box style="width:40px;<?=($load=="light_load")?$style:""?>" value="<?=$values["light_load"]?>"></td>
				<td class=cell-white><input name="medium_load" class=box style="width:40px;<?=($load=="medium_load")?$style:""?>" value="<?=$values["medium_load"]?>"></td>
				<td class=cell-white><input name="heavy_load" class=box style="width:40px;<?=($load=="heavy_load")?$style:""?>" value="<?=$values["heavy_load"]?>"></td>
				<td class=cell-white><input name="lift_over_head" class=box style="width:40px;<?=($load=="heavy_load")?$style:""?>" value="<?=$values["lift_over_head"]?>"></td>
				<td class=cell-white><input name="lift_off_ground" class=box style="width:40px;<?=($load=="lift_off_ground")?$style:""?>" value="<?=$values["lift_off_ground"]?>"></td>
				<td class=cell-white><input name="push_or_drag" class=box style="width:40px;<?=($load=="push_or_drag")?$style:""?>" value="<?=$values["push_or_drag"]?>"></td>
			</tr><tr valign=top align=center>
				<td class=under><?=$_LANG["light_load"]?></td>
				<td class=under><?=$_LANG["medium_load"]?></td>
				<td class=under><?=$_LANG["heavy_load"]?></td>
				<td class=under><?=$_LANG["lift_over_head"]?></td>
				<td class=under><?=$_LANG["lift_off_ground"]?></td>
				<td class=under><?=$_LANG["push_or_drag"]?></td>
			</tr>
		</table>
	
	</td>
</tr>
<tr>
	<td colspan="4" class="cell-black"><?=$_LANG["money"]?></td>
</tr>
<tr>
	<td colspan="4" style="border-width:0px;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr align="center">
			<td class="txt" style="padding:1px;"><?=$_LANG["cp"]?>:<input name=cp value="<?=$values["cp"]?>" class="m"></td>
			<td class="txt" style="padding:1px;"><?=$_LANG["sp"]?>:<input name=sp value="<?=$values["sp"]?>" class="m"></td>
			<td class="txt" style="padding:1px;"><?=$_LANG["gp"]?>:<input name=gp value="<?=$values["gp"]?>" class="m"></td>
			<td class="txt" style="padding:1px;"><?=$_LANG["pp"]?>:<input name=pp value="<?=$values["pp"]?>" class="m"></td>
		</tr>
		</table>
	</td>
</tr>
</table>
</div>

<!-- 19 -->
<div style="top:1977px;left:0px;width:319px;">
	<style>
		#enc TD{padding:2px 5px;text-align:center;}
	</style>
	<table border="0" cellpadding="0" cellspacing="0" id="enc" align="center">
	<tr align="center">
		<td class="under"><?=$_LANG["spells_known"]?></td>
		<td class="under"><?=$_LANG["spell_save_dc"]?></td>
		<td class="txt"><b><?=$_LANG["level"]?></b></td>
		<td class="under"><?=$_LANG["spells_per_day"]?></td>
		<td class="under"><?=$_LANG["bonus_spells"]?></td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_0" class=box style="width:25px;" value="<?=$values["spells_kown_0"]?>"></td>
		<td class="cell-white"><input name="spells_dc_0" class=box style="width:25px;" value="<?=$values["spells_dc_0"]?>"></td>
		<td class="txt">0</td>
		<td class="cell-white"><input name="spells_per_day_0" class=box style="width:25px;" value="<?=$values["spells_bonus_0"]?>"></td>
		<td class="txt">0</td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_1" class=box style="width:25px;" value="<?=$values["spells_kown_1"]?>"></td>
		<td class="cell-white"><input name="spells_dc_1" class=box style="width:25px;" value="<?=$values["spells_dc_1"]?>"></td>
		<td class="txt"><?=$_LANG["1st"]?></td>
		<td class="cell-white"><input name="spells_per_day_1" class=box style="width:25px;" value="<?=$values["spells_per_day_1"]?>"></td>
		<td class="cell-white"><input name="spells_bonus_1" class=box style="width:25px;" value="<?=$values["spells_bonus_1"]?>"></td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_2" class=box style="width:25px;" value="<?=$values["spells_kown_2"]?>"></td>
		<td class="cell-white"><input name="spells_dc_2" class=box style="width:25px;" value="<?=$values["spells_dc_2"]?>"></td>
		<td class="txt"><?=$_LANG["2nd"]?></td>
		<td class="cell-white"><input name="spells_per_day_2" class=box style="width:25px;" value="<?=$values["spells_per_day_2"]?>"></td>
		<td class="cell-white"><input name="spells_bonus_2" class=box style="width:25px;" value="<?=$values["spells_bonus_2"]?>"></td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_3" class=box style="width:25px;" value="<?=$values["spells_kown_3"]?>"></td>
		<td class="cell-white"><input name="spells_dc_3" class=box style="width:25px;" value="<?=$values["spells_dc_3"]?>"></td>
		<td class="txt"><?=$_LANG["3rd"]?></td>
		<td class="cell-white"><input name="spells_per_day_3" class=box style="width:25px;" value="<?=$values["spells_per_day_3"]?>"></td>
		<td class="cell-white"><input name="spells_bonus_3" class=box style="width:25px;" value="<?=$values["spells_bonus_3"]?>"></td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_4" class=box style="width:25px;" value="<?=$values["spells_kown_4"]?>"></td>
		<td class="cell-white"><input name="spells_dc_4" class=box style="width:25px;" value="<?=$values["spells_dc_4"]?>"></td>
		<td class="txt"><?=$_LANG["4th"]?></td>
		<td class="cell-white"><input name="spells_per_day_4" class=box style="width:25px;" value="<?=$values["spells_per_day_4"]?>"></td>
		<td class="cell-white"><input name="spells_bonus_4" class=box style="width:25px;" value="<?=$values["spells_bonus_4"]?>"></td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_5" class=box style="width:25px;" value="<?=$values["spells_kown_5"]?>"></td>
		<td class="cell-white"><input name="spells_dc_5" class=box style="width:25px;" value="<?=$values["spells_dc_5"]?>"></td>
		<td class="txt"><?=$_LANG["5th"]?></td>
		<td class="cell-white"><input name="spells_per_day_5" class=box style="width:25px;" value="<?=$values["spells_per_day_5"]?>"></td>
		<td class="cell-white"><input name="spells_bonus_5" class=box style="width:25px;" value="<?=$values["spells_bonus_5"]?>"></td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_6" class=box style="width:25px;" value="<?=$values["spells_kown_6"]?>"></td>
		<td class="cell-white"><input name="spells_dc_6" class=box style="width:25px;" value="<?=$values["spells_dc_6"]?>"></td>
		<td class="txt"><?=$_LANG["6th"]?></td>
		<td class="cell-white"><input name="spells_per_day_6" class=box style="width:25px;" value="<?=$values["spells_per_day_6"]?>"></td>
		<td class="cell-white"><input name="spells_bonus_6" class=box style="width:25px;" value="<?=$values["spells_bonus_6"]?>"></td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_7" class=box style="width:25px;" value="<?=$values["spells_kown_7"]?>"></td>
		<td class="cell-white"><input name="spells_dc_7" class=box style="width:25px;" value="<?=$values["spells_dc_7"]?>"></td>
		<td class="txt"><?=$_LANG["7th"]?></td>
		<td class="cell-white"><input name="spells_per_day_7" class=box style="width:25px;" value="<?=$values["spells_per_day_7"]?>"></td>
		<td class="cell-white"><input name="spells_bonus_7" class=box style="width:25px;" value="<?=$values["spells_bonus_7"]?>"></td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_8" class=box style="width:25px;" value="<?=$values["spells_kown_8"]?>"></td>
		<td class="cell-white"><input name="spells_dc_8" class=box style="width:25px;" value="<?=$values["spells_dc_8"]?>"></td>
		<td class="txt"><?=$_LANG["8th"]?></td>
		<td class="cell-white"><input name="spells_per_day_8" class=box style="width:25px;" value="<?=$values["spells_per_day_8"]?>"></td>
		<td class="cell-white"><input name="spells_bonus_8" class=box style="width:25px;" value="<?=$values["spells_bonus_8"]?>"></td>
	</tr>
	<tr align="center">
		<td class="cell-white"><input name="spells_kown_9" class=box style="width:25px;" value="<?=$values["spells_kown_9"]?>"></td>
		<td class="cell-white"><input name="spells_dc_9" class=box style="width:25px;" value="<?=$values["spells_dc_9"]?>"></td>
		<td class="txt"><?=$_LANG["9th"]?></td>
		<td class="cell-white"><input name="spells_per_day_9" class=box style="width:25px;" value="<?=$values["spells_per_day_9"]?>"></td>
		<td class="cell-white"><input name="spells_bonus_9" class=box style="width:25px;" value="<?=$values["spells_bonus_9"]?>"></td>
	</tr>
	</table>
</div>

<!-- 20 -->
<div style="top:2135px;left:323px;">
	<table border=0 cellpadding=0 cellspacing=0>
	<tr>
	<td class=cell-black><?=$_LANG["spell_save"]?></td>
	<td class=cell-white><input name=spell_save class=box style="width:25px;" value="<?=$values["spell_save"]?>"></td>
	</tr>
	<tr align="center" valign="top">
	<td></td>
	<td class=under><?=$_LANG["dc_mod"]?></td>
	</tr>
	</table><br>
	<table border=0 cellpadding=0 cellspacing=0>
	<tr>
	<td class=cell-black><?=$_LANG["arcane_spell_failure"]?></td>
	<td class=cell-white><input name=arcane_spell_failure class=box style="width:25px;" value="<?=$values["arcane_spell_failure"]?>"></td>
	<td class=cell-white>%</td>
	</tr>
	</table>
</div>

</td></tr></table>
</td></tr></form></table>

<script>
<?php
if(isset($message)){
	echo"if(document.getElementById)top.menu.document.getElementById('message').innerHTML=\"".$message."\";\n";
	echo"else if(document.all)top.menu.document.all.message.innerHTML=\"".$message."\";\n";
	echo"else alert(\"BROWSER NOT SUPPORTED\");\n";
}
?>
if(top.menu){
	for(i=0;i<document.images.length;i++){
		if(document.images[i].name!="")top.menu.editables[top.menu.editables.length]=document.images[i].name;
	}
}
</script>
</body></html>
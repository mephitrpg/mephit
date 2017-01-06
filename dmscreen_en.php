<?php
session_start();
if(!$_SESSION[logged]){
	include_once("access_denied.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"><title>Dungeon Master's Screen</title></head>
<body>
<table style="text-align: left; width: 100%; height: 100%;" border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td style="width: 99px; text-align: center;"><a href="#Action_in_Combact">Actions
in Combat</a></td>
<td style="width: 99px; text-align: center;"><a href="#Armor_Class_Modifiers">Armor
Class Modifiers</a></td>
<td style="width: 99px; text-align: center;"><a href="#Attack_Roll_Modifiers">Attack
Roll Modifiers</a></td>
<td style="width: 103px; text-align: center;"><a href="#Common_Armor_Weapon_and_Shield_Hardness_and_Hit_Points">Common
Armor, Weapon, and
Shield Hardness and Hit Points</a></td>
<td style="width: 99px; text-align: center;"><a href="#Creature_Size_and_Scale">Creature
Size and Scale</a></td>
<td style="width: 99px; text-align: center;"><a href="#Special_Attacks">Special Attacks</a></td>
<td style="width: 99px; text-align: center;"><a href="#Tactical_Speed">Tactical
Speed</a></td>
<td style="width: 99px; text-align: center;"><a href="#Turning_Undead">Turning Undead</a></td>
<td style="width: 99px; text-align: center;"><a href="#Two-Weapon_Fighting_Penalties">Two-Weapon
Fighting Penalties</a></td>
</tr>
<tr>
<td style="text-align: center;"><a href="#Skills">Skills</a></td>
<td style="text-align: center;"><a href="#Balance">Balance</a></td>
<td style="text-align: center;"><a href="#Bluff_Examples"><span lang="EN-US">Bluff</span></a></td>
<td style="text-align: center;"><a href="#Climb">Climb</a></td>
<td style="text-align: center;"><a href="#Concentration">Concentration</a></td>
<td style="text-align: center;"><a href="#Craft">Craft</a></td>
<td style="text-align: center;"><a href="#Diplomacy">Diplomacy</a></td>
<td style="text-align: center;"><a href="#Disable_Device">Disable
Device</a></td>
<td style="text-align: center;"><a href="#Disguise">Disguise</a></td>
</tr>
<tr>
<td style="text-align: center;"><a href="#Escape_Artist">Escape
Artist</a></td>
<td style="text-align: center;"><a href="#Forgery">Forgery</a></td>
<td style="text-align: center;"><a href="#Handle_Animal">Handle
Animal</a></td>
<td style="text-align: center;"><a href="#Heal">Heal</a></td>
<td style="text-align: center;"><a href="#Jump">Jump</a></td>
<td style="text-align: center;"><a href="#Listen">Listen</a></td>
<td style="text-align: center;"><a href="#Move_Silently">Move Silently</a></td>
<td style="text-align: center;"><a href="#Open_Lock"><span lang="EN-US">Open Lock</span></a></td>
<td style="text-align: center;"><a href="#Perform">Perform</a></td>
</tr>
<tr>
<td style="text-align: center;"><a href="#Ride">Ride</a></td>
<td style="text-align: center;"><a href="#Search"><span lang="EN-US">Search</span></a></td>
<td style="text-align: center;"><a href="#Sense_Motive">Sense Motive</a></td>
<td style="text-align: center;"><a href="#Sleight_of_Hand">Sleight of Hand</a></td>
<td style="text-align: center;"><a href="#Speak_Language"><span lang="EN-US">Speak
Language</span></a></td>
<td style="text-align: center;"><a href="#Spellcraft"><span lang="EN-US">Spellcraft</span></a></td>
<td style="text-align: center;"><a href="#Spot">Spot</a></td>
<td style="text-align: center;"><a href="#Survival">Survival</a></td>
<td style="text-align: center;"><a href="#Swim"><span lang="EN-US">Swim</span></a></td>
</tr>
<tr>
<td style="width: 99px;"></td>
<td style="width: 99px;"></td>
<td style="width: 99px;"></td>
<td style="width: 103px; text-align: center;"><a href="#Tumble">Tumble</a></td>
<td style="width: 99px; text-align: center;"><a href="#Use_Magic_Device">Use Magic Device</a></td>
<td style="width: 99px; text-align: center;"><a href="#Use_Rope">Use Rope</a></td>
<td style="width: 99px;"></td>
<td style="width: 99px;"></td>
<td style="width: 99px;"></td>
</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%; height: 11874px;" border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 1777px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 98pt;" width="130"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" height="20">
<td colspan="2" class="xl24" style="height: 15pt; width: 301pt; text-align: center; background-color: black;"><a name="Action_in_Combact"></a>Actions
in Combat</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt; font-family: ScalaSans; font-weight: bold; text-align: center;" height="20" width="270">Standard Action</td>
<td class="xl25" style="width: 98pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="130">Attack
of Opportunity<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Attack (melee)</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Attack (ranged)</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Attack (unarmed)</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Activate a magic item other
than a potion or oil</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Aid another</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Maybe<font class="font6"><sup>2</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Bull rush</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Cast a spell (1 standard
action casting time)</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Concentrate to maintain an
active spell</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Dismiss a spell</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Draw a hidden weapon (see
Sleight of Hand skill)</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Drink a potion or apply an oil</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Escape a grapple</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Feint</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Light a torch with a
tindertwig</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Lower spell resistance</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Make a dying friend stable
(see Heal skill)</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Overrun</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Read a scroll</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Ready (triggers a standard
action)</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Sunder a weapon (attack)</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Sunder an object (attack)</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Maybe<font class="font6"><sup>3</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Total defense</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Turn or rebuke undead</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Use extraordinary ability</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Use skill that takes 1 action</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Usually</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Use spell-like ability</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Use supernatural ability</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt; font-family: ScalaSans; font-weight: bold; text-align: center;" height="20" width="270">Move Action</td>
<td class="xl25" style="width: 98pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="130">Attack
of Opportunity<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Move</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Control a frightened mount</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Direct or redirect an active
spell</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Draw a weapon<font class="font6"><sup>4</sup></font></td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Load a hand crossbow or light
crossbow</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Open or close a door</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Mount a horse or dismount</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Move a heavy object</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Pick up an item</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Sheathe a weapon</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Stand up from prone</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Ready or loose a shield<font class="font6"><sup>4</sup></font></td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Retrieve a stored item</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt; font-family: ScalaSans; font-weight: bold; text-align: center;" height="20" width="270">Full-Round Action</td>
<td class="xl25" style="width: 98pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="130">Attack
of Opportunity<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Full attack</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Charge<font class="font6"><sup>5</sup></font></td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Deliver coup de grace</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Escape from a net</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Extinguish flames</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Light a torch</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Load a heavy or repeating
crossbow</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Lock or unlock weapon in
locked gauntlet</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Prepare to throw splash weapon</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Run</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Use skill that takes 1 round</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Usually</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="34" width="270">Use touch spell on up to six
friends</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Withdraw<font class="font6"><sup>5</sup></font></td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt; font-family: ScalaSans; font-weight: bold; text-align: center;" height="20" width="270">Free Action</td>
<td class="xl25" style="width: 98pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="130">Attack
of Opportunity<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Cast a quickened spell</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Cease concentration on a spell</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Drop an item</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Drop to the floor</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Prepare spell components to
cast a spell<font class="font6"><sup>6</sup></font></td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Speak</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt; font-family: ScalaSans; font-weight: bold; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">No Action</td>
<td class="xl25" style="width: 98pt; font-family: ScalaSans; font-weight: bold; background-color: rgb(204, 204, 204); text-align: center;" width="130">Attack
of Opportunity<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Delay</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">5-foot step</td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center; font-weight: bold;" height="20" width="270">Action Type Varies</td>
<td class="xl28" style="width: 98pt; font-family: ScalaSans; text-align: center; font-weight: bold;" width="130">Attack
of Opportunity<font class="font6"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Disarm<font class="font6"><sup>7</sup></font></td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Grapple<font class="font6"><sup>7</sup></font></td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="270">Trip an opponent<font class="font6"><sup>7</sup></font></td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="130">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 203pt; font-family: ScalaSans; text-align: center;" height="20" width="270">Use feat<font class="font6"><sup>8</sup></font></td>
<td class="xl27" style="width: 98pt; font-family: ScalaSans; text-align: center;" width="130">Varies</td>
</tr>
<tr style="font-family: ScalaSans;">
<td style="height: 29px;" colspan="2" rowspan="1"><font class="font6"><sup>1</sup></font><small>&nbsp;Regardless
of the action, if you move out of a
threatened square, you usually provoke an attack of opportunity. This
column indicates whether the action itself, not moving, provokes an
attack of opportunity.</small></td>
</tr>
<tr style="font-family: ScalaSans;">
<td style="height: 23px;" colspan="2" rowspan="1"><font class="font6"><sup>2</sup></font><small>
If you aid someone performing an action that
would normally provoke an attack of opportunity, then the act of aiding
another provokes an attack of opportunity as well.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 15px;" width="400"><font class="font6"><sup>3</sup></font><small>
If the object is being held, carried, or worn
by a creature, yes. If not, no.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 22px;" width="400"><font class="font6"><sup>4</sup></font><small>
If you have a base attack bonus of +1 or
higher, you can combine one of these actions with a regular move. If
you have the Two- Weapon Fighting feat, you can draw two light or
one-handed weapons in the time it would normally take you to draw one.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 23px;" width="400"><font class="font6"><sup>5</sup></font><small>&nbsp;May
be taken as a standard action if you are
limited to taking only a single action in a round.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 19px;" width="400"><font class="font6"><sup>6</sup></font><small>
Unless the component is an extremely large or
awkward item.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 9px;" width="400"><font class="font6"><sup>7</sup></font><small>&nbsp;These
attack forms substitute for a melee
attack, not an action. As melee attacks, they can be used once in an
attack or charge action, one or more times in a full attack action, or
even as an attack of opportunity.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl26" style="width: 301pt; height: 20px;" width="400"><font class="font6"><sup>8</sup></font><small>
The description of a feat defines its effect.</small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; text-align: center; width: 301pt; background-color: black;"><a name="Armor_Class_Modifiers"></a>Armor Class Modifiers</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; font-family: ScalaSans; font-weight: bold; width: 135pt; text-align: center;" height="20" width="180">Defender is . . .</td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="110">Melee</td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="110">Ranged</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Behind cover</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+4</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+4</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; text-align: center;" height="20" width="180">Blinded</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Concealed or invisible</td>
<td colspan="2" class="xl27" style="width: 166pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="220">&#8212;
See Concealment &#8212;</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; text-align: center;" height="20" width="180">Cowering</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Entangled</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+0<font class="font5"><sup>2</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+0<font class="font5"><sup>2</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; text-align: center;" height="20" width="180">Flat-footed (such as
surprised, balancing, climbing)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110">+0<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110">+0<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Grappling (but attacker is
not)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+0<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">+0<font class="font5"><sup>1,
3</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; text-align: center;" height="20" width="180">Helpless (such as paralyzed,
sleeping, or bound)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;4<font class="font5"><sup>4</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110">+0<font class="font5"><sup>4</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Kneeling or sitting</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;2</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; text-align: center;" height="20" width="180">Pinned</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;4<font class="font5"><sup>4</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110">+0<font class="font5"><sup>4</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Prone</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+0<font class="font5"><sup>4</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; text-align: center;" height="20" width="180">Squeezing through a space</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;4</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 135pt; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Stunned</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>1</sup></font><small>
&nbsp;The defender loses any Dexterity bonus to AC.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>2</sup></font><small>&nbsp;
An
entangled character takes a &#8211;4 penalty to Dexterity.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>3</sup></font><small>
</small><small>Roll
randomly to see which grappling combatant you strike. That defender
loses any Dexterity bonus to AC.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>4</sup></font><small>&nbsp;Treat
the defender&#8217;s Dexterity as 0 (&#8211;5 modifier). Rogues can sneak attack
helpless or pinned defenders.</small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 282px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; width: 301pt; text-align: center; background-color: black;"><a name="Attack_Roll_Modifiers"></a>Attack Roll Modifiers</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 135pt; font-family: ScalaSans; font-weight: bold; text-align: center;" height="20" width="180">Attacker is . . .</td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="110">Melee</td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="110">Ranged</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Dazzled</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;1</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;1</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" height="20" width="180">Entangled</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;2<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Flanking defender</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+2</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8212;</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" height="20" width="180">Invisible</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110">+2<font class="font5"><sup>2</sup></font></td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110">+2<font class="font5"><sup>2</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">On higher ground</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+1</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110">+0</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" height="20" width="180">Prone</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8212;<font class="font5"><sup>3</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="20" width="180">Shaken or frightened</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;2</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" height="20" width="180">Squeezing through a space</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;4</td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="3" class="xl26" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>1</sup></font><small>
An entangled character also takes a &#8211;4 penalty to Dexterity, which may
affect his attack roll.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="3" class="xl29" style="height: 15pt; width: 301pt;" height="20" width="400"><font class="font5"><sup>2</sup></font><small>
The defender loses any Dexterity bonus to AC. This bonus doesn&#8217;t apply
if the target is blinded.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="51">
<td colspan="3" class="xl26" style="width: 301pt; height: 16px;" width="400"><font class="font5"><sup>3</sup></font><small>
Most ranged weapons can&#8217;t be used while the attacker is prone, but you
can use a crossbow or shuriken while prone at no penalty.</small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 409px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; text-align: center; background-color: black; width: 115px;" height="20"><a name="Common_Armor_Weapon_and_Shield_Hardness_and_Hit_Points"></a>Common
Armor, Weapon, and
Shield Hardness and Hit Points</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; font-family: ScalaSans; font-weight: bold; width: 267px; text-align: center;" height="20">Weapon or Shield</td>
<td class="xl25" style="font-family: ScalaSans; font-weight: bold; width: 115px; text-align: center;">Hardness</td>
<td class="xl25" style="font-family: ScalaSans; font-weight: bold; width: 115px; text-align: center;">HP<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 267px; text-align: center;" x:str="Light blade " height="20">Light
blade<span style="">&nbsp;</span></td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 267px; text-align: center;" height="20">One-handed blade</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">5</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="20">Two-handed blade</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 267px; text-align: center;" height="20">Light metal-hafted weapon</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">10</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="20">One-handed metal-hafted weapon</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">20</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 267px; text-align: center;" x:str="Light hafted weapon " height="20">Light
hafted weapon<span style="">&nbsp;</span></td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="20">One-handed hafted weapon</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 267px; text-align: center;" height="20">Two-handed hafted weapon</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">10</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="20">Projectile weapon</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 267px; text-align: center;" height="20">Armor</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;">special<font class="font5"><sup>2</sup></font></td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;">armor
bonus x 5</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="17">Buckler</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center; background-color: rgb(204, 204, 204);" x:num="">5</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; width: 267px; text-align: center;" height="20">Light wooden shield</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">7</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="17">Heavy wooden shield</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">15</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; width: 267px; text-align: center;" height="17">Light steel shield</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">10</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 267px; text-align: center;" height="17">Heavy steel shield</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">10</td>
<td class="xl27" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 115px; text-align: center;" x:num="">20</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; width: 267px; text-align: center;" height="17">Tower shield</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">5</td>
<td class="xl27" style="font-family: ScalaSans; width: 115px; text-align: center;" x:num="">20</td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="3" class="xl26" style="text-align: justify; width: 115px; height: 30px;"><font class="font5"><sup>1</sup></font><small>&nbsp;The
hp value given is for Medium armor, weapons, and shields. Divide by 2
for each size category of the item smaller than Medium, or multiply it
by 2 for each size category larger than Medium.</small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="3" class="xl26" style="width: 115px; height: 15px;"><font class="font5"><sup>2</sup></font><small>&nbsp;Varies
by material.</small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 316px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; width: 301pt; text-align: center; background-color: black;"><a name="Creature_Size_and_Scale"></a>Creature Size and
Scale</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 135pt; font-family: ScalaSans; font-weight: bold; text-align: center;">Creature
Size</td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;">Space<font class="font5"><sup>1</sup></font></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;">Natural
Reach<font class="font5"><sup>1</sup></font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Fine</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">1/2
ft.</td>
<td class="xl27" x:num="" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">0</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;">Diminutive</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">1
ft.</td>
<td class="xl27" x:num="" style="width: 83pt; font-family: ScalaSans; text-align: center;">0</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Tiny</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">2-1/2
ft.</td>
<td class="xl27" x:num="" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">0</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;">Small</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">5
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">5
ft.</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Medium</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">5
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">5
ft.</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;">Large
(tall)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">10
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">10
ft.</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Large
(long)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">10
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">5
ft.</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;">Huge
(tall)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">15
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">15
ft.</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Huge
(long)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">15
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">10
ft.</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;">Gargantuan
(tall)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">20
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">20
ft.</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Gargantuan
(long)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">20
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">15
ft.</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;">Colossal
(tall)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">30
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;">30
ft.</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Colossal
(long)</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">30
ft.</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">20
ft.</td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="3" rowspan="2" class="xl26" style="width: 301pt; height: 12px;"><font class="font5"><sup>1</sup></font><small>&nbsp;These
values are typical for creatures of the indicated size. Some exceptions
exist.</small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; width: 301pt; text-align: center; background-color: black;"><a name="Special_Attacks"></a>Special
Attacks</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 135pt; font-family: ScalaSans; font-weight: bold; text-align: center;" x:str="Special Attack " height="20" width="180">Special
Attack<span style="">&nbsp;</span></td>
<td colspan="2" class="xl24" style="width: 166pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="220">Brief
Description</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:str="Aid another " height="20" width="180">Aid
another<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="220">Grant
an ally a +2 bonus on attacks or AC</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" x:str="Bull rush " height="20" width="180">Bull
rush<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; text-align: center;" width="220">Push
an opponent back 5 feet or more</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:str="Charge " height="20" width="180">Charge<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="220">Move
up to twice your speed and attack with +2 bonus</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" x:str="Disarm " height="20" width="180">Disarm<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; text-align: center;" width="220">Knock
a weapon from your opponent&#8217;s hands</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:str="Feint " height="20" width="180">Feint<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="220">Negate
your opponent&#8217;s Dex bonus to AC</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" x:str="Grapple " height="20" width="180">Grapple<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; text-align: center;" width="220">Wrestle
with an opponent</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:str="Overrun " height="20" width="180">Overrun<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="220">Plow
past or over an opponent as you move</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" x:str="Sunder " height="20" width="180">Sunder<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; text-align: center;" width="220">Strike
an opponent&#8217;s weapon or shield</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:str="Throw splash weapon " height="20" width="180">Throw
splash weapon<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="220">Throw
container of dangerous liquid at target</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" x:str="Trip " height="20" width="180">Trip<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; text-align: center;" width="220">Trip
an opponent</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:str="Turn (rebuke) undead " height="20" width="180">Turn
(rebuke) undead<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="220">Channel
positive (or negative) energy to turn away (or awe) undead</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 135pt; font-family: ScalaSans; text-align: center;" x:str="Two-weapon fighting " height="20" width="180">Two-weapon
fighting<span style="">&nbsp;</span></td>
<td colspan="2" class="xl25" style="width: 166pt; font-family: ScalaSans; text-align: center;" width="220">Fight
with a weapon in each hand</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="3" class="xl24" style="height: 15pt; text-align: center; width: 169px; background-color: black;"><a name="Tactical_Speed"></a>Tactical
Speed</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; font-family: ScalaSans; font-weight: bold; width: 161px; text-align: center;" x:str="Race " height="20">Race<span style="">&nbsp;</span></td>
<td class="xl26" style="font-family: ScalaSans; font-weight: bold; width: 169px; text-align: center;">No
Armor or <font class="font5">Light Armor</font></td>
<td class="xl26" style="font-family: ScalaSans; font-weight: bold; width: 167px; text-align: center;">Medium
or<font class="font5"> Heavy Armor</font></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 161px; background-color: rgb(204, 204, 204); text-align: center;" height="20">Human, elf, half-elf, half-orc</td>
<td class="xl25" style="font-family: ScalaSans; width: 169px; background-color: rgb(204, 204, 204); text-align: center;">30
ft.(6 squares)</td>
<td class="xl25" style="font-family: ScalaSans; width: 167px; background-color: rgb(204, 204, 204); text-align: center;">20
ft.(4 squares)</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 161px; text-align: center;" height="20">Dwarf</td>
<td class="xl25" style="font-family: ScalaSans; width: 169px; text-align: center;">20
ft.(4 squares)</td>
<td class="xl25" style="font-family: ScalaSans; width: 167px; text-align: center;">20
ft.(4 squares)</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 161px; background-color: rgb(204, 204, 204); text-align: center;" height="20">Halfling, gnome</td>
<td class="xl25" style="font-family: ScalaSans; width: 169px; background-color: rgb(204, 204, 204); text-align: center;">20
ft.(4 squares)</td>
<td class="xl25" style="font-family: ScalaSans; width: 167px; background-color: rgb(204, 204, 204); text-align: center;">15
ft.(3 squares)</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 98pt;" width="130"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" height="20">
<td colspan="2" class="xl26" style="height: 15pt; text-align: center; width: 356px; background-color: black;"><a name="Turning_Undead"></a>Turning
Undead</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; font-family: ScalaSans; font-weight: bold; width: 142px; text-align: center;" height="20">Turning Check Result</td>
<td style="font-family: ScalaSans; font-weight: bold; width: 356px; text-align: center;" colspan="1" rowspan="1">Most Powerful Undead Affected
(Maximum Hit Dice)</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="17">0 or lower</td>
<td style="font-family: ScalaSans; width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Cleric&#8217;s level &#8211; 4</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 142px; text-align: center;" height="20">1&#8211;3</td>
<td style="font-family: ScalaSans; width: 356px; text-align: center;" colspan="1" rowspan="1">Cleric&#8217;s level &#8211; 3</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="20">4&#8211;6</td>
<td style="font-family: ScalaSans; width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Cleric&#8217;s level &#8211; 2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 142px; text-align: center;" height="20">7&#8211;9</td>
<td style="font-family: ScalaSans; width: 356px; text-align: center;" colspan="1" rowspan="1">Cleric&#8217;s level &#8211; 1</td>
</tr>
<tr style="height: 1pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="20">10&#8211;12</td>
<td style="font-family: ScalaSans; width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Cleric&#8217;s level</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 142px; text-align: center;" height="20">13&#8211;15</td>
<td style="font-family: ScalaSans; width: 356px; text-align: center;" colspan="1" rowspan="1">Cleric&#8217;s level + 1</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="20">16&#8211;18</td>
<td style="font-family: ScalaSans; width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Cleric&#8217;s level + 2</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 142px; text-align: center;" height="20">19&#8211;21</td>
<td style="font-family: ScalaSans; width: 356px; text-align: center;" colspan="1" rowspan="1">Cleric&#8217;s level + 3</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 142px; background-color: rgb(204, 204, 204); text-align: center;" height="20">22 or higher</td>
<td style="font-family: ScalaSans; width: 356px; background-color: rgb(204, 204, 204); text-align: center;" colspan="1" rowspan="1">Cleric&#8217;s level + 4</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="3" class="xl24" style="height: 12.75pt; width: 301pt; text-align: center; background-color: black;"><a name="Two-Weapon_Fighting_Penalties"></a>Two-Weapon
Fighting Penalties</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt; width: 135pt; font-family: ScalaSans; font-weight: bold; text-align: center;" height="17" width="180">Circumstances</td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="110">Primary Hand</td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="110">Off Hand</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="17" width="180">Normal penalties</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;6</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;10</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; width: 135pt; font-family: ScalaSans; text-align: center;" height="17" width="180">Off-hand weapon is light</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;8</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="17" width="180">Two-Weapon Fighting feat</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;4</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110">&#8211;4</td>
</tr>
<tr style="height: 25.5pt;" height="34">
<td class="xl26" style="height: 25.5pt; width: 135pt; font-family: ScalaSans; text-align: center;" height="34" width="180">Off-hand weapon is light and
Two-Weapon Fighting
feat</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;2</td>
<td class="xl27" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110">&#8211;2</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 87pt;" width="116"> <col style="width: 37pt;" width="49"> <col style="width: 68pt;" width="90"> <col style="width: 68pt;" width="91"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" height="20">
<td colspan="4" style="height: 15pt; width: 151px; text-align: center; background-color: black;"><a name="Skills"></a>Skills</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; font-weight: bold;" height="20">Skill</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; font-weight: bold;">Abilitiy</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; font-weight: bold;">Trained
Only</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; font-weight: bold;">Armor
Penalty</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Appraise</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Int</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Balance</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Dex</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Bluff</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Cha</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Climb</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Str</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Concentration</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Con</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Craft</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Int</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Decipher Script</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Int</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Diplomacy</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Cha</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Disable Device</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Int</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Disguise</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Cha</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Escape Artist</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Dex</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Forgery</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Int</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Gather Information</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Cha</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Handle Animal</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Cha</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Heal</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Wis</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Hide</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Dex</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Intimidate</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Cha</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Jump</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Str</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Knowledge</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Int</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Listen</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Wis</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Move Silently</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Dex</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Open Lock</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Dex</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Perform</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Cha</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Profession</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Wis</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Ride</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Dex</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Search</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Int</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Sense Motive</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Wis</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Sleight of Hand</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Dex</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Speak Language</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">None</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Spellcraft</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Int</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Spot</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Wis</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Survival</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Wis</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Swim</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Str</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Tumble</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Dex</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20">Use Magic Device</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">Cha</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);">No</td>
</tr>
<tr style="height: 15pt;" height="20">
<td style="height: 15pt; width: 500px; font-family: ScalaSans; text-align: center;" height="20">Use Rope</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Dex</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">Yes</td>
<td style="width: 151px; font-family: ScalaSans; text-align: center;">No</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <col style="width: 48pt;" width="64"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="4" class="xl25" style="height: 12.75pt; text-align: center; width: 95px; background-color: black;"><a name="Balance"></a>Balance</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; font-family: ScalaSans; width: 155px; font-weight: bold; text-align: center;" x:str="Narrow Surface " height="20"><span lang="EN-US">Narrow Surface<span style="">&nbsp;</span></span></td>
<td class="xl24" style="font-family: ScalaSans; width: 100px; font-weight: bold; text-align: center;"><span lang="EN-US">Balance DC<font class="font6"><sup>1</sup></font><font class="font5"><span style="">&nbsp;</span></font></span></td>
<td class="xl24" style="font-family: ScalaSans; width: 143px; font-weight: bold; text-align: center;"><span lang="EN-US">Difficult Surface</span></td>
<td class="xl24" style="font-family: ScalaSans; width: 95px; font-weight: bold; text-align: center;"><span lang="EN-US">Balance DC<font class="font6"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 155px; text-align: center;" x:str="7&#8211;12 inches wide " height="17"><span lang="EN-US">7&#8211;12 inches wide<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 100px; text-align: center;" x:num=""><span lang="EN-US">10</span></td>
<td class="xl25" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 143px; text-align: center;" x:str="Uneven flagstone "><span lang="EN-US">Uneven
flagstone<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 95px; text-align: center;" x:num=""><span lang="EN-US">10</span><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US"></span></small></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; width: 155px; text-align: center;" x:str="2&#8211;6 inches wide " height="17"><span lang="EN-US">2&#8211;6 inches wide<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 100px; text-align: center;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 143px; text-align: center;" x:str="Hewn stone floor "><span lang="EN-US">Hewn
stone floor<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 95px; text-align: center;" x:num=""><span lang="EN-US">10</span><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US"></span></small></td>
</tr>
<tr style="height: 15pt;" height="34">
<td class="xl25" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 155px; text-align: center; height: 15pt;" x:str="Less than 2 inches wide " height="20"><span lang="EN-US">Less than 2 inches wide<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 100px; text-align: center;" x:num=""><span lang="EN-US">20</span></td>
<td class="xl25" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 143px; text-align: center;" x:str="Sloped or angled floor "><span lang="EN-US">Sloped
or angled floor<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 95px; text-align: center;" x:num=""><span lang="EN-US">10</span><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US"></span></small></td>
</tr>
<tr style="height: 13.5pt; font-family: ScalaSans;" height="18">
<td colspan="4" class="xl25" style="width: 95px; height: 13.5pt;" height="18"><span lang="EN-US"><font class="font6"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;Add modifiers from Narrow Surface
Modifiers, below, as appropriate.</span></small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="4" class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 95px;" height="20"><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US">&nbsp;Only if running or charging. Failure
by 4 or less means the character can&#8217;t run or charge, but may otherwise
act normally.</span></small></td>
</tr>
</tbody>
</table>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col style="width: 83pt;" width="110"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="2" rowspan="1" class="xl24" style="height: 12.75pt; width: 135pt; text-align: center; background-color: rgb(102, 102, 102);"><span lang="EN-US">Narrow
Surface Modifiers</span></td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl24" style="height: 15.75pt; width: 135pt; font-family: ScalaSans; font-weight: bold; text-align: center;" x:str="Surface " height="21" width="180"><span lang="EN-US">Surface<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="110"><span lang="EN-US">DC Modifier<font class="font5"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:str="Lightly obstructed " height="17" width="180"><span lang="EN-US">Lightly obstructed<span style="">&nbsp;&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt; font-family: ScalaSans; text-align: center;" x:str="Severely obstructed " height="17" width="180"><span lang="EN-US">Severely obstructed<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110"><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" height="17" width="180"><span lang="EN-US">Lightly
slippery</span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt; font-family: ScalaSans; text-align: center;" x:str="Severely slippery " height="17" width="180"><span lang="EN-US">Severely slippery<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110"><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; width: 135pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:str="Sloped or angled " height="17" width="180"><span lang="EN-US">Sloped or angled<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="2" class="xl25" style="height: 1pt; width: 218pt;" height="20" width="290"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;Add the appropriate modifier to the
Balance DC of a narrow surface.</span><span lang="EN-US">
These modifiers stack.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 74px;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 98pt;" width="130"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="2" class="xl24" style="height: 12.75pt; width: 157px; text-align: center; background-color: black;"><span lang="EN-US"><a name="Bluff_Examples"></a>Bluff</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="font-family: ScalaSans; width: 341px; font-weight: bold; text-align: center; height: 8px;"><span lang="EN-US">Example
Circumstances</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 157px; font-weight: bold; text-align: center; height: 8px;"><span lang="EN-US">Sense Motive Modifier</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; width: 341px; background-color: rgb(204, 204, 204); text-align: center; height: 0px;"><span lang="EN-US">The target wants
to believe you.</span></td>
<td class="xl27" style="font-family: ScalaSans; width: 157px; background-color: rgb(204, 204, 204); text-align: center; height: 0px;"><span lang="EN-US">&#8211;5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; width: 341px; text-align: center; height: 0px;" x:str="The bluff is believable and doesn&#8217;t affect the target much. "><span lang="EN-US">The bluff is
believable and doesn&#8217;t affect the target much.<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; width: 157px; text-align: center; height: 0px;" x:num=""><span lang="EN-US">+0</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; width: 341px; background-color: rgb(204, 204, 204); text-align: center; height: 16px;" x:str="The bluff is a little hard to believe or puts the target at some risk. "><span lang="EN-US">The bluff is a
little hard to believe or puts the target at some risk.<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; width: 157px; background-color: rgb(204, 204, 204); text-align: center; height: 16px;" x:num=""><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; width: 341px; text-align: center; height: 21px;" x:str="The bluff is hard to believe or puts the target at significant risk. "><span lang="EN-US">The bluff is
hard to believe or puts the target at significant risk.<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; width: 157px; text-align: center; height: 21px;" x:num=""><span lang="EN-US">+10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; width: 341px; background-color: rgb(204, 204, 204); text-align: center; height: 19px;"><span lang="EN-US">The bluff is way
out there, almost too incredible to consider.</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; width: 157px; background-color: rgb(204, 204, 204); text-align: center; height: 19px;" x:num=""><span lang="EN-US">+20</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table style="border-collapse: collapse; width: 100%; height: 102px;" x:str="" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col style="width: 83pt;" width="110"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="2" style="width: 362px; height: 15px; text-align: center; background-color: black;"><a name="Climb"></a>Climb</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 136px; height: 15px; font-family: ScalaSans; font-weight: bold; text-align: center;" x:str="Climb DC "><span lang="EN-US">Climb DC<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 362px; height: 15px; font-family: ScalaSans; font-weight: bold; text-align: center;"><span lang="EN-US">Example
Surface or Activity</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="width: 136px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 9px;" x:num=""><span lang="EN-US">0</span></td>
<td class="xl25" style="width: 362px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 9px;"><span lang="EN-US">A
slope too steep to walk up, or a knotted rope
with a wall to brace against.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="width: 136px; font-family: ScalaSans; text-align: center; height: 11px;" x:num=""><span lang="EN-US">5</span></td>
<td class="xl25" style="width: 362px; font-family: ScalaSans; text-align: center; height: 11px;"><span lang="EN-US">A
rope with a wall to brace against, or a
knotted rope, or a rope affected by the <font class="font8"><span style="font-style: italic;">rope
trick</span> </font><font class="font5">spell.<span style="">&nbsp;</span></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="width: 136px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 4px;" x:num=""><span lang="EN-US">10</span></td>
<td class="xl25" style="width: 362px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 4px;" x:str="A surface with ledges to hold on to and stand on, such as a very rough wall or a ship&#8217;s rigging. "><span lang="EN-US">A surface with ledges to hold on to and stand
on, such as a very rough wall or a ship&#8217;s rigging.<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="width: 136px; font-family: ScalaSans; text-align: center; height: 18px;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl25" style="width: 362px; font-family: ScalaSans; text-align: center; height: 18px;" x:str="Any surface with adequate handholds and footholds (natural or artificial), such as a very rough natural rock surface or a tree, or an unknotted rope, or pulling yourself up when dangling by your hands. "><span lang="EN-US">Any surface with adequate handholds and
footholds (natural or artificial), such as a very rough natural rock
surface or a tree, or an unknotted rope, or pulling yourself up when
dangling by your hands.<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="width: 136px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 20px;" x:num=""><span lang="EN-US">20</span></td>
<td class="xl25" style="width: 362px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 20px;" x:str="An uneven surface with some narrow handholds and footholds, such as a typical wall in a dungeon or ruins. "><span lang="EN-US">An uneven surface with some narrow handholds
and footholds, such as a typical wall in a dungeon or ruins.<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="width: 15px; font-family: ScalaSans; text-align: center; height: 0px;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl25" style="width: 362px; font-family: ScalaSans; text-align: center; height: 0px;" x:str="A rough surface, such as a natural rock wall or a brick wall. "><span lang="EN-US">A rough surface, such as a natural rock wall or
a brick wall.<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="width: 136px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 0px;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl25" style="width: 362px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 0px;" x:str="An overhang or ceiling with handholds but no footholds. "><span lang="EN-US">An overhang or ceiling with handholds but no
footholds.<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; width: 136px; font-family: ScalaSans; text-align: center; height: 0px;" x:str="&#8212; "><span lang="EN-US">&#8212;<span style="">&nbsp;</span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; width: 362px; font-family: ScalaSans; text-align: center; height: 0px;"><span lang="EN-US">A perfectly smooth, flat, vertical surface
cannot be climbed.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 136px; font-family: ScalaSans; font-weight: bold; background-color: rgb(204, 204, 204); text-align: center; height: 19px;"><span lang="EN-US">Climb
DC Modifier<font class="font7"><sup>1</sup></font><font class="font6"><span style="">&nbsp;</span></font></span></td>
<td class="xl26" style="width: 362px; font-family: ScalaSans; font-weight: bold; background-color: rgb(204, 204, 204); text-align: center; height: 19px;"><span lang="EN-US">Example
Surface or Activity</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="width: 136px; font-family: ScalaSans; text-align: center; height: 2px;"><span lang="EN-US">&#8211;10</span></td>
<td class="xl27" style="width: 362px; font-family: ScalaSans; text-align: center; height: 2px;"><span lang="EN-US"><span style=""></span>Climbing
a chimney (artificial or natural) or other location where you can brace
against two opposite walls (reduces DC by 10).</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="width: 136px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 11px;" x:str="&#8211;5 "><span lang="EN-US">&#8211;5<span style=""></span></span></td>
<td class="xl27" style="width: 362px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; height: 11px;"><span lang="EN-US">Climbing
a corner where you can brace against
perpendicular walls (reduces DC by 5).</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td x:num="" style="width: 136px; font-family: ScalaSans; text-align: center; height: 0px;" class="xl27"><span lang="EN-US">+5</span></td>
<td class="xl27" style="width: 362px; font-family: ScalaSans; text-align: center; height: 0px;"><span lang="EN-US"><span style="">&nbsp;</span>Surface
is slippery (increases DC by 5).</span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="2" class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; width: 362px; height: 3px;"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;</span><span lang="EN-US">These
modifiers
are cumulative; use any that apply.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 521pt;" width="694"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk;" height="17">
<td colspan="2" style="height: 12.75pt; width: 306px; text-align: center; background-color: black;"><span style="color: white;"><a name="Concentration"></a>Concentration</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; font-family: ScalaSans; width: 192px; font-weight: bold; text-align: center;" height="20"><span lang="EN-US">Concentration DC<font class="font7"><sup>1</sup></font><font class="font6"><span style="">&nbsp;</span></font></span></td>
<td class="xl24" style="font-family: ScalaSans; width: 306px; font-weight: bold; text-align: center;"><span lang="EN-US">Distraction</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:str="10 + damage dealt " height="20"><span lang="EN-US">10 + damage dealt<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Damaged during the action.<font class="font7"><sup>2</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; text-align: center;" x:str="10 + half of continuous " height="20"><span lang="EN-US">10 + half of continuous<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; text-align: center;"><span lang="EN-US">Taking continuous damage during the damage last
dealt action.<font class="font7"><sup>3</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Distracting spell&#8217;s save DC " height="20"><span lang="EN-US">Distracting spell&#8217;s save DC<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Distracted by nondamaging spell.<font class="font7"><sup>4</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; text-align: center;" x:num="" height="20"><span lang="EN-US">10</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; text-align: center;"><span lang="EN-US">Vigorous motion (on a moving mount, taking a
bouncy wagon ride, in a small boat in rough water, belowdecks in a
stormtossed ship).</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:num="" height="20"><span lang="EN-US">15</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Violent motion (on a galloping horse, taking a
very rough wagon ride, in a small boat in rapids, on the deck of a
storm-tossed ship).</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; text-align: center;" x:num="" height="20"><span lang="EN-US">20</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; text-align: center;"><span lang="EN-US">Extraordinarily violent motion (earthquake<font class="font8">)</font><font class="font5">.</font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:num="" height="20"><span lang="EN-US">15</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Entangled.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; text-align: center;" x:num="" height="20"><span lang="EN-US">20</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; text-align: center;"><span lang="EN-US">Grappling or pinned. (You can cast only spells
without somatic components for which you have any required material
component in hand.)</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:num="" height="20"><span lang="EN-US">5</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Weather is a high wind carrying blinding rain
or sleet.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; text-align: center;" x:num="" height="20"><span lang="EN-US">10</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; text-align: center;"><span lang="EN-US">Weather is wind-driven hail, dust, or debris.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 192px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Distracting spell&#8217;s save DC " height="20"><span lang="EN-US">Distracting spell&#8217;s save DC<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 306px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Weather caused by a spell, such as <font class="font8"><span style="font-style: italic;">storm of vengeance</span>.</font><font class="font7"><sup>4</sup></font></span></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl25" style="height: 15pt; width: 306px;" height="20"><span lang="EN-US"><font class="font7"><sup>1</sup></font></span><small><span lang="EN-US"> If you are trying to cast, concentrate on, or
direct a spell when the distraction occurs, add the level of the spell
to the indicated DC.</span></small></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl25" style="height: 15pt; width: 306px;" height="20"><span lang="EN-US"><font class="font7"><sup>2</sup></font></span><small><span lang="EN-US"> Such as during the casting of a spell with a
casting time of 1 round or more, or the execution of an activity that
takes more than a single full-round action (such as Disable Device).
Also, damage stemming from an attack of opportunity or readied attack
made in response to the spell being cast (for spells with a casting
time of 1 action) or the action being taken (for activities requiring
no more than a full-round action).</span></small></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl25" style="height: 15pt; width: 306px;" height="20"><span lang="EN-US"><font class="font7"><sup>2</sup></font></span><small><span lang="EN-US">&nbsp;Such as from <font style="font-style: italic;" class="font8">acid
arrow</font><font class="font5">.</font></span></small></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 306px;" height="20"><span lang="EN-US"><font class="font7"><sup>4</sup></font></span><small><span lang="EN-US">&nbsp;If the spell allows no save, use the
save DC it would have if it did allow a save.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="3" style="height: 12.75pt; width: 124px; text-align: center; background-color: black;"><a name="Craft"></a>Craft</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt; font-family: ScalaSans; width: 240px; font-weight: bold; text-align: center;" x:str="Item " height="17"><span lang="EN-US">Item<span style="">&nbsp;</span></span></td>
<td class="xl24" style="font-family: ScalaSans; width: 124px; font-weight: bold; text-align: center;" x:str="Craft Skill "><span lang="EN-US">Craft
Skill<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 83pt; font-family: ScalaSans; font-weight: bold; text-align: center;" width="110"><span lang="EN-US">Craft DC</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Acid " height="20"><span lang="EN-US">Acid<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Alchemy<font class="font6"><sup>1</sup></font><font class="font5"><span style="">&nbsp;</span></font></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; text-align: center;" x:str="Alchemist&#8217;s fire, smokestick, or tindertwig " height="20"><span lang="EN-US">Alchemist&#8217;s fire, smokestick, or tindertwig<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; text-align: center;"><span lang="EN-US">Alchemy<font class="font6"><sup>1</sup></font><font class="font5"><span style="">&nbsp;</span></font></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110"><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Antitoxin, sunrod, tanglefoot bag, or thunderstone " height="20"><span lang="EN-US">Antitoxin,
sunrod, tanglefoot bag, or thunderstone<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Alchemy<font class="font6"><sup>1</sup></font><font class="font5"><span style="">&nbsp;</span></font></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; text-align: center;" x:str="Armor or shield " height="20"><span lang="EN-US">Armor or shield<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; text-align: center;" x:str="Armorsmithing "><span lang="EN-US">Armorsmithing<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110"><span lang="EN-US">10 + AC bonus</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; text-align: center;" x:str="Longbow or shortbow " height="20"><span lang="EN-US">Longbow or shortbow<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; text-align: center;" x:str="Bowmaking "><span lang="EN-US">Bowmaking<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110"><span lang="EN-US">12</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; background-color: rgb(204, 204, 204); text-align: center;" height="20"><span lang="EN-US">Composite
longbow or composite shortbow</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Bowmaking "><span lang="EN-US">Bowmaking<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; text-align: center;" height="20"><span lang="EN-US">Composite
longbow or composite shortbow with high strength rating</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; text-align: center;" x:str="Bowmaking "><span lang="EN-US">Bowmaking<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" width="110"><span lang="EN-US">15 + (2 × rating)</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Crossbow " height="20"><span lang="EN-US">Crossbow<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Weaponsmithing "><span lang="EN-US">Weaponsmithing<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; text-align: center;" x:str="Simple melee or thrown weapon " height="20"><span lang="EN-US">Simple melee or thrown weapon<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; text-align: center;" x:str="Weaponsmithing "><span lang="EN-US">Weaponsmithing<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110"><span lang="EN-US">12</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Martial melee or thrown weapon " height="20"><span lang="EN-US">Martial melee or thrown weapon<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Weaponsmithing "><span lang="EN-US">Weaponsmithing<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; text-align: center;" x:str="Exotic melee or thrown weapon " height="20"><span lang="EN-US">Exotic melee or thrown weapon<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; text-align: center;" x:str="Weaponsmithing "><span lang="EN-US">Weaponsmithing<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110"><span lang="EN-US">18</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Mechanical trap " height="20"><span lang="EN-US">Mechanical trap<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Trapmaking "><span lang="EN-US">Trapmaking<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" width="110"><span lang="EN-US">Varies<font class="font6"><sup>2</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; text-align: center;" x:str="Very simple item (wooden spoon) " height="20"><span lang="EN-US">Very simple item (wooden spoon)<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; text-align: center;"><span lang="EN-US">Varies</span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110"><span lang="EN-US">5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Typical item (iron pot) " height="20"><span lang="EN-US">Typical item (iron pot)<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Varies "><span lang="EN-US">Varies<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; text-align: center;" height="20"><span lang="EN-US">High-quality
item (bell)</span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; text-align: center;" x:str="Varies "><span lang="EN-US">Varies<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; text-align: center;" x:num="" width="110"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; width: 240px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Complex or superior item (lock) " height="20"><span lang="EN-US">Complex or superior item (lock)<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; width: 124px; background-color: rgb(204, 204, 204); text-align: center;" x:str="Varies "><span lang="EN-US">Varies<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 83pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center;" x:num="" width="110"><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt; page-break-inside: avoid; font-family: ScalaSans;" height="17">
<td colspan="3" class="xl25" style="height: 12.75pt; width: 124px;" height="17"><span lang="EN-US"><font class="font6"><sup>1</sup></font><font class="font5"><span style=""></span></font></span><small><span lang="EN-US">&nbsp;You must be a spellcaster to craft
any of these items.</span></small></td>
</tr>
<tr style="height: 12.75pt; page-break-inside: avoid; font-family: ScalaSans;" height="17">
<td colspan="3" class="xl25" style="height: 12.75pt; padding-bottom: 0pt; padding-top: 0pt; width: 124px;" height="17"><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US">&nbsp;Traps have their own rules for
construction.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <col span="3" style="width: 48pt;" width="64"> <tbody>
<tr style="color: white; font-family: Scala Sans-Blk;" align="center">
<td style="background-color: black;" colspan="6" rowspan="1"><a name="Diplomacy"></a>Diplomacy</td>
</tr>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="6" style="height: 12.75pt; text-align: center; width: 77px; background-color: rgb(102, 102, 102);" height="17">Influencing
NPC Attitudes</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td colspan="1" rowspan="2" class="xl24" style="height: 12.75pt; font-family: ScalaSans; font-weight: bold; text-align: center; width: 110px;" height="17"><span lang="EN-US">Initial Attitude</span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td colspan="5" class="xl24" style="font-family: ScalaSans; font-weight: bold; text-align: center; width: 77px;"><span lang="EN-US">&#8212;</span><span lang="EN-US">&#8212;&#8212;</span><span lang="EN-US"></span><span lang="EN-US">&#8212;
New Attitude (DC to achieve)&#8212;&#8212;</span><span lang="EN-US">&#8212;</span><span lang="EN-US">&#8212;</span><span lang="EN-US">&#8212;</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 16px; font-family: ScalaSans; font-weight: bold; text-align: center; width: 90px;"><span lang="EN-US">Hostile</span></td>
<td class="xl25" style="height: 16px; font-family: ScalaSans; width: 79px; font-weight: bold; text-align: center;"><span lang="EN-US">Unfriendly</span></td>
<td class="xl25" style="height: 16px; font-family: ScalaSans; width: 77px; font-weight: bold; text-align: center;"><span lang="EN-US">Indifferent</span></td>
<td class="xl25" style="height: 16px; font-family: ScalaSans; width: 80px; font-weight: bold; text-align: center;"><span lang="EN-US">Friendly</span></td>
<td class="xl25" style="height: 16px; font-family: ScalaSans; width: 55px; font-weight: bold; text-align: center;"><span lang="EN-US">Helpful</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 110px;"><span lang="EN-US">Hostile</span></td>
<td class="xl27" style="height: 15px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 90px;"><span lang="EN-US">Less
than 20</span></td>
<td class="xl27" style="height: 15px; font-family: ScalaSans; width: 79px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">20</span></td>
<td class="xl27" style="height: 15px; font-family: ScalaSans; width: 77px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl27" style="height: 15px; font-family: ScalaSans; width: 80px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">35</span></td>
<td class="xl27" style="height: 15px; font-family: ScalaSans; width: 55px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">50</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; text-align: center; width: 110px;" height="20"><span lang="EN-US">Unfriendly</span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 90px;"><span lang="EN-US">Less than 5</span></td>
<td class="xl27" style="font-family: ScalaSans; width: 79px; text-align: center;" x:num=""><span lang="EN-US">5</span></td>
<td class="xl27" style="font-family: ScalaSans; width: 77px; text-align: center;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl27" style="font-family: ScalaSans; width: 80px; text-align: center;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl27" style="font-family: ScalaSans; width: 55px; text-align: center;" x:num=""><span lang="EN-US">40</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 11px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 110px;"><span lang="EN-US">Indifferent</span></td>
<td class="xl27" style="height: 11px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 90px;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="height: 11px; font-family: ScalaSans; width: 79px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Less
than 1</span></td>
<td class="xl27" style="height: 11px; font-family: ScalaSans; width: 77px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">1</span></td>
<td class="xl27" style="height: 11px; font-family: ScalaSans; width: 80px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl27" style="height: 11px; font-family: ScalaSans; width: 55px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 26px; font-family: ScalaSans; text-align: center; width: 110px;"><span lang="EN-US">Friendly</span></td>
<td class="xl27" style="height: 26px; font-family: ScalaSans; text-align: center; width: 90px;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="height: 26px; font-family: ScalaSans; width: 79px; text-align: center;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="height: 26px; font-family: ScalaSans; width: 77px; text-align: center;"><span lang="EN-US">Less
than 1</span></td>
<td class="xl27" style="height: 26px; font-family: ScalaSans; width: 80px; text-align: center;" x:num=""><span lang="EN-US">1</span></td>
<td class="xl27" style="height: 26px; font-family: ScalaSans; width: 55px; text-align: center;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 110px;"><span lang="EN-US">Helpful</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 90px;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px; font-family: ScalaSans; width: 79px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px; font-family: ScalaSans; width: 77px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">&#8212;</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px; font-family: ScalaSans; width: 80px; background-color: rgb(204, 204, 204); text-align: center;"><span lang="EN-US">Less than 1</span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; height: 20px; font-family: ScalaSans; width: 55px; background-color: rgb(204, 204, 204); text-align: center;" x:num=""><span lang="EN-US">1</span></td>
</tr>
</tbody>
</table>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 135pt;" width="180"> <col span="2" style="width: 83pt;" width="110"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="3" class="xl26" style="height: 12.75pt; width: 208px; background-color: rgb(102, 102, 102);">NPC
Attitudes</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt; font-family: ScalaSans; font-weight: bold; text-align: center; width: 75px;" x:str="Attitude " height="17"><span lang="EN-US">Attitude<span style="">&nbsp;</span></span></td>
<td class="xl24" style="font-family: ScalaSans; font-weight: bold; text-align: center; width: 211px;" x:str="Means "><span lang="EN-US">Means<span style="">&nbsp;</span></span></td>
<td class="xl24" style="font-family: ScalaSans; font-weight: bold; text-align: center; width: 208px;"><span lang="EN-US">Possible Actions</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 75px;" x:str="Hostile " height="17"><span lang="EN-US">Hostile<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 211px;" x:str="Will take risks to hurt you "><span lang="EN-US">Will
take risks to hurt you<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 208px;"><span lang="EN-US">Attack, interfere, berate, flee</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 27px; font-family: ScalaSans; text-align: center; width: 75px;" x:str="Unfriendly "><span lang="EN-US">Unfriendly<span style="">&nbsp;</span></span></td>
<td class="xl25" style="height: 27px; font-family: ScalaSans; text-align: center; width: 211px;" x:str="Wishes you ill "><span lang="EN-US">Wishes
you ill<span style="">&nbsp;</span></span></td>
<td class="xl25" style="height: 27px; font-family: ScalaSans; text-align: center; width: 208px;"><span lang="EN-US">Mislead,
gossip, avoid, watch suspiciously,
insult</span></td>
</tr>
<tr style="height: 15pt;" height="34">
<td class="xl25" style="height: 18px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 75px;" x:str="Indifferent "><span lang="EN-US">Indifferent<span style="">&nbsp;</span></span></td>
<td class="xl25" style="height: 18px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 211px;" x:str="Doesn&#8217;t much care "><span lang="EN-US">Doesn&#8217;t
much care<span style="">&nbsp;</span></span></td>
<td class="xl25" style="height: 18px; font-family: ScalaSans; background-color: rgb(204, 204, 204); text-align: center; width: 208px;"><span lang="EN-US">Socially
expected interaction</span></td>
</tr>
<tr style="height: 15pt;" height="51">
<td class="xl25" style="font-family: ScalaSans; height: 33px; text-align: center; width: 75px;" x:str="Friendly "><span lang="EN-US">Friendly<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; height: 33px; text-align: center; width: 211px;" x:str="Wishes you well "><span lang="EN-US">Wishes
you well<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; height: 33px; text-align: center; width: 208px;"><span lang="EN-US">Chat, advise, offer limited help, advocate</span></td>
</tr>
<tr style="height: 15pt;" height="34">
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; height: 21px; background-color: rgb(204, 204, 204); text-align: center; width: 75px;" x:str="Helpful "><span lang="EN-US">Helpful<span style="">&nbsp;</span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; height: 21px; background-color: rgb(204, 204, 204); text-align: center; width: 211px;" x:str="Will take risks to help you "><span lang="EN-US">Will
take risks to help you<span style="">&nbsp;</span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; height: 21px; background-color: rgb(204, 204, 204); text-align: center; width: 208px;"><span lang="EN-US">Protect, back up, heal, aid</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 150px;" border="0" cellpadding="0" cellspacing="0">
<col span="4" style="width: 48pt;" width="64">
<tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="4" style="height: 12.75pt; width: 198px; background-color: black;"><a name="Disable_Device"></a>Disable
Device</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="width: 48pt; height: 15px; font-family: ScalaSans; text-align: center; font-weight: bold;" x:str="Device " width="64"><span lang="EN-US">Device<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 48pt; height: 19px; font-family: ScalaSans; text-align: center; font-weight: bold;" width="64"><span lang="EN-US">Time</span></td>
<td class="xl27" style="width: 128px; height: 19px; font-family: ScalaSans; text-align: center; font-weight: bold;"><span lang="EN-US">Disable Device DC<font class="font5"><sup>1</sup></font></span></td>
<td class="xl26" style="width: 198px; height: 19px; font-family: ScalaSans; text-align: center; font-weight: bold;"><span lang="EN-US">Example</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 48pt; height: 19px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" width="64"><span lang="EN-US">Simple</span></td>
<td class="xl24" style="width: 48pt; height: 19px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" width="64"><span lang="EN-US">1 round</span></td>
<td class="xl25" style="width: 128px; height: 19px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">10</span></td>
<td class="xl24" style="width: 198px; height: 19px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);"><span lang="EN-US">Jam a lock</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 48pt; height: 13px; font-family: ScalaSans; text-align: center;" width="64"><span lang="EN-US">Tricky</span></td>
<td class="xl24" style="width: 48pt; height: 13px; font-family: ScalaSans; text-align: center;" width="64"><span lang="EN-US">1d4 rounds</span></td>
<td class="xl25" style="width: 128px; height: 13px; font-family: ScalaSans; text-align: center;" x:num=""><span lang="EN-US">15</span></td>
<td class="xl24" style="width: 198px; height: 13px; font-family: ScalaSans; text-align: center;"><span lang="EN-US">Sabotage a wagon wheel</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 48pt; height: 14px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" width="64"><span lang="EN-US">Difficult</span></td>
<td class="xl24" style="width: 48pt; height: 14px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" width="64"><span lang="EN-US">2d4 rounds</span></td>
<td class="xl25" style="width: 128px; height: 14px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">20</span></td>
<td class="xl24" style="width: 198px; height: 14px; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);"><span lang="EN-US">Disarm a trap, reset a trap</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="width: 48pt; height: 15px; font-family: ScalaSans; text-align: center;" width="64"><span lang="EN-US">Wicked</span></td>
<td class="xl24" style="width: 48pt; height: 15px; font-family: ScalaSans; text-align: center;" width="64"><span lang="EN-US">2d4 rounds</span></td>
<td class="xl25" style="width: 128px; height: 15px; font-family: ScalaSans; text-align: center;" x:num=""><span lang="EN-US">25</span></td>
<td class="xl24" style="width: 198px; height: 15px; font-family: ScalaSans; text-align: center;"><span lang="EN-US">Disarm a complex trap, cleverly sabotage a
clockwork device</span></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; font-family: ScalaSans;" height="20">
<td colspan="4" class="xl24" style="padding-bottom: 0pt; padding-top: 0pt; width: 198px; height: 15px;"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US"> If you attempt to leave behind no trace of
your tampering, add 5 to the DC.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 96pt;" width="128"> <col style="width: 194pt;" width="258"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" style="width: 225px; height: 19px; background-color: black;"><a name="Disguise"></a>Disguise</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl28" style="font-family: ScalaSans; text-align: center; width: 273px; height: 19px; font-weight: bold;" x:str="Disguise "><span lang="EN-US">Disguise<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; text-align: center; width: 225px; height: 19px; font-weight: bold;"><span lang="EN-US">Disguise Check Modifier</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; text-align: center; width: 273px; height: 19px; background-color: rgb(204, 204, 204);" x:str="Minor details only "><span lang="EN-US">Minor
details only<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 225px; height: 19px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; text-align: center; width: 273px; height: 21px;"><span lang="EN-US">Disguised as different gender<font class="font7"><sup>1</sup></font><font class="font6"><span style="">&nbsp;</span></font></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 225px; height: 21px;"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; text-align: center; width: 273px; height: 1px; background-color: rgb(204, 204, 204);"><span lang="EN-US">Disguised as different race<font class="font7"><sup>1</sup></font><font class="font6"><span style="">&nbsp;</span></font></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 225px; height: 1px; background-color: rgb(204, 204, 204);"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; text-align: center; width: 273px; height: 5px;"><span lang="EN-US">Disguised as different age category<font class="font7"><sup>1</sup></font></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 225px; height: 5px;"><span lang="EN-US">&#8211;2<font class="font7"><sup>2</sup></font></span></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; font-family: ScalaSans;" height="20">
<td colspan="2" class="xl29" style="width: 225px; height: 23px;"><span lang="EN-US"><sup>1</sup><small><font class="font5"> These modifiers are cumulative; use any that
apply.</font></small></span></td>
</tr>
<tr style="height: 15pt; page-break-inside: avoid; font-family: ScalaSans;" height="20">
<td colspan="2" class="xl29" style="padding-bottom: 0pt; padding-top: 0pt; width: 225px; height: 3px;"><span lang="EN-US"><sup>2</sup><small><font class="font5"> Per step of difference between your actual
age category and your disguised age category. The steps are: young
(younger than adulthood), adulthood, middle age, old, and venerable.</font></small></span></td>
</tr>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" style="width: 225px; height: 21px; background-color: rgb(102, 102, 102);">Impersonating
a Particular Individual</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl28" style="font-family: ScalaSans; text-align: center; width: 273px; height: 18px; font-weight: bold;"><span lang="EN-US">Familiarity</span></td>
<td class="xl24" style="font-family: ScalaSans; text-align: center; width: 225px; height: 18px; font-weight: bold;"><span lang="EN-US">Viewer&#8217;s Spot Check Bonus</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; text-align: center; width: 273px; height: 20px; background-color: rgb(204, 204, 204);" x:str="Recognizes on sight "><span lang="EN-US">Recognizes
on sight<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 225px; height: 20px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">+4</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; text-align: center; width: 273px; height: 16px;" x:str="Friends or associates "><span lang="EN-US">Friends
or associates<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 225px; height: 16px;" x:num=""><span lang="EN-US">+6</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="font-family: ScalaSans; text-align: center; width: 273px; height: 12px; background-color: rgb(204, 204, 204);" x:str="Close friends "><span lang="EN-US">Close
friends<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 225px; height: 12px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">+8</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; text-align: center; width: 273px; height: 22px;" x:str="Intimate "><span lang="EN-US">Intimate<span style="">&nbsp;</span></span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; text-align: center; width: 225px; height: 22px;" x:num=""><span lang="EN-US">+10</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 521pt;" width="694"> <col style="width: 135pt;" width="180"> <tbody>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" height="17">
<td colspan="2" style="height: 12.75pt; text-align: center; background-color: black; width: 231px;"><a name="Escape_Artist"></a>Escape
Artist</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt; font-family: ScalaSans; font-weight: bold; text-align: center; width: 724px;" x:str="Restraint " height="17"><span lang="EN-US">Restraint<span style="">&nbsp;</span></span></td>
<td class="xl25" style="font-family: ScalaSans; font-weight: bold; text-align: center; width: 231px;"><span lang="EN-US"><st1:place w_x003a_st="on">Escape
Artist DC</st1:place> </span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 724px;" x:str="Ropes Binder&#8217;s " height="17"><span lang="EN-US">Ropes Binder&#8217;s<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 231px;"><span lang="EN-US">Use Rope check at +10</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; text-align: center; width: 724px;" height="17"><span lang="EN-US">Net, <font class="font6"><span style="font-style: italic;">animate rope</span> </font><font class="font5">spell, </font><font class="font6"><span style="font-style: italic;">command
plants</span> </font><font class="font5">spell, </font><font class="font6"><span style="font-style: italic;">control plants</span> </font><font class="font5">spell, or </font><font class="font6"><span style="font-style: italic;">entangle</span>
</font><font class="font5">spell</font></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 231px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 724px;" x:str="Snare spell " height="17"><span lang="EN-US"><span style="font-style: italic;">Snare</span>
spell<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 231px;" x:num=""><span lang="EN-US">23</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; text-align: center; width: 724px;" x:str="Manacles " height="17"><span lang="EN-US">Manacles<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 231px;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 724px;" x:str="Tight space " height="17"><span lang="EN-US">Tight
space<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 231px;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; font-family: ScalaSans; text-align: center; width: 724px;" x:str="Masterwork manacles " height="17"><span lang="EN-US">Masterwork manacles<span style="">&nbsp;</span></span></td>
<td class="xl27" style="font-family: ScalaSans; text-align: center; width: 231px;" x:num=""><span lang="EN-US">35</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 724px;" x:str="Grappler " height="17"><span lang="EN-US">Grappler<span style="">&nbsp;</span></span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 231px;"><span lang="EN-US">Grappler&#8217;s grapple check result</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 203pt;" width="270"> <col style="width: 163pt;" width="217"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" height="17">
<td colspan="2" style="height: 12.75pt; width: 257px; text-align: center; background-color: black;"><a name="Forgery"></a>Forgery</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; font-family: ScalaSans; width: 227px; text-align: center; font-weight: bold;" x:str="Condition " height="17"><span lang="EN-US">Condition<span style="">&nbsp;</span></span></td>
<td class="xl24" style="font-family: ScalaSans; width: 257px; text-align: center; font-weight: bold;"><span lang="EN-US">Reader&#8217;s Forgery Check Modifier</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; width: 227px; text-align: center; background-color: rgb(204, 204, 204);" x:str="Type of document unknown to reader " height="17"><span lang="EN-US">Type of document unknown to reader<span style="">&nbsp;</span></span></td>
<td class="xl26" style="font-family: ScalaSans; width: 257px; text-align: center; background-color: rgb(204, 204, 204);"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; width: 227px; text-align: center;" x:str="Type of document somewhat known to reader " height="17"><span lang="EN-US">Type of document somewhat known to reader<span style="">&nbsp;</span></span></td>
<td class="xl26" style="font-family: ScalaSans; width: 257px; text-align: center;" x:num=""><span lang="EN-US">+0</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; width: 227px; text-align: center; background-color: rgb(204, 204, 204);" x:str="Type of document well known to reader " height="17"><span lang="EN-US">Type of document well known to reader<span style="">&nbsp;</span></span></td>
<td class="xl26" style="font-family: ScalaSans; width: 257px; text-align: center; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; width: 227px; text-align: center;" x:str="Handwriting not known to reader " height="17"><span lang="EN-US">Handwriting not known to reader<span style="">&nbsp;</span></span></td>
<td class="xl26" style="font-family: ScalaSans; width: 257px; text-align: center;"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; width: 227px; text-align: center; background-color: rgb(204, 204, 204);" x:str="Handwriting somewhat known to reader " height="17"><span lang="EN-US">Handwriting somewhat known to reader<span style="">&nbsp;</span></span></td>
<td class="xl26" style="font-family: ScalaSans; width: 257px; text-align: center; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">+0</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; font-family: ScalaSans; width: 227px; text-align: center;" x:str="Handwriting intimately known to reader " height="17"><span lang="EN-US">Handwriting intimately known to reader<span style="">&nbsp;</span></span></td>
<td class="xl26" style="font-family: ScalaSans; width: 257px; text-align: center;" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; width: 227px; text-align: center; background-color: rgb(204, 204, 204);" x:str="Reader only casually reviews the document " height="17"><span lang="EN-US">Reader only casually reviews the document<span style="">&nbsp;</span></span></td>
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; width: 257px; text-align: center; background-color: rgb(204, 204, 204);"><span lang="EN-US">&#8211;2</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 168pt;" width="224"> <col style="width: 83pt;" width="111"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" class="xl26" style="height: 12.75pt; background-color: black; width: 301px;"><a name="Handle_Animal"></a>Handle
Animal</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="height: 12.75pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 654px;" x:str="Task " height="17"><span lang="EN-US">Task<span style="">&nbsp;</span></span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 301px;"><span lang="EN-US">Handle Animal DC</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:str="Handle an animal " height="17"><span lang="EN-US">Handle an animal<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="height: 12.75pt; text-align: center; font-family: ScalaSans; width: 654px;" x:str="&#8220;Push&#8221; an animal " height="17"><span lang="EN-US">&#8220;Push&#8221; an animal<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl25" style="height: 15.75pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:str="Teach an animal a trick " height="21"><span lang="EN-US">Teach an animal a trick<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">15 or 20<font class="font6"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl25" style="text-align: center; font-family: ScalaSans; height: 22px; width: 654px;" x:str="Train an animal for a general purpose "><span lang="EN-US">Train an animal for a general purpose<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; height: 22px; width: 301px;"><span lang="EN-US">15 or 20<font class="font6"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; font-family: ScalaSans; height: 24px; background-color: rgb(204, 204, 204); width: 654px;" x:str="Rear a wild animal "><span lang="EN-US">Rear a wild animal<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; height: 24px; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">15 + HD of animal</span></td>
</tr>
<tr style="height: 15.75pt; font-family: ScalaSans;" align="center" height="21">
<td colspan="2" class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; text-align: justify; height: 17px; width: 301px;"><span lang="EN-US"><sup>1</sup><small><font class="font5"> See the specific trick or purpose below.</font></small></span></td>
</tr>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" align="center" height="17">
<td colspan="2" class="xl26" style="background-color: rgb(102, 102, 102); height: 22px; width: 301px;">Train
an Animal</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="text-align: center; height: 26px; font-weight: bold; font-family: ScalaSans; width: 654px;" x:str="General Purpose "><span lang="EN-US">General Purpose<span style="">&nbsp;</span></span></td>
<td class="xl24" style="text-align: center; height: 26px; font-weight: bold; font-family: ScalaSans; width: 301px;" x:str="DC "><span lang="EN-US">DC<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 15px; background-color: rgb(204, 204, 204); font-family: ScalaSans; width: 654px;" x:str="Combat riding "><span lang="EN-US">Combat riding<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; height: 15px; background-color: rgb(204, 204, 204); font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 21px; font-family: ScalaSans; width: 654px;" x:str="Fighting "><span lang="EN-US">Fighting<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; height: 21px; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 22px; background-color: rgb(204, 204, 204); font-family: ScalaSans; width: 654px;" x:str="Guarding "><span lang="EN-US">Guarding<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; height: 22px; background-color: rgb(204, 204, 204); font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; height: 21px; font-family: ScalaSans; width: 654px;" x:str="Heavy labor "><span lang="EN-US">Heavy
labor<span style="">&nbsp;</span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; height: 21px; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 21px; background-color: rgb(204, 204, 204); font-family: ScalaSans; width: 654px;" x:str="Hunting "><span lang="EN-US">Hunting<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; height: 21px; background-color: rgb(204, 204, 204); font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 19px; font-family: ScalaSans; width: 654px;" x:str="Performance "><span lang="EN-US">Performance<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; height: 19px; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl25" style="text-align: center; height: 22px; background-color: rgb(204, 204, 204); font-family: ScalaSans; width: 654px;" x:str="Riding "><span lang="EN-US">Riding<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; height: 22px; background-color: rgb(204, 204, 204); font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col span="2" style="width: 48pt;" width="64">
<tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" rowspan="1" style="height: 19px; background-color: black; width: 301px;"><a name="Heal"></a>Heal</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="text-align: center; height: 8px; font-family: ScalaSans; font-weight: bold; width: 654px;" x:str="Task Heal "><span lang="EN-US">Task Heal<span style="">&nbsp;</span></span></td>
<td class="xl24" style="text-align: center; height: 8px; font-family: ScalaSans; font-weight: bold; width: 301px;"><span lang="EN-US">DC</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="text-align: center; height: 2px; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;"><span lang="EN-US">First aid</span></td>
<td class="xl25" style="text-align: center; height: 2px; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="text-align: center; height: 0px; font-family: ScalaSans; width: 654px;" x:str="Long-term care "><span lang="EN-US">Long-term
care<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; height: 0px; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="text-align: center; height: 13px; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;"><span lang="EN-US">Treat wound from caltrop, <font class="font6"><span style="font-style: italic;">spike growth</span>, </font><font class="font5">or </font><font class="font6"><span style="font-style: italic;">spike
stones</span><span style="">&nbsp;</span></font></span></td>
<td class="xl26" style="text-align: center; height: 13px; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="text-align: center; height: 22px; font-family: ScalaSans; width: 654px;" x:str="Treat poison "><span lang="EN-US">Treat
poison<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; height: 22px; font-family: ScalaSans; width: 301px;"><span lang="EN-US">Poison&#8217;s save DC</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; height: 20px; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:str="Treat disease "><span lang="EN-US">Treat
disease<span style="">&nbsp;</span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; height: 20px; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">Disease&#8217;s save DC</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 168pt;" width="224"> <col style="width: 83pt;" width="111"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" style="height: 12.75pt; background-color: black; width: 301px;"><a name="Jump"></a>Jump</td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl25" style="height: 15.75pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 654px;" height="21"><span lang="EN-US">Long
Jump Distance</span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 301px;"><span lang="EN-US">Jump DC<font class="font5"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" height="17"><span lang="EN-US">5
feet</span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">5</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center; font-family: ScalaSans; width: 654px;" height="17"><span lang="EN-US">10
feet</span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" height="17"><span lang="EN-US">15
feet</span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center; font-family: ScalaSans; width: 654px;" height="17"><span lang="EN-US">20
feet</span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" height="17"><span lang="EN-US">25
feet</span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl27" style="height: 12.75pt; text-align: center; font-family: ScalaSans; width: 654px;" height="17"><span lang="EN-US">30
feet</span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15.75pt;" height="21">
<td class="xl24" style="height: 15.75pt; text-align: center; font-family: ScalaSans; font-weight: bold; background-color: rgb(204, 204, 204); width: 654px;" height="21"><span lang="EN-US">High
Jump Distance<font class="font5"><sup>2</sup></font></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; font-weight: bold; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">Jump DC<font class="font5"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center; font-family: ScalaSans; width: 654px;" x:str="1 foot " height="17"><span lang="EN-US">1 foot<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">4</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:str="2 feet " height="17"><span lang="EN-US">2 feet<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">8</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center; font-family: ScalaSans; width: 654px;" x:str="3 feet " height="17"><span lang="EN-US">3 feet<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">12</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:str="4 feet " height="17"><span lang="EN-US">4 feet<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">16</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center; font-family: ScalaSans; width: 654px;" x:str="5 feet " height="17"><span lang="EN-US">5 feet<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:str="6 feet " height="17"><span lang="EN-US">6 feet<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">24</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center; font-family: ScalaSans; width: 654px;" x:str="7 feet " height="17"><span lang="EN-US">7 feet<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 301px;" x:num=""><span lang="EN-US">28</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="height: 12.75pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:str="8 feet " height="17"><span lang="EN-US">8 feet<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;" x:num=""><span lang="EN-US">32</span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="justify" height="20">
<td colspan="2" class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; height: 26px; width: 301px;"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;Requires a 20-foot running start.
Without a running start, double the DC.</span></small></td>
</tr>
<tr style="height: 12.75pt; font-family: ScalaSans;" align="justify" height="17">
<td colspan="2" class="xl26" style="height: 22px; width: 301px;"><span lang="EN-US"><font class="font5"><sup>2</sup></font></span><small><span lang="EN-US">&nbsp;Not including vertical reach; see
below.</span></small></td>
</tr>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" align="center" height="17">
<td colspan="2" style="height: 20px; background-color: rgb(102, 102, 102); width: 301px;">Vertical
Reach</td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl24" style="font-weight: bold; text-align: center; font-family: ScalaSans; height: 14px; width: 654px;" x:str="Creature Size "><span lang="EN-US">Creature Size<span style="">&nbsp;</span></span></td>
<td class="xl24" style="font-weight: bold; text-align: center; font-family: ScalaSans; height: 14px; width: 301px;"><span lang="EN-US">Vertical Reach</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 16px; width: 654px;" x:str="Colossal "><span lang="EN-US">Colossal<span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 16px; width: 301px;"><span lang="EN-US">128 ft.</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center; font-family: ScalaSans; height: 16px; width: 654px;" x:str="Gargantuan "><span lang="EN-US">Gargantuan<span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; height: 16px; width: 301px;"><span lang="EN-US">64 ft.</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 19px; width: 654px;" x:str="Huge "><span lang="EN-US">Huge<span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 19px; width: 301px;"><span lang="EN-US">32 ft.</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center; font-family: ScalaSans; height: 10px; width: 654px;" x:str="Large "><span lang="EN-US">Large<span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; height: 10px; width: 301px;"><span lang="EN-US">16 ft.</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 12px; width: 654px;" x:str="Medium "><span lang="EN-US">Medium<span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 12px; width: 301px;"><span lang="EN-US">8 ft.</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center; font-family: ScalaSans; height: 18px; width: 654px;" x:str="Small "><span lang="EN-US">Small<span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; height: 18px; width: 301px;"><span lang="EN-US">4 ft.</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 21px; width: 654px;" x:str="Tiny "><span lang="EN-US">Tiny<span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 21px; width: 301px;"><span lang="EN-US">2 ft.</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="text-align: center; font-family: ScalaSans; height: 20px; width: 654px;" x:str="Diminutive "><span lang="EN-US">Diminutive<span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; height: 20px; width: 301px;"><span lang="EN-US">1 ft.</span></td>
</tr>
<tr style="height: 12.75pt;" height="17">
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 12px; width: 654px;" x:str="Fine "><span lang="EN-US">Fine<span style="">&nbsp;</span></span></td>
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); height: 12px; width: 301px;"><span lang="EN-US">1/2 ft.</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td><table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 95pt;" width="126"> <col style="width: 487pt;" width="649"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" style="height: 12.75pt; background-color: black; width: 301px;"><a name="Listen"></a>Listen</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 654px;"><span lang="EN-US">Sound</span></td>
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 301px;" x:str="Listen DC " height="20"><span lang="EN-US">Listen DC<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:str="&#8211;10 " height="20"><span lang="EN-US">A battle</span><span lang="EN-US"><span style="">&nbsp;</span></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">&#8211;10<span style=""></span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 654px;" x:num="" height="20"><span lang="EN-US">People talking<font class="font5"><sup>1</sup></font></span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 301px;"><span lang="EN-US"></span><span lang="EN-US">0</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US">A person in
medium armor walking at a slow pace (10 ft./round) trying not to make
any noise.</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 654px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">An unarmored
person walking at a slow pace (15 ft./round) trying not to make any
noise</span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 301px;"><span lang="EN-US"></span><span lang="EN-US">10</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US">A 1st-level
rogue using Move Silently to sneak past the listener</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 654px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">People whispering<font class="font5"><sup>1</sup></font></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 301px;"><span lang="EN-US"></span><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US">A cat stalking</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">19</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 654px;" x:num="" height="20"><span lang="EN-US">An owl gliding
in for a kill</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 301px;"><span lang="EN-US"></span><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; background-color: rgb(204, 204, 204); width: 654px;" height="20"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">Condition</span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US">Listen
DC Modifier</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 654px;" x:num="" height="20"><span lang="EN-US">Through a door</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 301px;"><span lang="EN-US"></span><span lang="EN-US">5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US">Through a stone
wall</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 654px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Per 10 feet of
distance</span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 301px;"><span lang="EN-US"></span><span lang="EN-US">1</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 654px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Listener
distracted</span></td>
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 301px;"><span lang="EN-US"></span><span lang="EN-US">5</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="2" class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 301px;" height="20"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;If you beat the DC by 10 or more, you
can make out what&#8217;s being said, assuming that you understand the
language.</span></small></td>
</tr>
</tbody>
</table></td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 253pt;" width="337"> <col style="width: 48pt;" width="64"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" style="height: 15pt; width: 301pt; background-color: black;"><a name="Move_Silently"></a>Move Silently</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 253pt; text-align: center; font-family: ScalaSans; font-weight: bold;" x:str="Surface " height="20" width="337"><span lang="EN-US">Surface<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 48pt; text-align: center; font-family: ScalaSans; font-weight: bold;" width="64"><span lang="EN-US">Check Modifier</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 253pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" height="20" width="337"><span lang="EN-US">Noisy
(scree, shallow or deep bog, undergrowth, dense rubble)</span></td>
<td class="xl26" style="width: 48pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" width="64"><span lang="EN-US">&#8211;2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 253pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans;" x:str="Very noisy (dense undergrowth, deep snow) " height="20" width="337"><span lang="EN-US">Very noisy
(dense undergrowth, deep snow)<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 48pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans;" width="64"><span lang="EN-US">&#8211;5</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 80pt;" width="106"> <col style="width: 48pt;" width="64"> <col style="width: 50pt;" width="67"> <col style="width: 28pt;" width="37"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="4" class="xl26" style="height: 15pt; width: 206pt; background-color: black;"><span lang="EN-US"><a name="Open_Lock"></a>Open
Lock</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 80pt; text-align: center; font-family: ScalaSans; font-weight: bold;" x:str="Lock " height="20" width="106"><span lang="EN-US">Lock<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 48pt; text-align: center; font-family: ScalaSans; font-weight: bold;" x:str="DC " width="64"><span lang="EN-US">DC<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 50pt; text-align: center; font-family: ScalaSans; font-weight: bold;" x:str="Lock " width="67"><span lang="EN-US">Lock<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 28pt; text-align: center; font-family: ScalaSans; font-weight: bold;" width="37"><span lang="EN-US">DC</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" x:str="Very simple lock " height="20" width="106"><span lang="EN-US">Very simple lock<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 48pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" x:num="" width="64"><span lang="EN-US">20</span></td>
<td class="xl25" style="width: 50pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" x:str="Good lock " width="67"><span lang="EN-US">Good
lock<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 28pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" x:num="" width="37"><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans;" height="20" width="106"><span lang="EN-US">Average
lock</span></td>
<td class="xl25" style="width: 48pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans;" x:num="" width="64"><span lang="EN-US">25</span></td>
<td class="xl25" style="width: 50pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans;" x:str="Amazing lock " width="67"><span lang="EN-US">Amazing
lock<span style="">&nbsp;</span></span></td>
<td class="xl25" style="width: 28pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans;" x:num="" width="37"><span lang="EN-US">40</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 80pt;" width="106"> <col style="width: 293pt;" width="390"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" style="height: 12.75pt; background-color: black; width: 132px;"><a name="Perform"></a>Perform</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 823px;" height="20"><span lang="EN-US"></span><span lang="EN-US">Performance</span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 132px;"><span lang="EN-US"></span><span lang="EN-US">Perform DC</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 823px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Routine performance. Trying to earn money by
playing in public is essentially begging. You can earn 1d10 cp/day.</span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 132px;"><span lang="EN-US"></span><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 823px;" x:num="" height="20"><span lang="EN-US">Enjoyable performance. In a prosperous city,
you can earn 1d10 sp/day.</span><span lang="EN-US"></span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 132px;"><span lang="EN-US"></span><span lang="EN-US"></span><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 823px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Great performance. In a prosperous city, you
can earn 3d10 sp/day. In time, you may be invited to join a
professional troupe and may develop a regional reputation.</span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 132px;"><span lang="EN-US"></span><span lang="EN-US">20</span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 823px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Memorable performance. In a prosperous city,
you can earn 1d6 gp/day. In time, you may come to the attention of
noble patrons and develop a national reputation.</span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 132px;"><span lang="EN-US"></span><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl27" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 823px;" x:num="" height="20"><span lang="EN-US"></span><span lang="EN-US">Extraordinary performance. In a prosperous
city, you can earn 3d6 gp/day. In time, you may draw attention from
distant potential patrons, or even from extraplanar beings.</span></td>
<td class="xl26" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 132px;"><span lang="EN-US"></span><span lang="EN-US">30</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 80pt;" width="106"> <col style="width: 47pt;" width="62"> <col style="width: 50pt;" width="67"> <col style="width: 28pt;" width="37"> <tbody>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" align="center" height="17">
<td colspan="4" style="height: 12.75pt; width: 205pt; background-color: black;"><a name="Ride"></a>Ride</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 80pt; font-family: ScalaSans; text-align: center; font-weight: bold;" x:str="Task " height="20" width="106"><span lang="EN-US">Task<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 47pt; font-family: ScalaSans; text-align: center; font-weight: bold;" x:str="Ride DC " width="62"><span lang="EN-US">Ride
DC<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 50pt; font-family: ScalaSans; text-align: center; font-weight: bold;" x:str="Task " width="67"><span lang="EN-US">Task<span style="">&nbsp;</span></span></td>
<td class="xl24" style="width: 28pt; font-family: ScalaSans; text-align: center; font-weight: bold;" width="37"><span lang="EN-US"><st1:place w_x003a_st="on">Ride DC</st1:place> </span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:str="Guide with knees " height="20" width="106"><span lang="EN-US">Guide with knees<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 47pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="62"><span lang="EN-US">5</span></td>
<td class="xl25" style="width: 50pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:str="Leap " width="67"><span lang="EN-US">Leap<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 28pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="37"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt; font-family: ScalaSans; text-align: center;" x:str="Stay in saddle " height="20" width="106"><span lang="EN-US">Stay in saddle<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 47pt; font-family: ScalaSans; text-align: center;" x:num="" width="62"><span lang="EN-US">5</span></td>
<td class="xl25" style="width: 50pt; font-family: ScalaSans; text-align: center;" x:str="Spur mount " width="67"><span lang="EN-US">Spur
mount<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 28pt; font-family: ScalaSans; text-align: center;" x:num="" width="37"><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:str="Fight with warhorse " height="20" width="106"><span lang="EN-US">Fight with warhorse<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 47pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="62"><span lang="EN-US">10</span></td>
<td class="xl25" style="width: 50pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" width="67"><span lang="EN-US"><span style="">&nbsp;</span>Control
mount in battle</span></td>
<td class="xl26" style="width: 28pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="37"><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt; font-family: ScalaSans; text-align: center;" x:str="Cover " height="20" width="106"><span lang="EN-US">Cover<span style="">&nbsp;</span></span></td>
<td class="xl26" style="width: 47pt; font-family: ScalaSans; text-align: center;" x:num="" width="62"><span lang="EN-US">15</span></td>
<td class="xl25" style="width: 50pt; font-family: ScalaSans; text-align: center;" width="67"><span lang="EN-US">Fast mount or
dismount</span></td>
<td class="xl26" style="width: 28pt; font-family: ScalaSans; text-align: center;" x:num="" width="37"><span lang="EN-US">20</span><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><span lang="EN-US"></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; width: 80pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" height="20" width="106"><span lang="EN-US">Soft
fall</span></td>
<td class="xl26" style="width: 47pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" x:num="" width="62"><span lang="EN-US">15</span></td>
<td class="xl27" style="width: 50pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" width="67"></td>
<td class="xl28" style="width: 28pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204);" width="37"></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="4" class="xl25" style="height: 15pt; width: 205pt; padding-bottom: 0pt; padding-top: 0pt;" height="20" width="272"><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;Armor check penalty applies.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 341pt;" width="455"> <col style="width: 47pt;" width="62"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" class="xl24" style="height: 12.75pt; width: 296px; background-color: black;"><span lang="EN-US"><a name="Search"></a>Search</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 659px;" height="20"><span lang="EN-US">Task</span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 296px;"><span lang="EN-US"><st1:place w_x003a_st="on">Search
DC</st1:place> </span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 659px; background-color: rgb(204, 204, 204);" height="20"><span lang="EN-US">Ransack a chest
full of junk to find a certain item</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 296px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 659px;" x:str="Notice a typical secret door or a simple trap " height="20"><span lang="EN-US">Notice a typical
secret door or a simple trap<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 296px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 659px; background-color: rgb(204, 204, 204);" height="20"><span lang="EN-US">Find a difficult
nonmagical trap (rogue only)<font class="font6"><sup>1</sup></font><font class="font5"><span style="">&nbsp;</span></font></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 296px; background-color: rgb(204, 204, 204);"><span lang="EN-US">21 or higher</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 659px;" height="20"><span lang="EN-US">Find a magic
trap (rogue only)<font class="font6"><sup>1<span style="">&nbsp;</span></sup></font></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 296px;"><span lang="EN-US">25 + level of spell used to create trap</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 659px; background-color: rgb(204, 204, 204);" x:str="Notice a well-hidden secret door " height="20"><span lang="EN-US">Notice a well-hidden secret door<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 296px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">30</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 659px;" x:str="Find a footprint " height="20"><span lang="EN-US">Find a footprint<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 296px;"><span lang="EN-US">Varies<font class="font6"><sup>2</sup></font></span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="2" class="xl25" style="height: 15pt; width: 296px;" height="20"><span lang="EN-US"><font class="font6"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;Dwarves (even if they are not rogues)
can use Search to find traps built into or out of stone.</span></small></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="2" class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 296px;" height="20"><span lang="EN-US"><font class="font6"><sup>2</sup></font></span><small><span lang="EN-US">&nbsp;A successful Search check can find a
footprint or similar sign of a creature&#8217;s passage, but it won&#8217;t let you
find or follow a trail. See the Track feat for the appropriate DC.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 341pt;" width="455"> <col style="width: 47pt;" width="62"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" style="height: 15pt; background-color: black; width: 131px;"><a name="Sense_Motive"></a>Sense Motive</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 824px;" x:str="Task " height="20"><span lang="EN-US">Task<span style="">&nbsp;</span></span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 131px;"><span lang="EN-US">Sense Motive DC</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" x:str="Hunch " height="20"><span lang="EN-US">Hunch<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 824px;" x:str="Sense enchantment " height="20"><span lang="EN-US">Sense enchantment<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">25 or 15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" x:str="Discern secret message " height="20"><span lang="EN-US">Discern secret message<span style="">&nbsp;</span></span></td>
<td class="xl28" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Varies</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 341pt;" width="455"> <col style="width: 47pt;" width="62"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" align="center" height="20">
<td colspan="2" style="height: 15pt; width: 156px; background-color: black;"><a name="Sleight_of_Hand"></a>Sleight of Hand</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 799px; font-weight: bold;" height="20"><span lang="EN-US">Task</span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; width: 156px; font-weight: bold;" x:str="Sleight of Hand DC "><span lang="EN-US">Sleight
of Hand DC<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 799px; background-color: rgb(204, 204, 204);" height="20"><span lang="EN-US">Palm a
coin-sized object, make a coin disappear</span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 156px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; width: 799px;" height="20"><span lang="EN-US">Lift a small
object from a person</span></td>
<td class="xl26" style="text-align: center; font-family: ScalaSans; width: 156px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 57pt;" width="76"> <col style="width: 192pt;" width="256"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="3" class="xl26" style="height: 15pt; background-color: black; width: 131px;"><span lang="EN-US"><a name="Speak_Language"></a>Speak
Language</span></td>
</tr>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="3" class="xl24" style="height: 15pt; background-color: rgb(102, 102, 102); width: 131px;" height="20"><span lang="EN-US">Common Languages
and Their Alphabets</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 130px;" x:str="Language " height="20"><span lang="EN-US">Language<span style="">&nbsp;</span></span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 692px;" x:str="Typical Speakers "><span lang="EN-US">Typical
Speakers<span style="">&nbsp;</span></span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 131px;"><span lang="EN-US">Alphabet</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Abyssal " height="20"><span lang="EN-US">Abyssal<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;" x:str="Demons, chaotic evil outsiders "><span lang="EN-US">Demons,
chaotic evil outsiders<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Infernal</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Aquan " height="20"><span lang="EN-US">Aquan<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 692px;" x:str="Water-based creatures "><span lang="EN-US">Water-based
creatures<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Elven</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Auran " height="20"><span lang="EN-US">Auran<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;" x:str="Air-based creatures "><span lang="EN-US">Air-based
creatures<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Draconic</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Celestial " height="20"><span lang="EN-US">Celestial<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 692px;" x:str="Good outsiders "><span lang="EN-US">Good
outsiders<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Celestial</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Common " height="20"><span lang="EN-US">Common<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;" x:str="Humans, halflings, half-elves, half-orcs "><span lang="EN-US">Humans, halflings, half-elves, half-orcs<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Common</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Draconic " height="20"><span lang="EN-US">Draconic<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 692px;"><span lang="EN-US">Kobolds, troglodytes, lizardfolk, dragons</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Draconic</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Druidic " height="20"><span lang="EN-US">Druidic<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;" x:str="Druids (only) "><span lang="EN-US">Druids
(only)<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Druidic</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Dwarven " height="20"><span lang="EN-US">Dwarven<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 692px;" x:str="Dwarves "><span lang="EN-US">Dwarves<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Dwarven</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Elven " height="20"><span lang="EN-US">Elven<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;" x:str="Elves "><span lang="EN-US">Elves<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Elven</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Giant " height="20"><span lang="EN-US">Giant<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 692px;" x:str="Ogres, giants "><span lang="EN-US">Ogres,
giants<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Dwarven</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Gnome " height="20"><span lang="EN-US">Gnome<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;" x:str="Gnomes "><span lang="EN-US">Gnomes<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Dwarven</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Goblin " height="20"><span lang="EN-US">Goblin<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 692px;" x:str="Goblins, hobgoblins, bugbears "><span lang="EN-US">Goblins,
hobgoblins, bugbears<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Dwarven</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Gnoll " height="20"><span lang="EN-US">Gnoll<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;" x:str="Gnolls "><span lang="EN-US">Gnolls<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Common</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Halfling " height="20"><span lang="EN-US">Halfling<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 692px;" x:str="Halflings "><span lang="EN-US">Halflings<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Common</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Ignan " height="20"><span lang="EN-US">Ignan<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;" x:str="Fire-based creatures "><span lang="EN-US">Fire-based
creatures<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Draconic</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Infernal " height="20"><span lang="EN-US">Infernal<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 692px;" x:str="Devils, lawful evil outsiders "><span lang="EN-US">Devils,
lawful evil outsiders<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Infernal</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Orc " height="20"><span lang="EN-US">Orc<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;" x:str="Orcs "><span lang="EN-US">Orcs<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Dwarven</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Sylvan " height="20"><span lang="EN-US">Sylvan<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 692px;" x:str="Dryads, brownies, leprechauns "><span lang="EN-US">Dryads,
brownies, leprechauns<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Elven</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 130px;" x:str="Terran " height="20"><span lang="EN-US">Terran<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 692px;"><span lang="EN-US">Xorns and other earth-based creatures</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">Dwarven</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; width: 130px;" x:str="Undercommon " height="20"><span lang="EN-US">Undercommon<span style="">&nbsp;</span></span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; width: 692px;"><span lang="EN-US">Drow</span></td>
<td class="xl25" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">Elven</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" class="xl24" style="height: 12.75pt; background-color: black; width: 131px;"><span lang="EN-US"><a name="Spellcraft"></a>Spellcraft</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 824px;" height="20"><span lang="EN-US">Task</span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 131px;" x:str="Spellcraft DC "><span lang="EN-US">Spellcraft
DC<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">When using <font class="font6"><span style="font-style: italic;">read magic</span>, </font><font class="font5">identify a </font><font class="font6"><span style="font-style: italic;">glyph
of warding</span>. </font><font class="font5">No action
required.</font></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">13</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 824px;" x:str="Identify a spell being cast. (You must see or hear the spell&#8217;s verbal or somatic components.) No action required. No retry. " height="20"><span lang="EN-US">Identify a spell
being cast. (You must see or hear the spell&#8217;s verbal or somatic
components.) No action required. No retry.<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;" x:str="15 + spell level "><span lang="EN-US">15
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">Learn a spell
from a spellbook or scroll (wizard only). No retry for that spell until
you gain at least 1 rank in Spellcraft (even if you find another source
to try to learn the spell from). Requires 8 hours.</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:str="15 + spell level "><span lang="EN-US">15
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 824px;" x:str="Prepare a spell from a borrowed spellbook (wizard only). One try per day. No extra time required. " height="20"><span lang="EN-US">Prepare a spell
from a borrowed spellbook (wizard only). One try per day. No extra time
required.<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;" x:str="15 + spell level "><span lang="EN-US">15
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">When casting <font class="font6"><span style="font-style: italic;">detect magic</span>, </font><font class="font5">determine the school of magic involved in the
aura of a single item or creature you can see. (If the aura is not a
spell effect, the DC is 15 + one-half caster level.) No action required.</font></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:str="15 + spell level "><span lang="EN-US">15
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 824px;" height="20"><span lang="EN-US">When using <font class="font6"><span style="font-style: italic;">read magic</span>, </font><font class="font5">identify a </font><font class="font6"><span style="font-style: italic;">symbol</span>.
</font><font class="font5">No action
required.</font></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;" x:num=""><span lang="EN-US">19</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">Identify a spell
that&#8217;s already in place and in effect. You must be able to see or
detect the effects of the spell. No action required. No retry.</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:str="20 + spell level "><span lang="EN-US">20
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 824px;" height="20"><span lang="EN-US">Identify
materials created or shaped by magic, such as noting that an iron wall
is the result of a <font class="font6"><span style="font-style: italic;">wall of iron</span> </font><font class="font5">spell. No action required. No retry.</font></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;" x:str="20 + spell level "><span lang="EN-US">20
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">Decipher a
written spell (such as a scroll) without using <font class="font6"><span style="font-style: italic;">read
magic</span>. </font><font class="font5">One try per day.
Requires a full-round action.</font></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:str="20 + spell level "><span lang="EN-US">20
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 824px;" height="20"><span lang="EN-US">After rolling a
saving throw against a spell targeted on you, determine what that spell
was. No action required. No retry.</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;" x:str="25 + spell level "><span lang="EN-US">25
+ spell level<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">Identify a
potion. Requires 1 minute. No retry.</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 824px;" height="20"><span lang="EN-US">Draw a diagram
to allow <font class="font6"><span style="font-style: italic;">dimensional anchor</span> </font><font class="font5">to be cast on a </font><font class="font6"><span style="font-style: italic;">magic circle</span> </font><font class="font5">spell. Requires 10 minutes. No retry. This
check is made secretly so you do not know the result.</font></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">Understand a
strange or unique magical effect, such as the effects of a magic
stream. Time required varies. No retry.</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:str="30 or higher "><span lang="EN-US">30 or
higher<span style="">&nbsp;</span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" height="20">
<td colspan="2" class="xl26" style="height: 15pt; text-align: center; background-color: black; width: 131px;"><a name="Spot"></a>Spot</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 824px;" x:str="Condition " height="20"><span lang="EN-US">Condition<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 131px;"><span lang="EN-US">Penalty</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" x:str="Per 10 feet of distance " height="20"><span lang="EN-US">Per 10 feet of distance<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">&#8211;1</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; width: 824px;" x:str="Spotter distracted " height="20"><span lang="EN-US">Spotter distracted<span style="">&nbsp;</span></span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; width: 131px;"><span lang="EN-US">&#8211;5</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 12.75pt; font-family: Scala Sans-Blk; color: white;" align="center" height="17">
<td colspan="2" style="height: 12.75pt; background-color: black; width: 131px;"><a name="Survival"></a>Survival</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 824px;" height="20"><span lang="EN-US">Task</span></td>
<td class="xl24" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 131px;" x:str="Survival DC "><span lang="EN-US">Survival
DC<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">Get along in the
wild. Move up to one-half your overland speed while hunting and
foraging (no food or water supplies needed). You can provide food and
water for one other person for every 2 points by which your check
result exceeds 10.</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 824px;" height="20"><span lang="EN-US">Gain a +2 bonus
on all Fortitude saves against severe weather while moving up to
one-half your overland speed, or gain a +4 bonus if you remain
stationary. You may grant the same bonus to one other character for
every 1 point by which your Survival check result exceeds 15.</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">Keep from
getting lost or avoid natural hazards, such as quicksand.</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 824px;" height="20"><span lang="EN-US">Predict the
weather up to 24 hours in advance. For every 5 points by which your
Survival check result exceeds 15, you can predict the weather for one
additional day in advance.</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; width: 131px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 824px;" height="20"><span lang="EN-US">Follow tracks
(see the Track feat).</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:str="Varies "><span lang="EN-US">Varies<span style="">&nbsp;</span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 15pt; font-family: Scala Sans-Blk; color: white;" align="center" height="20">
<td colspan="2" rowspan="1" class="xl28" style="height: 15pt; background-color: black; width: 131px;" height="20"><span lang="EN-US"><a name="Swim"></a>Swim</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 823px;" height="20"><span lang="EN-US">Water</span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 131px;"><span lang="EN-US"><st1:place w_x003a_st="on">Swim DC</st1:place>
</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 823px;" x:str="Calm water " height="20"><span lang="EN-US">Calm
water<span style="">&nbsp;</span></span></td>
<td class="xl27" x:num="" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;"><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 823px;" x:str="Rough water " height="20"><span lang="EN-US">Rough
water<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 131px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 823px;" x:str="Stormy water " height="20"><span lang="EN-US">Stormy water<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">2</span><span lang="EN-US">0</span><span lang="EN-US"><font class="font5"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" height="20">
<td colspan="2" class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 131px;" height="20"><span lang="EN-US"></span><span lang="EN-US"><font class="font5"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;You can&#8217;t take 10 on a Swim check in
stormy water, even if you aren&#8217;t otherwise being threatened or
distracted.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 12.75pt;" height="17">
<td colspan="2" rowspan="1" style="height: 12.75pt; color: white; font-family: Scala Sans-Blk; text-align: center; background-color: black; width: 131px;" height="17"><a name="Tumble"></a>Tumble</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; font-family: ScalaSans; text-align: center; font-weight: bold; width: 823px;" height="20"><span lang="EN-US">Task</span></td>
<td class="xl24" style="font-family: ScalaSans; text-align: center; font-weight: bold; width: 131px;" x:str="Tumble DC "><span lang="EN-US">Tumble DC<span style="">&nbsp;</span></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 823px;" height="20"><span lang="EN-US">Treat a fall as
if it were 10 feet shorter than it really is when determining damage.</span></td>
<td class="xl25" style="font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; font-family: ScalaSans; text-align: center; width: 823px;" height="20"><span lang="EN-US">Tumble at
one-half speed as part of normal movement, provoking no attacks of
opportunity while doing so. Failure means you provoke attacks of
opportunity normally. Check separately for each opponent you move past,
in the order in which you pass them (player&#8217;s choice of order in case
of a tie).</span></td>
<td rowspan="2" class="xl27" style="border-top: medium none; border-bottom: 1pt solid black; font-family: ScalaSans; text-align: center; width: 131px;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="center" height="20">
<td class="xl25" style="height: 15pt; width: 823px;" height="20"><span lang="EN-US">Each additional enemy after the first adds +2
to the Tumble DC.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 823px;" height="20"><span lang="EN-US">Tumble at
one-half speed through an area occupied by an enemy (over, under, or
around the opponent) as part of normal movement, provoking no attacks
of opportunity while doing so. Failure means you stop before entering
the enemy-occupied area and provoke an attack of opportunity from that
enemy.</span></td>
<td rowspan="2" class="xl27" style="border-top: medium none; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="center" height="20">
<td class="xl26" style="height: 15pt; background-color: rgb(204, 204, 204); width: 823px;" height="20"><span lang="EN-US">Check separately
for each opponent. Each additional enemy after the first adds +2 to the
Tumble DC.</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; font-family: ScalaSans; text-align: center; font-weight: bold; width: 823px;" x:str="Surface Is . . . " height="20"><span lang="EN-US">Surface Is . . .<span style="">&nbsp;</span></span></td>
<td class="xl24" style="font-family: ScalaSans; text-align: center; font-weight: bold; width: 131px;"><span lang="EN-US">DC Modifier</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 823px;" height="20"><span lang="EN-US">Lightly
obstructed (scree, light rubble, shallow bog<font class="font6"><sup>1</sup></font><font class="font5">, undergrowth)<span style="">&nbsp;</span></font></span></td>
<td class="xl28" style="font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; text-align: center; width: 823px;" x:str="Severely obstructed (natural cavern floor, dense rubble, dense undergrowth) " height="20"><span lang="EN-US">Severely
obstructed (natural cavern floor, dense rubble, dense undergrowth)<span style="">&nbsp;</span></span></td>
<td class="xl28" style="font-family: ScalaSans; text-align: center; width: 131px;" x:num=""><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 823px;" x:str="Lightly slippery (wet floor) " height="20"><span lang="EN-US">Lightly slippery (wet floor)<span style="">&nbsp;</span></span></td>
<td class="xl28" style="font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; text-align: center; width: 823px;" x:str="Severely slippery (ice sheet) " height="20"><span lang="EN-US">Severely slippery (ice sheet)<span style="">&nbsp;</span></span></td>
<td class="xl28" style="font-family: ScalaSans; text-align: center; width: 131px;" x:num=""><span lang="EN-US">+5</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl25" style="height: 15pt; font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 823px;" x:str="Sloped or angled " height="20"><span lang="EN-US">Sloped or angled<span style="">&nbsp;</span></span></td>
<td class="xl28" style="font-family: ScalaSans; text-align: center; background-color: rgb(204, 204, 204); width: 131px;" x:num=""><span lang="EN-US">+2</span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="center" height="20">
<td colspan="2" class="xl27" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: left; width: 131px;" height="20"><span lang="EN-US"><font class="font6"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;Tumbling is impossible in a deep bog.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 15pt; color: white; font-family: Scala Sans-Blk;" align="center" height="20">
<td colspan="2" style="height: 15pt; width: 161px; background-color: black;"><a name="Use_Magic_Device"></a>Use Magic Device</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; text-align: center; font-family: ScalaSans; font-weight: bold; width: 794px;" x:str="Task " height="20"><span lang="EN-US">Task<span style="">&nbsp;</span></span></td>
<td class="xl25" style="text-align: center; font-family: ScalaSans; font-weight: bold; width: 161px;"><span lang="EN-US">Use Magic Device DC</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 794px; background-color: rgb(204, 204, 204);" x:str="Activate blindly " height="20"><span lang="EN-US">Activate blindly<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 161px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 794px;" x:str="Decipher a written spell " height="20"><span lang="EN-US">Decipher a written spell<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 161px;"><span lang="EN-US">25 + spell level</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 794px; background-color: rgb(204, 204, 204);" x:str="Use a scroll " height="20"><span lang="EN-US">Use a scroll<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 161px; background-color: rgb(204, 204, 204);"><span lang="EN-US">20 + caster level</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 794px;" x:str="Use a wand " height="20"><span lang="EN-US">Use
a wand<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 161px;" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 794px; background-color: rgb(204, 204, 204);" x:str="Emulate a class feature " height="20"><span lang="EN-US">Emulate a class feature<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 161px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">20</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 794px;" x:str="Emulate an ability score " height="20"><span lang="EN-US">Emulate an ability score<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 161px;"><span lang="EN-US">See text</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; text-align: center; font-family: ScalaSans; width: 794px; background-color: rgb(204, 204, 204);" x:str="Emulate a race " height="20"><span lang="EN-US">Emulate a race<span style="">&nbsp;</span></span></td>
<td class="xl27" style="text-align: center; font-family: ScalaSans; width: 161px; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">25</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; width: 794px;" x:str="Emulate an alignment " height="20"><span lang="EN-US">Emulate an alignment<span style="">&nbsp;</span></span></td>
<td class="xl27" style="padding-bottom: 0pt; padding-top: 0pt; text-align: center; font-family: ScalaSans; width: 161px;" x:num=""><span lang="EN-US">30</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table x:str="" style="border-collapse: collapse; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<col style="width: 320pt;" width="427"> <col style="width: 50pt;" width="67"> <tbody>
<tr style="height: 12.75pt; color: white; font-family: Scala Sans-Blk;" height="17">
<td colspan="2" style="height: 12.75pt; width: 131px; text-align: center; background-color: black;"><a name="Use_Rope"></a>Use Rope</td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl24" style="height: 15pt; width: 823px; text-align: center; font-family: ScalaSans; font-weight: bold;" height="20"><span lang="EN-US">Task</span></td>
<td class="xl25" style="width: 131px; text-align: center; font-family: ScalaSans; font-weight: bold;"><span lang="EN-US">Use Rope DC</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 823px; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" height="20"><span lang="EN-US">Tie a firm knot</span></td>
<td class="xl27" style="width: 131px; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">10</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 823px; text-align: center; font-family: ScalaSans;" height="20"><span lang="EN-US">Secure a
grappling hook</span></td>
<td class="xl27" style="width: 131px; text-align: center; font-family: ScalaSans;" x:num=""><span lang="EN-US">10</span><span lang="EN-US"><font class="font6"><sup>1</sup></font></span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 823px; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" height="20"><span lang="EN-US">Tie a special
knot, such as one that slips, slides slowly, or loosens with a tug</span></td>
<td class="xl27" style="width: 131px; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 823px; text-align: center; font-family: ScalaSans;" height="20"><span lang="EN-US">Tie a rope
around yourself one-handed</span></td>
<td class="xl27" style="width: 131px; text-align: center; font-family: ScalaSans;" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 823px; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" height="20"><span lang="EN-US">Splice two ropes
together</span></td>
<td class="xl27" style="width: 131px; text-align: center; font-family: ScalaSans; background-color: rgb(204, 204, 204);" x:num=""><span lang="EN-US">15</span></td>
</tr>
<tr style="height: 15pt;" height="20">
<td class="xl26" style="height: 15pt; width: 823px; text-align: center; font-family: ScalaSans;" height="20"><span lang="EN-US">Bind a character</span></td>
<td class="xl27" style="width: 131px; text-align: center; font-family: ScalaSans;"><span lang="EN-US">Varies</span></td>
</tr>
<tr style="height: 15pt; font-family: ScalaSans;" align="center" height="20">
<td colspan="2" class="xl26" style="height: 15pt; padding-bottom: 0pt; padding-top: 0pt; width: 131px; text-align: left;" height="20"><span lang="EN-US"><font class="font6"><sup>1</sup></font></span><small><span lang="EN-US">&nbsp;Add 2 to the DC for every 10 feet the
hook is thrown; see text.</span></small></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="height: 4px;"></td>
</tr>
</tbody>
</table>
</body></html>
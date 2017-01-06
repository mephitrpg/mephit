<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>rnd pnc</title>
<script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js"></script>
<script>
// http://paizo.com/pathfinderRPG/prd/creatingNPCs.html
/*
If the NPC possesses levels in a PC class,
it is considered a heroic NPC
and receives better ability scores.
These scores can be assigned in any order.
*/
var npcAbilityScores={
	0:{	//Default
		basic:[13,12,11,10,9,8],
		heroic:[15,14,13,12,10,8]
	},
	1:{	//Melee
		basic:[13,11,12,9,10,8],
		heroic:[15,13,14,10,12,8]
	},
	2:{	//Ranged
		basic:[11,13,12,10,9,8],
		heroic:[13,15,14,12,10,8]
	},
	3:{	//Divine
		basic:[10,8,12,9,13,11],
		heroic:[12,8,14,10,15,13]
	},
	4:{	//Arcane
		basic:[8,12,10,"13*",9,"11*"],
		heroic:[8,14,12,"15*",10,"13*"]
	},
	5:{	//Skill
		basic:[10,12,11,13,8,9],
		heroic:[12,14,13,15,8,10]
	}
}
var racialAbilityAdjustments={
	0:[0,0,2,0,2,-2],		//Dwarf
	1:[0,2,-2,2,0,0],		//Elf
	2:[0,0,2,0,2,-2],		//Gnome
	3:[0,0,0,0,0,0,"*"],	//Half-Elf
	4:[0,0,0,0,0,0,"*"],	//Half-Orc
	5:[-2,2,0,2,0,0],		//Dwarf
	6:[0,0,0,0,0,0,"*"]		//Human
}
</script>
</head>
<body>

<form id="npc">
	Race
	<select>
		<option value="0">Dwarf</option>
		<option value="1">Elf</option>
		<option value="2">Gnome</option>
		<option value="3">Half-Elf</option>
		<option value="4">Half-Orc</option>
		<option value="5">Halfling</option>
		<option value="6">Human</option>
	</select>
	Preset
	<select>
		<option value="0">Default</option>
		<option value="1">Melee</option>
		<option value="2">Ranged</option>
		<option value="3">Divine</option>
		<option value="4">Arcane</option>
		<option value="5">Skill</option>
	</select>
</form>

</body>
</html>
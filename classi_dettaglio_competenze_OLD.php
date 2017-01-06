<?php
$query="
	SELECT *
	FROM srd35_equipment
	WHERE family='Armor and Shields' OR family='Weapons'
";
$result=mysql_query($query);

$combatGear=array(
	"weapons"=>array(
		"simple"=>array(
			"unarmed"=>array(),
			"melee_light"=>array(),
			"melee_onehanded"=>array(),
			"melee_twohanded"=>array(),
			"ranged"=>array(),
		),
		"martial"=>array(
			"melee_light"=>array(),
			"melee_onehanded"=>array(),
			"melee_twohanded"=>array(),
			"ranged"=>array(),
		),
		"exotic"=>array(
			"melee_light"=>array(),
			"melee_onehanded"=>array(),
			"melee_twohanded"=>array(),
			"ranged"=>array(),
		),
	),
	"armors_and_shields"=>array(
		"armors"=>array(
			"light"=>array(),
			"medium"=>array(),
			"heavy"=>array(),
		),
		"shields"=>array(),
		"extras"=>array(),
	)
);
while($row=mysql_fetch_assoc($result)){
	$keys=array();
	switch($row[category]){
		case"Simple Weapons":	$keys[]="weapons";$keys[]="simple";		break;
		case"Martial Weapons":	$keys[]="weapons";$keys[]="martial";	break;
		case"Exotic Weapons":	$keys[]="weapons";$keys[]="exotic";		break;
		case"Armor":			$keys[]="armors_and_shields";			break;
	}
	switch($row[subcategory]){
		case"Unarmed Attacks":			$keys[]="unarmed";					break;
		case"Light Melee Weapons":		$keys[]="melee_light";				break;
		case"One-Handed Melee Weapons":	$keys[]="melee_onehanded";			break;
		case"Two-Handed Melee Weapons":	$keys[]="melee_twohanded";			break;
		case"Ranged Weapons":			$keys[]="ranged";					break;
		case"Ammunition":				$keys[]="ranged";					break;
		case"Light armor":				$keys[]="armors";$keys[]="light";	break;
		case"Medium armor":				$keys[]="armors";$keys[]="medium";	break;
		case"Heavy armor":				$keys[]="armors";$keys[]="heavy";	break;
		case"Shields":					$keys[]="shields";					break;
		case"Extras":					$keys[]="extras";					break;
	}
	$rif=&$combatGear;
	foreach($keys as $k)if(isset($rif[$k]))$rif=&$rif[$k];
	$rif[$row[id]]=$row;
}

$BODY.='<style>
.combatGear UL{
	margin:0 0 0 1em;padding:0;list-style:none;
}
.combatGear .col{
	width:30%;margin-left:1em;
}
.combatGear H3{
	margin-top:0;
}
.combatGear LABEL{
	display:block;
}
.combatGear LABEL:hover{background:#eee;}
</style>';

foreach($combatGear as $famk=>$famv){
	$BODY.='<h2>'.$famk.'</h2>';
	$BODY.='<div class="row combatGear">';
	foreach($famv as $catk=>$catv){
		$BODY.='<div class="col">';
		$BODY.='<h3>';
			$BODY.='<label>';
				$BODY.='<input type="checkbox">';
				$BODY.=' ';
				$BODY.=$catk;
			$BODY.='</label>';
		$BODY.='</h3>';
		foreach($catv as $subk=>$subv){
			$firstchildskey=$subk;
			break;
		}
		if(is_numeric($firstchildskey))$BODY.='<ul>';
		foreach($catv as $subk=>$subv){
			if(!is_numeric($subk)){
				$BODY.='<label>';
					$BODY.='<input type="checkbox">';
					$BODY.=' ';
					$BODY.='<em>'.$subk.'</em>';
				$BODY.='</label>';
				$BODY.='<ul>';
				foreach($subv as $id=>$item){
					$BODY.='<li>';
						$BODY.='<label>';
							$BODY.='<input type="checkbox">';
							$BODY.=' ';
							$BODY.=$item['name_'.$_MEPHIT[lang]];
						$BODY.='</label>';
					$BODY.='</li>';
				}
				$BODY.='</ul>';
			}else{
				$BODY.='<li>'.$subv['name_'.$_MEPHIT[lang]].'</li>';
			}
		}
		if(is_numeric($firstchildskey))$BODY.='</ul>';
		$BODY.='</div>';
	}
	$BODY.='</div>';
}

$BODY.='<div id="theProficiencies">';
	
$BODY.='</div>';

/*
family

Armor and Shields
Weapons

category

Simple Weapons
Martial Weapons
Exotic Weapons
Armor

subcategory

Unarmed Attacks
Light Melee Weapons
One-Handed Melee Weapons
Two-Handed Melee Weapons
Ranged Weapons
Ammunition
Light armor
Medium armor
Heavy armor
Shields
Extras

*/
?>
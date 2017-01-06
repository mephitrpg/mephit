<?php
$equip=array(
	"tradegoods"=>array(),
	"weapons"=>array(),
	"armorandshields"=>array(),
	"goodsandservices"=>array(),
	"wondrousitems"=>array(),
	"treasure"=>array(),
);

$query="SELECT * FROM srd35_treasure ORDER BY name_".$_MEPHIT[lang];
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$rowclone=$row;
	$rowclone[weightSize]=0;
	$rowclone[price].=" mo";
	$equip[treasure]["t".$row[id]]=$rowclone;
}

$query="SELECT * FROM srd35_equipment ORDER BY name_".$_MEPHIT[lang];
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	switch($row[family]){
		case"Trade Goods":
			$equip[tradegoods][$row[id]]=$row;
		break;
		case"Weapons":
			$equip[weapons][$row[id]]=$row;
		break;
		case"Armor and Shields":
			$equip[armorandshields][$row[id]]=$row;
		break;
		case"Goods and Services":
			$equip[goodsandservices][$row[id]]=$row;
		break;
		default:
			echo"NOT FOUND *".$row[family]."*<br>";
		break;
	}
}

$query="SELECT * FROM srd35_item WHERE special_ability='No' ORDER BY name_".$_MEPHIT[lang];
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	switch($row[category]){
		case"Ring":case"Rod":case"Staff":case"Wondrous":case"Artifact":case"Potion":case"Oil":case"Potion, Oil":case"Scroll":case"Wand":case"Psicrown":case"Universal Items":
			$equip[wondrousitems]["w".$row[id]]=$row;
		break;
		case"Weapon":
			$equip[weapons]["w".$row[id]]=$row;
		break;
		case"Armor":case"Shield":case"Armor, Shield":
			$equip[armorandshields]["w".$row[id]]=$row;
		break;
		case"Goods and Services":
			$equip[goodsandservices]["w".$row[id]]=$row;
		break;
		default:
			echo"NOT FOUND *".$row[category]."*<br>";
		break;
	}
}

$sortWeapons=array();
foreach($equip[weapons] AS $v)$sortWeapons[]=$v["name_".$_MEPHIT[lang]];
rsort($sortWeapons);

$sortWeapons_sorted=array();
for($i=count($sortWeapons)-1;$i>-1;$i--){
	$itemToFind=$sortWeapons[$i];
	$j=0;
	foreach($equip[weapons] AS $k=>$itemCurrent){
		if($itemToFind==$itemCurrent["name_".$_MEPHIT[lang]]){
			$kk=(isset($itemCurrent[fk_weapon])?"w":"").$itemCurrent[id];
			$sortWeapons_sorted[$kk]=$itemCurrent;
			array_splice($equip[weapons],$j,1);
			break;
		}
		$j++;
	}
}
$equip[weapons]=$sortWeapons_sorted;

$sortArmor=array();
foreach($equip[armorandshields] AS $v)$sortArmor[]=$v["name_".$_MEPHIT[lang]];
rsort($sortArmor);
$sortArmor_sorted=array();
for($i=count($sortArmor)-1;$i>-1;$i--){
	$itemToFind=$sortArmor[$i];
	$j=0;
	foreach($equip[armorandshields] AS $k=>$itemCurrent){
		if($itemToFind==$itemCurrent["name_".$_MEPHIT[lang]]){
			$kk=(isset($itemCurrent[fk_armor])?"w":"").$itemCurrent[id];
			$sortArmor_sorted[$kk]=$itemCurrent;
			array_splice($equip[armorandshields],$j,1);
		}
		$j++;
	}
}
$equip[armorandshields]=$sortArmor_sorted;

$byId=array();
$byType=array(
	"weapons"=>array(
		"simpleweapons"=>array(
			"lightmeleeweapons"=>array(),
			"onehandedmeleeweapons"=>array(),
			"twohandedmeleeweapons"=>array(),
			"rangedweapons"=>array(),
			"unarmedattacks"=>array(),
			"ammunition"=>array(),
		),
		"martialweapons"=>array(
			"lightmeleeweapons"=>array(),
			"onehandedmeleeweapons"=>array(),
			"twohandedmeleeweapons"=>array(),
			"rangedweapons"=>array(),
			"ammunition"=>array(),
		),
		"exoticweapons"=>array(
			"lightmeleeweapons"=>array(),
			"onehandedmeleeweapons"=>array(),
			"twohandedmeleeweapons"=>array(),
			"rangedweapons"=>array(),
			"ammunition"=>array(),
		),
	),
	"armorandshields"=>array(
		"lightarmor"=>array(),
		"mediumarmor"=>array(),
		"heavyarmor"=>array(),
		"shields"=>array(),
		"extras"=>array(),
	),
	"containers"=>array(),
	"wondrousitems"=>array(
		"wondrous"=>array(
			"wondrous2"=>array(
				"null"=>array(),
				"epic"=>array(),
			),
			"rod"=>array(
				"null"=>array(),
				"epic"=>array(),
			),
			"artifact"=>array(
				"majorartifact"=>array(),
				"minorartifact"=>array(),
				"psionicminorartifact"=>array(),
			),
			/*
			"cursed"=>array(
				"null"=>array(),
				"psionic"=>array(),
			),
			*/
			"universalitems"=>array(
				"psionic"=>array(),
			),
		),
		"wearables"=>array(
			"head"=>array(
				
			),
			"eyes"=>array(
				
			),
			"neck"=>array(
				
			),
			"shoulders"=>array(
				
			),
			"waist"=>array(		//vita
				
			),
			"wrists"=>array(	//polsi
				
			),
			"hands"=>array(
				
			),
			"torso"=>array(
				
			),
			"ring"=>array(
				"null"=>array(),
				"epic"=>array(),
				"epicpsionic"=>array(),
			),
			"feet"=>array(
				
			),
		),
		"consumables"=>array(
			"potion"=>array(
				"null"=>array(),
			),
			"oil"=>array(
				"null"=>array(),
			),
			"scroll"=>array(
				"arcane"=>array(),
				"divine"=>array(),
			),
			"wand"=>array(
				"null"=>array(),
			),
			"staff"=>array(
				"null"=>array(),
				"epic"=>array(),
			),
		),
//		"psicrown"=>array(
//			"psionic"=>array(),
//		),
		
	),
	"goodsandservices"=>array(
		"adventuringgear"=>array(),
		"specialsubstancesanditems"=>array(),
		"toolsandskillkits"=>array(),
		"clothing"=>array(),
		"fooddrinkandlodging"=>array(),
		"mountsandrelatedgear"=>array(),
		"transport"=>array(),
		"spellcastingandservices"=>array(),
	),
	"values"=>array(
		"coin"=>array(),
		"gem"=>array(),
		"artobject"=>array(),
		"tradegoods"=>array(),
	),
);

function toKey($q){
	$q=str_replace(" ","",$q);
	$q=str_replace(",","",$q);
	$q=str_replace("-","",$q);
	return strtolower($q);
}

// organizza 1/6 : weapons

foreach($equip[weapons] AS $id=>$item){
	if(isset($item[fk_weapon])&&$item[fk_weapon]!=0){
		$k=$item[fk_weapon];
		$category=toKey($equip[weapons][$k][category]);
		$subcategory=toKey($equip[weapons][$k][subcategory]);
		$item[referenceItem]=$equip[weapons][$item[fk_weapon]];
	}else{
		$k=$id;
		$category=toKey($item[category]);
		$subcategory=toKey($item[subcategory]);
	}
	$itemclone=$item;
	$itemclone[itemtype]="weapons";
	$byId[$id]=$itemclone;
	$byType[weapons][$category][$subcategory][$id]=$itemclone;
}

// organizza 2/6 : armor

foreach($equip[armorandshields] AS $id=>$item){
	if(isset($item[fk_armor])&&($item[fk_armor]!=0||$item[fk_shield]!=0)){
		$k=$item[fk_armor]!=0?$k=$item[fk_armor]:$item[fk_shield];
		$category=toKey($equip[armorandshields][$k][category]);
		$subcategory=toKey($equip[armorandshields][$k][subcategory]);
		if($item[fk_armor]!=0)$item[referenceItem]=$equip[armorandshields][$item[fk_armor]];
		else if($item[fk_shield]!=0)$item[referenceItem]=$equip[armorandshields][$item[fk_shield]];
	}else{
		$k=$id;
		$category=toKey($item[category]);
		$subcategory=toKey($item[subcategory]);
	}
	$itemclone=$item;
	$itemclone[itemtype]="armorandshields";
	$byId[$id]=$itemclone;
	$byType[armorandshields][$subcategory][$id]=$itemclone;
}

// organizza 3/6 : wondrous

function whichSlots($tm){
	$s=explode("|",isset($tm[referenceItem])?$tm[referenceItem][slot]:$tm[slot]);
	$r=array();
	foreach($s as $papabile){
		if(is_numeric($papabile)){
			$r[]=$papabile;
		}else{
			preg_match_all("/\{(\d+)\:(\.)\}/",$tm[slot],$opzioni);
			preg_match_all("/\{(\d+)\:(\.)\}/",$tm[slot],$prerequisiti);
			$r[]=$papabile;
		}
	}
	return $r;
}

foreach($equip[wondrousitems] AS $id=>$item){
	$itemclone=$item;
	$category=toKey($item[category]);
	if($item[container]){
		$itemclone[itemtype]="containers";
		$byType[containers][$id]=$itemclone;
	}else{
		$subcategory=is_null($item[subcategory])?"null":toKey($item[subcategory]);
		$slots=whichSlots($item);
		foreach($slots as $s){
			switch($s){
				case "1":
					$itemclone[itemtype]="head";
					$byType[wondrousitems][wearables][head][$id]=$itemclone;
				break;
				case "2":
					$itemclone[itemtype]="neck";
					$byType[wondrousitems][wearables][neck][$id]=$itemclone;
				break;
				case "3":
					$itemclone[itemtype]="torso";
					$byType[wondrousitems][wearables][torso][$id]=$itemclone;
				break;
				case "4":
					$itemclone[itemtype]="waist";
					$byType[wondrousitems][wearables][waist][$id]=$itemclone;
				break;
				case "5":case "6":case "5&6":
					$itemclone[itemtype]="eyes";
					$byType[wondrousitems][wearables][eyes][$id]=$itemclone;
				break;
				case "7":case "8":case "7&8":
					$itemclone[itemtype]="shoulders";
					$byType[wondrousitems][wearables][shoulders][$id]=$itemclone;
				break;
				case "9":case "10":case "9&10":
					$itemclone[itemtype]="wrists";
					$byType[wondrousitems][wearables][wrists][$id]=$itemclone;
				break;
				case "11":case "12":case "11&12":
					$itemclone[itemtype]="hands";
					$byType[wondrousitems][wearables][hands][$id]=$itemclone;
				break;
				case "13":case "14":case "13&14":
					$itemclone[itemtype]="ring";
					$byType[wondrousitems][wearables][ring][$subcategory][$id]=$itemclone;
				break;
				case "15":case "16":case "15&16":
					$itemclone[itemtype]="feet";
					$byType[wondrousitems][wearables][feet][$id]=$itemclone;
				break;
				case "17":case "18":case "19":case "17&19":
					switch($category){
						case"rod":
							$itemclone[itemtype]="rod";
							$byType[wondrousitems][wondrous][$category][$subcategory][$id]=$itemclone;
						break;
						case"wand":
							$itemclone[itemtype]="wand";
							$byType[wondrousitems][consumables][$category][$subcategory][$id]=$itemclone;
						break;
						case"staff":
							$itemclone[itemtype]="staff";
							$byType[wondrousitems][consumables][$category][$subcategory][$id]=$itemclone;
						break;
					}
				break;
				default:
/*
					if($item[slot]!="" && !is_null($item[slot])){
						echo "*".$item[slot]."*";
						echo "<br />";
						xmp(whichSlots($item));
						echo "<br />";
						echo "<br />";
					}
*/
					switch($category){
						case"potion":case"scroll":case"oil":
							$itemclone[itemtype]=$category;
							$byType[wondrousitems][consumables][$category][$subcategory][$id]=$itemclone;
						break;
						case"universalitems":case"artifact":
							$itemclone[itemtype]=$category;
							$byType[wondrousitems][wondrous][$category][$subcategory][$id]=$itemclone;
						break;
						case"wondrous":
							$itemclone[itemtype]="wondrous2";
							$byType[wondrousitems][wondrous][wondrous2][$subcategory][$id]=$itemclone;
						break;
						default:
							$itemclone[itemtype]="***";
							$byType[wondrousitems][$category][$subcategory][$id]=$itemclone;
						break;
					}
				break;
			}
		}
	}
	$byId[$id]=$itemclone;
}

//xmp($byType[wondrousitems][wondrous]);

// organizza 4/6 : gooods

foreach($equip[goodsandservices] AS $id=>$item){
	$itemclone=$item;
	if($item[container]){
		$itemclone[itemtype]="containers";
		$byType[containers][$id]=$itemclone;
	}else{
		$category=toKey($item[category]);
		$subcategory=toKey($item[subcategory]);
		$itemclone[itemtype]=$category;
		$byType[goodsandservices][$subcategory][$id]=$itemclone;
	}
	$byId[$id]=$itemclone;
}

// organizza 5/6 : trade

foreach($equip[tradegoods] AS $id=>$item){
	$itemclone=$item;
	$category=toKey($item[category]);
	$subcategory=toKey($item[subcategory]);
	$itemclone[itemtype]=$category;
	$itemclone[precious]=1;
	$byType[values][tradegoods][$id]=$itemclone;
	$byId[$id]=$itemclone;
}

// organizza 6/6 : treasures

foreach($equip[treasure] AS $id=>$item){
	$itemclone=$item;
	$category=toKey($item[category]);
	$itemclone[itemtype]=$category;
	$itemclone[precious]=1;
	$byType[values][$category][$id]=$itemclone;
	$byId[$id]=$itemclone;
}

//xmp($byType[treasure]);

// organizza : fine

// xmp($byType);
// xmp($byId);
?>
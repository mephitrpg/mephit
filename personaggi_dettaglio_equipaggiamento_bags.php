<?php
$BODY.='<script>';
$BODY.='
var bags=[];
';
$query="SELECT * FROM mephit_personaggio_contenitori WHERE fk_personaggio=".($_GET[id]*1)." ORDER BY editabile,nome";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$BODY.='bag.create('
		.$row[id].','
		.'"'.addslashes($row[nome]).'",'
		.'{'
		.'aggiungiAlCarico:'.($row[xd]?'false':'true').','
		.'capacita:'.$row[carico].','
		.'editabile:'.($row[editabile]?'true':'false')
		.'}'
	.');';
	$BODY.='bags[bags.length]='.$row[id].';';
}
if(count($itemsIhave)>0){
	foreach($itemsIhave AS $possession_id=>$possession){
		//xmp($possession);
		$item_id=$possession[type].$possession[fk_item];
		switch($possession[type]){
			case"w":
				$item=$itemsProperties[wondrous][$possession[fk_item]];
			break;
			case"t":
				$item=$itemsProperties[treasure][$possession[fk_item]];
			break;
			default:
				$item=$itemsProperties[normal][$possession[fk_item]];
			break;
		}
		//xmp($possession);
		if(isset($item[fk_weapon])&&$item[fk_weapon]!=0){
			$item[referenceItem]=$equip[weapons][$item[fk_weapon]];
		}else if(isset($item[fk_armor])&&($item[fk_armor]!=0||$item[fk_shield]!=0)){
			if($item[fk_armor]!=0)$item[referenceItem]=$equip[armorandshields][$item[fk_armor]];
			else if($item[fk_shield]!=0)$item[referenceItem]=$equip[armorandshields][$item[fk_shield]];
		}
		
		$w=calcItemWeight($item);
		$p=calcItemPrice($item);
		//xmp($item);
		$BODY.='bag.insert("'.$item_id.'",{
			name:"'.addslashes(htmlspecialchars($item["name_".$_MEPHIT[lang]])).'",
			weight:"'.$w.'",
			price:"'.$p.'",
			precious:'.($item[precious]?1:0).',
			cursed:'.($item[cursed]?1:0).',
			type:"'.$item[itemtype].'",
			isContainer:"'.$item[container].'",
			weightSize:"'.$item[weightSize].'",
			size:"'.$possession[fk_userSize].'",
			
			possession_id:'.$possession_id.',
			container_id:'.$possession[fk_container].',
			quantity:'.$possession[quantity].',
			slot:'.$possession[slot_equipped].',
			note:"'.addslashes($possession[note]).'"
		},{sort:false});';
	}
}
$BODY.='bags.each(function(q){B[q].order*=-1;bag.sort(q);});';
$BODY.='bag.select(bags[0]);';
$BODY.='</script>';
?>
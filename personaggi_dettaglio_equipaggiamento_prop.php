<?php
$query="SELECT * FROM mephit_personaggio_equip WHERE fk_personaggio=".$_GET[id]."";
$result=mysql_query($query);
$itemsProperties=array("normal"=>array(),"wondrous"=>array(),"treasure"=>array());
$itemsIhave=array();
if(mysql_num_rows($result)>0){
	while($row=mysql_fetch_assoc($result)){
		$fk_item = $row[fk_item];
		switch($row[type]){
			case"w":
				$itemsProperties[wondrous][$fk_item]=$byId["w".$fk_item];
			break;
			case"t":
				$itemsProperties[treasure][$fk_item]=$byId["t".$fk_item];
			break;
			default:
				$itemsProperties[normal][$fk_item]=$byId[$fk_item];
			break;
		}
		$itemsIhave[$row[possession_id]]=$row;
	}
}
?>
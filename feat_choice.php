<?
require("include/db_connect.php");
$lang=substr($_COOKIE[mephit_lang],0,2);

if(strpos($_POST[what],",")){
	$what=explode(",",$_POST[what]);
}else{
	$what=array();
	$what[0]=$_POST[what];
}
foreach($what as $i=>$option){
	if(strpos($option,":")){
		$what[$i]=explode(":",$option);
	}else{
		$what[$i]=array();
		$what[$i][]=$option;
	}
}
$listone=array();
foreach($what as $i=>$option){
	if(isset($query))unset($query);
	switch($option[0]){
		case"weapon";
			switch($option[1]){
				case"exotic":
					$query="SELECT id,name_".$lang." AS name FROM srd35_equipment WHERE family='Weapons' AND category='Exotic Weapons' AND subcategory!='Ammunition' ORDER BY name";
				break;
				case"martial":
					$query="SELECT id,name_".$lang." AS name FROM srd35_equipment WHERE family='Weapons' AND category='Martial Weapons' AND subcategory!='Ammunition' ORDER BY name";
				break;
				case"crossbow":
					$query="SELECT id,name_".$lang." AS name FROM srd35_equipment WHERE name_en LIKE '%crossbow%' AND subcategory!='Ammunition' ORDER BY name";
				break;
				case"finesse":
					$query="SELECT id,name_".$lang." AS name FROM srd35_equipment WHERE (id IN (49,77,79) OR subcategory='Light Melee Weapons') AND subcategory!='Ammunition' ORDER BY name";
				break;
				default:
					$query="SELECT id,name_".$lang." AS name FROM srd35_equipment WHERE family='Weapons' AND subcategory!='Ammunition' ORDER BY name";
				break;
			}
		break;
		case "skill":
			$query="SELECT id,name_".$lang." AS name, subtype_".$lang." AS subtype FROM srd35_skill ORDER BY name";
		break;
	}
	if(isset($query)){
		$result=mysql_query($query);
		echo mysql_error();
		$lista=array();
		while($row=mysql_fetch_assoc($result)){
			if(isset($row[subtype])){
				$lista[]=array(
					$row[id],
					$row[name]." (".$row[subtype].")"
				);
			}else{
				$lista[]=array(
					$row[id],
					$row[name]
				);
			}
		}
		$listone[]=array($option[0],$lista);
	}
}
echo json_encode($listone);
?>

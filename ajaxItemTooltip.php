<?php
require("include/config.php");
if(is_numeric($_POST[what])){
	// oggetti non magici
	$id=$_POST[what];
	$query="SELECT *,full_text AS descrizione FROM srd35_equipment WHERE id=".$id;
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		echo $row[descrizione];
		echo '<br><br>';
		echo $row[subcategory].'; ';
		if(!is_null($row[armor_shield_bonus])){
			// armatura
			echo 'AC bonus '.$row[armor_shield_bonus].'; ';
			echo 'Max DEX '.$row[maximum_dex_bonus].'; ';
			echo 'Check penality '.$row[armor_check_penalty].'; ';
			echo 'Arcane failure '.$row[arcane_spell_failure_chance].'; ';
		}else if(!is_null($row[dmg_m])){
			// arma
			echo 'Damage '.$row[dmg_m].' '.$row[critical].'; ';
			echo 'Type '.$row[type].'; ';
			if(!is_null($row[range_increment])&&$row[range_increment]!="")echo 'Range increment '.$row[range_increment].'; ';
		}else{
			// oggetto
		}
		if(!is_null($row[price]))echo 'Price '.$row[price].'; ';
		if(!is_null($row[weight]))echo 'Weight '.$row[weight].'; ';
	}
}else if(substr($_POST[what],0,1)=="w"){
	// oggetti magici
	$id=substr($_POST[what],1);
	$query="SELECT *,full_text AS descrizione FROM srd35_item WHERE id=".$id;
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		echo $row[descrizione];
		if($row[fk_weapon]!=0&&$row[fk_weapon]!="-"){
			// arma magica
			$query2="SELECT * FROM srd35_equipment WHERE id=".$row[fk_weapon];
			$result2=mysql_query($query2);
			while($row2=mysql_fetch_assoc($result2)){
				echo '<b>'.$row2[name_en].':</b> '.$row2[full_text];
				echo '<br><br>';
				echo $row2[subcategory].'; ';
				echo 'Damage '.$row2[dmg_m].' '.$row2[critical].'; ';
				echo 'Type '.$row2[type].'; ';
				if(!is_null($row2[range_increment])&&$row2[range_increment]!="")echo 'Range increment '.$row2[range_increment].'; ';
				if(!is_null($row2[price]))echo 'Price '.$row2[price].'; ';
				if(!is_null($row2[weight]))echo 'Weight '.$row2[weight].'; ';
			}
		}else if(($row[fk_armor]!=0&&$row[fk_armor]!="-")||($row[fk_shield]!=0&&$row[fk_shield]!="-")){
			// armatura magica
			$in=array();
			if($row[fk_armor]!=0&&$row[fk_armor]!="-")$in[]=$row[fk_armor];
			if($row[fk_shield]!=0&&$row[fk_shield]!="-")$in[]=$row[fk_shield];
			
			$query2="SELECT * FROM srd35_equipment WHERE id IN (".implode(",",$in).")";
			$result2=mysql_query($query2);
			while($row2=mysql_fetch_assoc($result2)){
				echo '<b>'.$row2[name_en].':</b> '.$row2[full_text];
				echo '<br><br>';
				echo $row2[subcategory].'; ';
				echo 'AC bonus '.$row2[armor_shield_bonus].'; ';
				echo 'Max DEX '.$row2[maximum_dex_bonus].'; ';
				echo 'Check penality '.$row2[armor_check_penalty].'; ';
				echo 'Arcane failure '.$row2[arcane_spell_failure_chance].'; ';
				if(!is_null($row2[price]))echo 'Price '.$row2[price].'; ';
				if(!is_null($row2[weight]))echo 'Weight '.$row2[weight].'; ';
			}
		}else{
			// oggetti meravigliosi
			if(!is_null($row[subcategory]))echo $row[subcategory].'; ';
			if(!is_null($row[price]))echo 'Price '.$row[price].'; ';
			if(!is_null($row[weight]))echo 'Weight '.$row[weight].'; ';
		}
	}
}else if(substr($_POST[what],0,1)=="t"){
	// tesori
	$id=substr($_POST[what],1);
	$query="SELECT * FROM srd35_treasure WHERE id=".$id;
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		echo'<p><b>'.$row[name_en].'</b></p>';
		echo'<p>No aura (nonmagical); Price '.$row[price].' gp;'.(!is_null($row[weight])?'  Weight '.$row[weight].' lb.;':'').'</p>';
	}
}
?>
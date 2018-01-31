<?php
class PG {
	public function __construct($id) {
		$this->id=$id;
		$this->lang=$GLOBALS[_MEPHIT][lang];
		$this->row=array();
		$this->classi=array();
		$query="SELECT * FROM mephit_personaggio WHERE id_personaggio=".$id;
		$result=mysql_query($query);
		if($result && mysql_num_rows($result)>0){
			while($row=mysql_fetch_assoc($result))$this->row[personaggio]=$row;
		}else{
			return false;
		}
	}
	public function getClass(){
		$classi=array();
		if(!isset($this->row[classi])){
			$query="
				SELECT * FROM mephit_personaggio_classe AS mep
				JOIN srd35_class AS srd ON srd.id=mep.fk_classe
				WHERE fk_personaggio=".$this->id."
				ORDER BY liv
			";
			$result=mysql_query($query);
			if($result){
				$IDs=array();
				while($row=mysql_fetch_array($result)){
					$this->row[classi][]=$row;
					$this->classi[]=array(
						"id"=>$row[fk_classe],
						"name"=>$row["name_".$this->lang],
						"short"=>$row["name_short_".$this->lang],
						"bab"=>$row["bab"],
						"tem"=>$row["tem"],
						"rif"=>$row["rif"],
						"vol"=>$row["vol"],
						"dv"=>$row["dv"],
						"pa"=>$row["pa"],
					);
					$IDs[]=$row[fk_classe];
				}
				$IDs=array_unique($IDs);
				
				$class_skills=array();
				$query_c="
					SELECT
					*,
					s.name_".$this->lang." AS skill_name,
					a.name_".$this->lang." AS ability_name,
					a.short_".$this->lang." AS ability_short,
					s.subtype_".$this->lang." AS skill_subtype,
					a.name_".$this->lang." AS ability_name
					
					FROM srd35_class_skill AS c
					JOIN srd35_skill       AS s ON c.fk_abilita=s.id
					JOIN srd35_ability     AS a ON s.fk_ability=a.id
					WHERE c.fk_classe IN (".implode(",",array_merge((array)-1,(array)$IDs)).")
				";
				$result_c=mysql_query($query_c);
				while($row_c=mysql_fetch_array($result_c)){
					$class_skills[$row_c[fk_classe]][$row_c[fk_abilita]]=array(
						"id"=>$row_c[fk_abilita],
						"name"=>$row_c["skill_name"],
						"subtype"=>$row_c["skill_subtype"],
						"ability_id"=>$row_c["fk_ability"],
						"ability_short"=>$row_c["ability_short"],
						"ability"=>$row_c["ability_name"],
						"psionic"=>$row_c["psionic"],
						"trained"=>$row_c["trained"],
						"armor"=>$row_c["armor_check"],
						"description"=>$row_c["description"],
						"check"=>$row_c["skill_check"],
						"action"=>$row_c["action"],
						"retry"=>$row_c["try_again"],
						"special"=>$row_c["special"],
						"restriction"=>$row_c["restriction"],
						"synergy"=>$row_c["synergy"],
						"epic"=>$row_c["epic_use"],
						"untrained"=>$row_c["untrained"],
						"text"=>$row_c["full_text"],
						"reference"=>$row_c["reference"],
					);
				}
				foreach($this->classi AS $i=>$c){
					$this->classi[$i][skills]=$class_skills[$c[id]];
				}
			}
		}
		return $this->classi;
	}
	public function getMulticlass(){
		if(!isset($this->row[classi]))$this->getClass();
		if(!isset($this->multiclasse)){
			$this->multiclasse=array();
			foreach($this->classi AS $row2){
				if(!isset($this->multiclasse[$row2[id]])){
					$this->multiclasse[$row2[id]]=array(
						"id"=>$row2[id],
						"name"=>$row2[name],
						"short"=>$row2[short],
						"level"=>0,
						"bab"=>$row2[bab],
						"for"=>$row2[tem],
						"ref"=>$row2[rif],
						"wis"=>$row2[vol],
					);
				}
				$this->multiclasse[$row2[id]][level]++;
			}
		}
		return $this->multiclasse;
	}
	public function sumClasses(){
		if(!isset($this->multiclasse))$this->getMulticlass();
		if(!isset($this->sumClasses)){
			$b=0;$t=0;$r=0;$v=0;
			foreach($this->multiclasse AS $mc){
				$b+=babFromLevel($mc[bab],$mc[level]);
				$t+=tsFromLevel($mc[bab],$mc[tem]);
				$r+=tsFromLevel($mc[bab],$mc[rif]);
				$v+=tsFromLevel($mc[bab],$mc[vol]);
			}
			$this->sumClasses=array(
				"bab"=>$b,
				"for"=>$t,
				"ref"=>$r,
				"wil"=>$v,
			);
		}
		return $this->sumClasses;
	}
	public function getBAB(){
		if(!isset($this->sumClasses))$this->sumClasses();
		return $this->sumClasses[bab];
	}
	public function getFOR(){
		if(!isset($this->sumClasses))$this->sumClasses();
		return $this->sumClasses["for"];
	}
	public function getREF(){
		if(!isset($this->sumClasses))$this->sumClasses();
		return $this->sumClasses["ref"];
	}
	public function getWIL(){
		if(!isset($this->sumClasses))$this->sumClasses();
		return $this->sumClasses["wil"];
	}
	public function getRace(){
		if(!isset($this->row[race])){
			$query="
				SELECT * FROM srd35_race
				WHERE id=".$this->row[personaggio][race]."
			";
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				$this->row[race]=$row;
				$this->race=array(
					"id"=>$row[id],
					"name"=>$row["name_".$this->lang],
					"_str"=>$row[_str],
					"_dex"=>$row[_dex],
					"_con"=>$row[_con],
					"_int"=>$row[_int],
					"_wis"=>$row[_wis],
					"_cha"=>$row[_cha],
					"_for"=>$row[_ts_for],
					"_ref"=>$row[_ts_ref],
					"_wil"=>$row[_ts_wil],
					"size_id"=>$row[fk_size],
					"class_id"=>$row[fk_id],
					"traits"=>$row["traits_".$this->lang],
				);
			}
		}
		return $this->race;
	}
	public function getAlignment(){
		if(!isset($this->row[alignment])){
			$query2="
				SELECT * FROM srd35_alignment
				WHERE id=".$this->row[personaggio][allineamento]."
			";
			$result2=mysql_query($query2);
			while($row2=mysql_fetch_array($result2)){
				$this->row[alignment]=$row;
				$this->alignment=array(
					"id"=>$row2[id],
					"name"=>$row2["name_".$this->lang],
					"short"=>$row2["name_short_".$this->lang],
				);	
			}
		}	
		return $this->alignment;
	}
	public function getAbility(){
		if(!isset($this->ability)){
			$this->ability=array(
				"score"=>array(
					"_str"=>$this->row[personaggio][_for],
					"_dex"=>$this->row[personaggio][_des],
					"_con"=>$this->row[personaggio][_cos],
					"_int"=>$this->row[personaggio][_int],
					"_wis"=>$this->row[personaggio][_sag],
					"_cha"=>$this->row[personaggio][_car],
				),
				"mod"=>array(
					"_str"=>floor(($this->row[personaggio][_for]-10)/2),
					"_dex"=>floor(($this->row[personaggio][_des]-10)/2),
					"_con"=>floor(($this->row[personaggio][_cos]-10)/2),
					"_int"=>floor(($this->row[personaggio][_int]-10)/2),
					"_wis"=>floor(($this->row[personaggio][_sag]-10)/2),
					"_cha"=>floor(($this->row[personaggio][_car]-10)/2),
				),
			);
		}
		return $this->ability;
	}
	public function getAbilityIncrement(){
		if(!isset($this->row[abilityIncrement])){
			$this->row[abilityIncrement]=array();
			$query="SELECT * FROM mephit_personaggio_caratteristica AS c
			JOIN srd35_ability AS a ON a.id=c.fk_caratteristica
			WHERE c.fk_personaggio=".$this->id."
			ORDER BY c.liv";
			$result=mysql_query($query);
			while($row=mysql_fetch_assoc($result)){
				$this->row[abilityIncrement][]=$row;
			}
			$this->abilityIncrement=array();
			foreach($this->row[abilityIncrement] AS $abi){
				$this->abilityIncrement[]=array(
					"id"=>$abi[fk_caratteristica],
					"name"=>$abi["name_".$this->lang],
					"short"=>$abi["short_".$this->lang],
					"level"=>$abi[liv],
					"bonus"=>$abi[bonus],
					"code"=>$abi[code],
				);
			}
		}
		return $this->abilityIncrement;
	}
	public function getAbilityTotal(){
		if(!isset($this->abilityTotal)){
			$abilities=$this->getAbility();
			
			// aggiungo bonus raziali
			$race=$this->getRace();
			foreach($abilities[score] AS $k=>$v){
				$abilities[score][$k]=$v+($race[$k]);
			}
			// aggiungo bonus aumento livello
			$increment=$this->getAbilityIncrement();
			foreach($increment AS $a){
				$abilities[score][$a[code]]+=$a[bonus];
			}
			// alla stessa maniera posso inserire archetipi
			// ...
			// alla stessa maniera posso inserire bonus derivanti da età
			// ...
			// alla stessa maniera posso inserire bonus derivanti da equipaggiamento
			// ...
			
			$abilities[mod]=array(
				"_str"=>floor(($abilities[score][_str]-10)/2),
				"_dex"=>floor(($abilities[score][_dex]-10)/2),
				"_con"=>floor(($abilities[score][_con]-10)/2),
				"_int"=>floor(($abilities[score][_int]-10)/2),
				"_wis"=>floor(($abilities[score][_wis]-10)/2),
				"_cha"=>floor(($abilities[score][_cha]-10)/2),
			);
			$this->abilityTotal=$abilities;
		}
		return $this->abilityTotal;
	}
	public function getFeat(){
		if(!isset($this->row[feat])){
			$this->feat=array();
			$query="
				SELECT *,mephit_personaggio_talento.choice AS choice_done FROM mephit_personaggio_talento
				JOIN srd35_feat ON id=fk_feat
				WHERE fk_personaggio=".$this->id."
			";
			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_assoc($result)){
					$this->row[feat][]=$row;
				}
				foreach($this->row[feat] AS $f){
					$this->feat[]=array(
						"id"=>$f[id],
						"relation_id"=>$f[relation_id],
						"name"=>$f["name_".$this->lang],
						"name_en"=>$f["name_en"],
						"prerequisite"=>$f['prerequisite_'.$this->lang],
						"level"=>$f[liv],
						"choice"=>$f[choice],
						"choice_done"=>$f[choice_done],
						"note"=>$f[note],
					);
				}
			}
		}
		return $this->feat;
	}
	public function getPA(){
		if(!isset($this->row[pa])){
			$query="SELECT * FROM mephit_personaggio_abilita WHERE fk_personaggio=".$this->id;
			$result=mysql_query($query);
			$this->row[pa]=array();
			$this->pa=array();
			while($row=mysql_fetch_assoc($result)){
				$this->row[pa][]=$row;
				$this->pa[$row[liv]][$row[fk_abilita]]=$row[pa];
			}
		}
		return $this->pa;
	}
	public function getRanksPerLevel(){
		if(!isset($this->ranksPerLevel))$this->getSkillTotal();
		return $this->ranksPerLevel;
	}
	public function getAbilitiesPerLevel(){
		if(!isset($this->abilitiesPerLevel)){
			$A=$this->getAbilityTotal();
			$I=$this->getAbilityIncrement();
			$multiclasse=$this->getClass();
			
			// calcolo le caratteristiche totali e tolgo i bonus da incremento livello,
			// in modo da ottenere la situazione a livello 1
			
			$AbI=array();
			$AbI[1]=$A;
			foreach($I as $i){
				if($i[level]<=count($multiclasse)){
					$x=$AbI[1][score][$i[code]]-$i[bonus];
					$AbI[1][score][$i[code]]=$x;
					$AbI[1][mod][$i[code]]=MOD($x);
				}
			}
			
			// preparo array "$AbI" (Abilità bonus Incremento)
			// Ad ogni elemento corrisponde 1 livello posseduto dal PG
			// In ogni elemento ci sono punti e mod di caratteristica che il PG ha a quel livello
			for($l=2;$l<=count($multiclasse);$l++){
				$AbI[$l]=$AbI[$l-1];
				foreach($I as $i){
					if($i[level]==$l){
						$x=$AbI[$l][score][$i[code]]+$i[bonus];
						$AbI[$l][score][$i[code]]=$x;
						$AbI[$l][mod][$i[code]]=MOD($x);
					}
				}
			}
			$this->abilitiesPerLevel=$AbI;
		}
		return $this->abilitiesPerLevel;
	}
	public function getSkill(){
		
	}
	public function getSkillTotal(){
		if(!isset($this->skillTotal)){
			
			$A=$this->getAbilityTotal();
			$I=$this->getAbilityIncrement();
			$R=$this->getRace();
			$PA=$this->getPA();
			$multiclasse=$this->getClass();
			
			// preparo array "$caratteristiche"
			// Ad ogni elemento corrisponde 1 caratteristica SRD35
			
			$query_ability="SELECT * FROM srd35_ability";
			$result_ability=mysql_query($query_ability);
			$caratteristiche=array();
			while($row=mysql_fetch_assoc($result_ability)){
				$caratteristiche[$row[id]]=array(
					"id"=>$row[id],
					"name"=>$row["name_".$this->lang],
					"short"=>$row["short_".$this->lang],
					"code"=>$row[code],
				);
			}
			
			// preparo array "$AbI" (Abilità bonus Incremento)
			$AbI=$this->getAbilitiesPerLevel();
			
			// preparo array "$classi" 
			// Ad ogni elemento corrisponde 1 livello posseduto dal PG
			// In ogni elemento c'è la classe che il PG ha a quel livello
			
			$query_classi="SELECT
			id,name_".$this->lang." AS name,name_short_".$this->lang." AS abbr
			FROM mephit_personaggio_classe
			JOIN srd35_class ON fk_classe=id
			WHERE fk_personaggio=".$_GET["id"];
			$result_classi=mysql_query($query_classi);
			$classi=array();
			while($row2=mysql_fetch_array($result_classi)){
				if(!isset($classi[$row2[id]])){
					$classi[$row2[id]]=array(
						"name"=>$row2[name],
						"abbr"=>$row2[abbr],
						"level"=>0,
						"skills"=>array()
					);
					$query_skills="SELECT
					id
					FROM srd35_class_skill
					JOIN srd35_skill ON id=fk_abilita
					WHERE fk_classe=".$row2[id]."
					ORDER BY name_".$this->lang."
					";
					$result_skills=mysql_query($query_skills);
					while($row3=mysql_fetch_array($result_skills)){
						$classi[$row2[id]][skills][$row3[id]]=$skills[$row3[id]];
					}
				}
				$classi[$row2[id]][level]++;
			}
			
			// preparo array "$skills" 
			// Ad ogni elemento corrisponde 1 abilità SRD35
			
			$query_a="
				SELECT
				*,
				id AS skill_id,
				code AS skill_code,
				name_".$this->lang." AS skill_name,
				subtype_".$this->lang." AS skill_subtype
				
				FROM srd35_skill
				WHERE psionic=0
				ORDER BY name_".$this->lang."
			";
			$result_a=mysql_query($query_a);
			$skills=array();
			while($row=mysql_fetch_assoc($result_a)){
				$s=array(
					"id"=>$row[skill_id],
					"code"=>$row[skill_code],
					"name"=>$row[skill_name],
					"ability"=>$row[key_ability],
					"ability_id"=>$row[fk_ability],
					"psionic"=>$row[psionic],
					"train"=>$row[trained],
					"armor"=>$row[armor_check],
					"subtype"=>$row[skill_subtype],
				);
				if($s[ability_id]!=0){
					$s[ability_name]=$caratteristiche[$s[ability_id]][name];
					$s[ability_short]=$caratteristiche[$s[ability_id]][short];
				}else{
					$s[ability_name]="";
					$s[ability_short]="";
				}
				$skills[$row[skill_id]]=$s;
			}
						
			// preparo array "$synergy" 
			
			$query="SELECT 
			
			id_skill_give AS give_id,
			id_skill_get AS get_id,
			special_".$this->lang." AS special
			
			FROM srd35_sinergy";
			$result=mysql_query($query);
			$synergy=array();
			$sget=array();
			$sgiv=array();
			$sspe=array();
			while($row=mysql_fetch_assoc($result)){
				$synergy[$row[get_id]][]=array(
					"id"=>$row[give_id],
					"special"=>$row[special]
				);
				$sget[]=$row[get_id];
				$sgiv[]=$row[give_id];
				$sspe[]=addslashes($row[special]);
			}
			
			// preparo array "$racial" 
			
			$query="SELECT *
			FROM srd35_race_skill
			WHERE id_race=".$R[id]."
			";
			$result=mysql_query($query);
			$racial=array();
			while($row=mysql_fetch_assoc($result)){
				$racial[$row[id_skill]]=array(
					"id"=>$row[id_skill],
					"special"=>$row["special_".$this->lang],
					"bonus"=>$row[bonus]
				);
			}
			
			// ciclo livelli
			
			$total_ranks_per_skill=array();
			$total_pa_per_skill=array();
			$only_available_skills_unsorted=array();
			$this->ranksPerLevel=array();
			
			for($LEP=1;$LEP<=count($multiclasse);$LEP++){
				
				$classe=$multiclasse[$LEP-1];
				$caratt=array(
					0,
					$AbI[$LEP][mod][_str],
					$AbI[$LEP][mod][_dex],
					$AbI[$LEP][mod][_con],
					$AbI[$LEP][mod][_int],
					$AbI[$LEP][mod][_wis],
					$AbI[$LEP][mod][_cha],
				);
				
				$pa_totale=$classe[pa]+$AbI[$LEP][mod][_int];
				if($R[id]==6)$pa_totale+=1;
				if($LEP==1)$pa_totale*=4;
				$cap=$LEP+3;
				
				$pa_disponibili=$pa_totale;
				if(isset($PA[$LEP])){
					foreach($PA[$LEP] AS $paSkill)$pa_disponibili-=$paSkill;
				}
				
				foreach($skills AS $k){
					$sname=$k[name];
					$ssub=$k[subtype];
					$sability=strtoupper($k[ability]);
					$lability=strtoupper($k[ability_short]);
					$iability=$k[ability_id];
					$strain=$k[train];
					$sarmor=$k[armor];
					$skill_id=$k[id];
						
					if (is_null($classe[skills])) {
						$isClassSkill = false;
					} else {
						$isClassSkill = in_array($skill_id, array_keys($classe[skills]));
					}
					$pa_current_level=isset($PA[$LEP][$skill_id])?$PA[$LEP][$skill_id]:0;
					$ranks_current_level=$isClassSkill?$pa_current_level:$pa_current_level/2;
					$total_pa_per_skill[$skill_id]+=$pa_current_level;
					$total_ranks_per_skill[$skill_id]+=$ranks_current_level;
					$hasRanks=$total_ranks_per_skill[$skill_id]>=1;
					
					$this->ranksPerLevel[$LEP][$skill_id]=$total_ranks_per_skill[$skill_id];
					
					if($LEP==count($multiclasse)){
						if($hasRanks||!$strain)$only_available_skills_unsorted[]=$k;
					}
				}
				
			}
			
			$this->skillTotal=array();
			foreach($skills as $id=>$skill){
				
				$ranks=$total_ranks_per_skill[$id];
				$hasRanks=$ranks>=1;
				$needTraining=$skill[train];
				
				if($hasRanks||!$needTraining){
					$mod=($skill[ability_id]==0)?0:$mod=$A[mod][$caratteristiche[$skill[ability_id]][code]];
					if(isset($racial[$id])){
						$raz=$racial[$skill[id]][special]==""?$racial[$skill[id]][bonus]:0;
					}else{
						$raz=0;
					}
					$syn=0;
					if(isset($synergy[$id])){
						foreach($synergy[$id] AS $s){
							if($total_ranks_per_skill[$s[id]]>=5){
								if($s[special]==""){
									$syn+=2;
								}/*else{
									$syn_special[$s[id]]="+2 alle prove di ".$skill[name]." in caso di: ".$s[special];
								}*/
							}
						}
					}
/*
				echo "name:".$skills[$id][name]."<br />";
				echo "ranks:".$ranks."<br />";
				echo "hasRanks:".($hasRanks?"true":"false")."<br />";
				echo "needTraining:".$needTraining."<br />";
				echo "mod:".$mod."<br />";
				echo "raz:".$raz."<br />";
				echo "syn:".$syn."<br />";
				echo "subtype: (".($skills[$id][subtype]!=""?$skills[$id][subtype]:"").")<br />";
				echo "<br />";
*/					
					// taglia piccola = +4 Nascondersi
					$size=($R[size_id]==3&&$id==18)?4:0;
					$final=floor($mod+$ranks+$syn+$raz+$size);
					
					$this->skillTotal[$id]=array(
						"name"=>$skills[$id][name].($skills[$id][subtype]!=""?" (".$skills[$id][subtype].")":""),
						"subtype"=>$skills[$id][subtype],
						"total"=>$final,
						"code"=>$skills[$id][code],
						"ranks"=>$ranks,
					);
				}
			}
		}
		return $this->skillTotal;
	}
	public function getDeity(){
		if(!is_null($this->row[personaggio][deity])&&$this->row[personaggio][deity]!="NULL"){
			if(!isset($this->row[deity])){
				// seleziono la divinità
				$query="
					SELECT * FROM mephit_god
					WHERE id=".$this->row[personaggio][divinita]."
				";
				$result=mysql_query($query);
				while($row=mysql_fetch_array($result)){
					$this->row[deity]=$row;
					$this->deity=array(
						"id"=>$row[id],
						"name"=>$row[name],
						"alignment"=>array(
							"id"=>$row[fk_alignment],
						),
						"domains"=>array(),
						"classes"=>array(),
						"races"=>array(),
					);
					// seleziono l'allineamento
					$query2="
						SELECT * FROM srd35_alignment
						WHERE id=".$row[fk_alignment]."
					";
					$result2=mysql_query($query2);
					while($row2=mysql_fetch_array($result2)){
						$this->row[deity_alignment]=$row;
						$this->deity[alignment][name]=$row2["name_".$this->lang];
						$this->deity[alignment][short]=$row2["name_short_".$this->lang];
					}
					// seleziono i domini
					$query2="
						SELECT * FROM mephit_god_domain AS g
						JOIN srd35_domain AS d ON d.id=g.fk_domain
						WHERE g.fk_god=".$this->deity[id]."
						ORDER BY d.name_".$this->lang."
					";
					$result2=mysql_query($query2);
					while($row2=mysql_fetch_array($result2)){
						$this->row[deity_domains][]=$row;
						$this->deity[domains][]=array(
							"id"=>$row2[id],
							"name"=>$row2["name_".$this->lang],
							"provenienza"=>$row2[provenienza],
						);
					}
					// seleziono le classi
					$query2="
						SELECT * FROM mephit_god_class AS g
						JOIN srd35_class AS c ON c.id=g.fk_class
						WHERE g.fk_god=".$this->deity[id]."
						ORDER BY c.name_".$this->lang."
					";
					$result2=mysql_query($query2);
					while($row2=mysql_fetch_array($result2)){
						$this->row[deity_classes][]=$row;
						$this->deity[classes][]=array(
							"id"=>$row2[id],
							"name"=>$row2["name_".$this->lang],
							"short"=>$row2["name_short_".$this->lang],
						);
					}
					// seleziono le razze
					$query2="
						SELECT * FROM mephit_god_race AS g
						JOIN srd35_race AS r ON r.id=g.fk_race
						WHERE g.fk_god=".$this->deity[id]."
						ORDER BY r.name_".$this->lang."
					";
					$result2=mysql_query($query2);
					while($row2=mysql_fetch_array($result2)){
						$this->row[deity_races][]=$row;
						$this->deity[races][]=array(
							"id"=>$row2[id],
							"name"=>$row2["name_".$this->lang],
						);
					}
					// seleziono l'arma
					$query2="
						SELECT * FROM mephit_god_weapon AS g
						JOIN srd35_weapon AS w ON w.id=g.fk_weapon
						WHERE g.fk_god=".$this->deity[id]."
						ORDER BY w.name_".$this->lang."
					";
					$result2=mysql_query($query2);
					while($row2=mysql_fetch_array($result2)){
						$this->row[deity_weapon]=$row;
						$this->deity[weapon]=array(
							"id"=>$row2[id],
							"name"=>$row2["name_".$this->lang],
						);
					}
				}
			}
		}else{
			$this->deity=NULL;
		}
		return $this->deity;
	}
}
?>
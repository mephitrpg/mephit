<?php

// ottengo i dati sul personaggio dal db

$A=$P->getAbilityTotal();
$I=$P->getAbilityIncrement();
$R=$P->getRace();
$PA=$P->getPA();
$multiclasse=$P->getClass();

// preparo array "$caratteristiche"
// Ad ogni elemento corrisponde 1 caratteristica SRD35

$query_ability="SELECT * FROM srd35_ability";
$result_ability=mysql_query($query_ability);
$caratteristiche=array();
while($row=mysql_fetch_assoc($result_ability)){
	$caratteristiche[$row[id]]=array(
		"id"=>$row[id],
		"name"=>$row["name_".$_MEPHIT[lang]],
		"short"=>$row["short_".$_MEPHIT[lang]],
		"code"=>$row[code],
	);
}

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

// preparo array "$classi" 
// Ad ogni elemento corrisponde 1 livello posseduto dal PG
// In ogni elemento c'è la classe che il PG ha a quel livello

$query_classi="SELECT
id,name_".$_MEPHIT[lang]." AS name,name_short_".$_MEPHIT[lang]." AS abbr
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
		ORDER BY name_".$_MEPHIT[lang]."
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
	name_".$_MEPHIT[lang]." AS skill_name,
	subtype_".$_MEPHIT[lang]." AS skill_subtype
	
	FROM srd35_skill
	WHERE psionic=0
	ORDER BY name_".$_MEPHIT[lang]."
";
$result_a=mysql_query($query_a);
echo mysql_error();
$skills=array();
$skills_js=array();
while($row=mysql_fetch_assoc($result_a)){
	$s=array(
		"id"=>$row[skill_id],
		"code"=>$row[skill_code],
		"name"=>$row[skill_name],
		"ability"=>$row[key_ability],
		"ability_id"=>$row[fk_ability],
		"psionic"=>$row[psionic]*1,
		"train"=>$row[trained]*1,
		"armor"=>$row[armor_check]*1,
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
	$skills_js[]="s".$s[id].":{n:\"".$s[name]."\",nt:".$s[train].",ap:".$s[armor].",ca:".(!is_null($s[ability_id])?$s[ability_id]:'null')."}";
}

//xmp($skills);

// suddivido le abilità in gruppi (tipologia)
// preparo l'array "$skills_output" 
// Ad ogni elemento corrisponde 1 gruppo di abilità SRD35

$skills_output=array(
	"knowledge"=>array(),
	"craft"=>array(),
	"speakLanguages"=>array(),
	"perform"=>array(),
	"profession"=>array(),
	"generic"=>array(),
);
foreach($skills AS $k=>$v){
	if(strpos($v[code],"knowledge_")===0){
		$skills_output[knowledge][$k]=$v;
	}else if(strpos($v[code],"craft_")===0){
		$skills_output[craft][$k]=$v;
	}else if(strpos($v[code],"speakLanguages_")===0){
		$skills_output[speakLanguages][$k]=$v;
	}else if(strpos($v[code],"perform_")===0){
		$skills_output[perform][$k]=$v;
	}else if(strpos($v[code],"profession_")===0){
		$skills_output[profession][$k]=$v;
	}else{
		$skills_output[generic][$k]=$v;
	}
}

//xmp($skills_output);

$query="SELECT 

id_skill_give AS give_id,
id_skill_get AS get_id,
special_".$_MEPHIT[lang]." AS special

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
//xmp($synergy);

$query="SELECT *
FROM srd35_race_skill
WHERE id_race=".$R[id]."
";
$result=mysql_query($query);
$racial=array();
$racial_js=array();
while($row=mysql_fetch_assoc($result)){
	$racial[$row[id_skill]]=array(
		"id"=>$row[id_skill],
		"special"=>$row["special_".$_MEPHIT[lang]],
		"bonus"=>$row[bonus]
	);
	$racial_js[]="r".$row[id_skill].":{b:".$row[bonus].",s:'".addslashes($row[special])."'}";
}
//xmp($racial);

// GUI

$BODY.='<form id="form-dndtool" action="personaggi_save.php" method="post">';
$BODY.='<input type="hidden" name="what" value="abilita">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';

$quantiLivelli=count($multiclasse);
if($quantiLivelli>0){
	
	$BODY.='<script>
		var caratt=["",'.$A[mod][_str].','.$A[mod][_dex].','.$A[mod][_con].','.$A[mod][_int].','.$A[mod][_wis].','.$A[mod][_cha].']
		var skills={'.implode(',',$skills_js).'}
		var synergy_get=['.implode(',',$sget).']
		var synergy_give=['.implode(',',$sgiv).']
		var synergy_special=["'.implode('","',$sspe).'"]
		var racial={'.implode(",",$racial_js).'};
		var size_id='.$R[size_id].';
		var pa_disp=[];pa_disp[0]="";
		var pa_tot=[];pa_tot[0]="";
		
		var quantiLivelli='.$quantiLivelli.';
		var current_lep=0;
		var current_type="generic";
		function mostraLEP(q){
			var wasTOTAL=current_lep==0;
			var tNEW,tOLD="-"+current_type;
			var lNEW,lOLD="-"+current_lep;
			var kNEW,kOLD="-"+current_lep+"-"+current_type;
			
			if(typeof q=="string"){
				lNEW="-"+current_lep;
				tNEW="-"+q;
				current_type=q;
			}else{
				lNEW="-"+q;
				tNEW="-"+current_type;
				current_lep=q;
			}
			kNEW=lNEW+tNEW;
			//alert([lNEW,lOLD,tNEW,tOLD,kNEW,kOLD])
			
			$("skillsMenu-links").setStyle({visibility:"visible"});
			
			if(wasTOTAL){
				$("lep-0").hide();
				$("group-0-generic").hide();
				$("lepmenu-0").removeClassName("sel");
			}else{
				$("lep"+lOLD).hide();
				$("group"+kOLD).hide();
				$("lepmenu"+lOLD).removeClassName("sel");
				$("typemenu"+tOLD).removeClassName("sel");
			}
			
			$("lep"+lNEW).show();
			$("group"+kNEW).show();
			$("lepmenu"+lNEW).addClassName("sel");
			$("typemenu"+tNEW).addClassName("sel");
			
		}
		function mostraTotale(){
			$("skillsMenu-links").setStyle({visibility:"hidden"});
			
			$("lep-"+current_lep).hide();
			$("group-"+current_lep+"-"+current_type).hide();
			$("lepmenu-"+current_lep).removeClassName("sel");
			
			$("lep-0").show();
			$("group-0-generic").show()
			$("lepmenu-0").addClassName("sel");
			current_lep=0;
		}
		function sign(q){
			return (q<0?"":"+")+q;
		}
		
		function p(skill,lep){addToSkill(skill,lep,1)};
		function m(skill,lep){addToSkill(skill,lep,-1)};
		
		function addToSkill(skill_id,LEP,p){
			
			var i;
			var TD=[
				$("cell-"+LEP+"-"+skill_id+"-0"),
				$("cell-"+LEP+"-"+skill_id+"-1"),
				$("cell-"+LEP+"-"+skill_id+"-2")
			];
			TD[0].down(p>0?".plus":".minus").blur();
			
			var skill={
				id:skill_id,
				isClass:pg[LEP-1].skill["s"+skill_id].ac,
				needTraining:skills["s"+skill_id].nt,
				armorPenality:skills["s"+skill_id].ap
			}
			var pa={
				INPUT:TD[1].down(".input-hidden"),
				DIVDISP:$("pa-disp-"+LEP)
			}
			var ranks={
				DIV:TD[1].down(".input-text"),
				max:pg[LEP-1].paMax
			}
			
			pa["value"]=getPgPA(skill.id,LEP);
			pa["total"]=pa.value+p;
			setPgPA(skill.id,LEP,pa.total)
			ranks["value"]=pa.total/(skill.isClass?1:2);
			ranks["total"]=getPgRanks(skill.id,LEP);
			
			// aggiorna skill liv corrente
			
			pa.INPUT.disabled=pa.total==0;
			if(pa.total!=0)pa.INPUT.value=pa.total;
			pa_disp[LEP]-=p;
			pa.DIVDISP.update(pa_disp[LEP]);
			ranks.DIV.update(ranks.value);
			var td1=pa.DIVDISP.up("td");
			var td2=td1.next();
			td1.removeClassName("errorpadisp");
			td2.removeClassName("errorpadisp");
			if(pa_disp[LEP]<0||pa_disp[LEP]>pa_tot[LEP]){
				td1.addClassName("errorpadisp");
				td2.addClassName("errorpadisp");
			}
			
			// aggiorna skill liv superiori
			
			ranks["all"]=ranks.total
			ranks["has"]=ranks.all>=1;
						
			var livelli=[];
			
			var parz;
			for(var liv=LEP;liv<=quantiLivelli;liv++){
//				console.log(["succ",liv,$("ranks-"+liv+"-"+skill.id).innerHTML*1,parz]);
				parz=getPgRanks(skill.id,liv);
				
				var c0=$("cell-"+liv+"-"+skill.id+"-0");
				var c1=$("cell-"+liv+"-"+skill.id+"-1");
				var c2=$("cell-"+liv+"-"+skill.id+"-2");
				
				var livClassSkill=pg[liv-1].skill["s"+skill.id].ac;
				var mustBeLowerThan=livClassSkill?(liv+3):((liv+3)/2);
//				console.log([liv,livClassSkill,parz,mustBeLowerThan])
				
				if(parz>mustBeLowerThan||parz<0){
					class1="maxe";
					class2="mine";
				}else{
					if(parz>=1||!skill.needTraining){
						class1="maxc";
						class2="minc";
					}else{
						class1="maxi";
						class2="mini";
					}
				}
				c0.className=class1;
				c1.className=class1;
				c2.className=class2;
				
				c2.select(".partial")[0].innerHTML=parz;
			}
			calcolaTotaleBonus(skill.id);
		}
		
		function calcolaTotaleBonus(skill_id){
			// check if other skills obtains synergy from this one?
			var recursive=arguments.length>1?arguments[1]:true;
			// caratteristica
			var c=caratt[skills["s"+skill_id].ca];
			// sinergia
			var ranks_decimal=getPgRanks(skill_id,quantiLivelli);
			var ranks=Math.floor(ranks_decimal);
			var give=synergy_give.indexOf(skill_id)!=-1;
			var get=synergy_get.indexOf(skill_id)!=-1;
			var syn=0;
			if(get){
				for(var i=0;i<synergy_get.length;i++){
					if(synergy_get[i]==skill_id){
						var r=getPgRanks(synergy_give[i]);
						if(r>=5){
							if(synergy_special[i]==""){
//								console.log(skill_id+" get from "+synergy_give[i])
								syn+=2;
							}else{
								var s_id="syn-"+synergy_give[i];
								var s=$(s_id);
								if(!s){
									var d=new Element("div");
									d.id=s_id;
									d.innerHTML="+2 alle prove di "+skills["s"+skill_id].n+" in caso di: "+synergy_special[i];
									$("syn_special").insert(d);
								}
							}
						}else{
							var s_id="syn-"+synergy_give[i];
							var s=$(s_id);
							if(s)s.remove();
						}
					}
				}
			}
//			console.log([skill_id,syn])
			if(give&&recursive){
				for(var i=0;i<synergy_give.length;i++){
					if(synergy_give[i]==skill_id){
//						console.log(skill_id+ " give +2 to "+synergy_get[i])
						calcolaTotaleBonus(synergy_get[i],false);
					}
				}
			}
			// razza
			var raz=0,raziale;
			try{
				var raziale=racial["r"+skill_id];
				if(raziale.special!="")raz=raziale.bonus;
			}catch(e){
				raz=0;
			}
			// Taglia piccola = +4 Nascondersi
			var size=(size_id==3&&skill_id==18)?4:0;
			// aggiorna
			$("ranks-total-"+skill_id).innerHTML=ranks_decimal;
			$("vari-total-"+skill_id).innerHTML=syn+raz+size;
			$("total-total-"+skill_id).innerHTML=ranks+c+syn+raz+size;
		}
		
		pg=[];
	';	


	for($i=0,$LEP=1;$i<$quantiLivelli;$i++,$LEP++){
		$pa_js=array();
		foreach($skills AS $id=>$s){
			// pa
			$ppaa=isset($PA[$LEP][$id])?$PA[$LEP][$id]:0;
			// is class skill?
			$aacc=isset($multiclasse[$LEP-1][skills][$id])?1:0;
			// need training?
			$nntt=$skills[$id][train];
			// apply armor penality?
			$aapp=$skills[$id][armor];
			// compose string
			$pa_js[]="s$id:{pa:$ppaa,ac:$aacc}";
		}
		$BODY.='pg['.$i.']={'
			.'paMax:'.(($AbI[$LEP][mod][_int]+$multiclasse[$LEP-1][pa]+($R[id]==6?1:0))*($LEP==1?4:1)).','
			.'ability:{'
				.'_str:'.$AbI[$LEP][mod][_str].','
				.'_dex:'.$AbI[$LEP][mod][_dex].','
				.'_con:'.$AbI[$LEP][mod][_con].','
				.'_int:'.$AbI[$LEP][mod][_int].','
				.'_wis:'.$AbI[$LEP][mod][_wis].','
				.'_cha:'.$AbI[$LEP][mod][_cha].''
				.'},'
			.'skill:{'
				.implode(',',$pa_js)
			.'}'
		.'}
	';
	}

	$BODY.='
	/*
	for(var i=0;i<pg.length;i++){
		if(i=0){
			pg[i]["ranks"]={};
			for(t in pg[i][pa]){
				console.log(t);
			}
		}else{
			
		}
	}
	*/
	function getPgRanks(skill_id){
		var lep=arguments[1]||quantiLivelli;
		var r=0;
		for(var i=0;i<lep;i++){
			var s=pg[i].skill["s"+skill_id];
			r+=s.ac?s.pa:s.pa/2;
		}
		return r;
	}
	function setPgPA(skill_id,lep,q){
		pg[lep-1].skill["s"+skill_id].pa=q;
	}
	function getPgPA(skill_id,lep){
		return pg[lep-1].skill["s"+skill_id].pa;
	}
	
	</script>';
	
	$quanteColonne=3;
	$BODY.='<style>
	#skillTable{border:1px solid #c00000;}
	#skillTable TD{padding:6px;}
	#skillTable TD.noPadding{padding:0;}
	#livelli {background:#c00000;}
	#livelli A{
		display:block;
		color:#fff;padding:2px 6px;
		text-align:right;text-decoration:none;
	}
	#livelli A:hover{
		background:#fff;
		color:#c00000;
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(opacity=70)";
		filter:alpha(opacity=70);
		opacity:0.7;-moz-opacity:0.7;zoom:1;
	}
	#livelli A.sel{background:#fff;color:#c00000;}
	#skillsMenu{background:#c00000;}
	#skillsMenu TD{padding:0 6px;}
	#skillsMenu A{
		display:block;float:left;
		color:#fff;padding:2px 6px;
		text-align:right;text-decoration:none;
	}
	#skillsMenu A:hover{
		background:#fff;
		color:#c00000;
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(opacity=70)";
		filter:alpha(opacity=70);
		opacity:0.7;-moz-opacity:0.7;zoom:1;
	}
	#skillsMenu A.sel{background:#fff;color:#c00000;}
	.armorPenality{color:#c00000;cursor:help;}
	.needTraining{color:#00f;cursor:help;}
	.pa_error{color:#f00;}
	.bigSkill{padding:0;text-align:right;width:2em;font-size:20pt;border:0;color:#fff;background-color:transparent;}
	.plus,.minus{
		display:block;
		width:16px;height:16px;line-height:16px;
		text-align:center;text-decoration:none;
		font-size:16px;font-weight:bold;color:#fff;
	}
	.plus:hover{background:#fff;color:#666;}
	.minus:hover{background:#c00;color:#666;}
	.maxc{background:#98c908;}
	.minc{background:#c0e559;}
	.maxi{background:#e0efb5;}
	.mini{background:#ecf7ce;}
	.maxe{background:#f87000;}
	.mine{background:#ffa861;}
	
	#lep-0 TABLE{border:1px solid #ccc;border-width:1px 1px 0 0;}
	#lep-0 TD,#lep-0 TH{border:1px solid #ccc;border-width:0 0 1px 1px;}
	.dispari{background:#f2e4bc;}
	   .pari{background:#fff;}
	.unavailable{text-decoration:line-through;cursor:help;color:#666;}
	
	.skillName{cursor:help;}
	.mini .skillName{text-decoration:line-through;color:#666;}
	.diClasse{font-weight:bold;text-transform:uppercase;}
	.partial{float:right;}
	.thNum{font-size:28pt;}
	.sim{font-size:9px;color:#666;}
	.fs4{font-size:4px}
	
	.errorpadisp{color:#f00;}
	</style>
	';
	
	$BODY.='<table id="skillTable" border="0" cellpadding="0" cellspacing="0">';
	$BODY.='<tr valign="top" id="skillsMenu">';
	$BODY.='<td>';
	$BODY.='&nbsp;';
	$BODY.='</td>';
	$BODY.='<td><div id="skillsMenu-links" style="visibility:hidden;">';
	
	// inizio tab gruppi abilità
	
	$BODY.='<a href="javascript:mostraLEP(\'generic\');"		id="typemenu-generic" class="sel"	onclick="this.blur();" onkeypress="this.onclick();">'.'Abilit&agrave; generiche'.'</a>';
	$BODY.='<a href="javascript:mostraLEP(\'knowledge\');"		id="typemenu-knowledge" 			onclick="this.blur();" onkeypress="this.onclick();">'.'Conoscenze'.'</a>';
	$BODY.='<a href="javascript:mostraLEP(\'perform\');"		id="typemenu-perform" 				onclick="this.blur();" onkeypress="this.onclick();">'.'Intrattenere'.'</a>';
	$BODY.='<a href="javascript:mostraLEP(\'craft\');"			id="typemenu-craft" 				onclick="this.blur();" onkeypress="this.onclick();">'.'Artigianato'.'</a>';
	$BODY.='<a href="javascript:mostraLEP(\'profession\');"		id="typemenu-profession" 			onclick="this.blur();" onkeypress="this.onclick();">'.'Professione'.'</a>';
	$BODY.='<a href="javascript:mostraLEP(\'speakLanguages\');"	id="typemenu-speakLanguages"		onclick="this.blur();" onkeypress="this.onclick();">'.'Parlare Linguaggi'.'</a>';
	
	// fine tab gruppi abilità
	
	$BODY.='</div></td>';
	$BODY.='</tr>';
	$BODY.='<tr valign="top">';
	$BODY.='<td class="noPadding" id="livelli">';
	
	// inizio tab livelli
	
	for($i=0,$LEP=1;$i<count($multiclasse);$i++,$LEP++){
		$BODY.='<a href="javascript:mostraLEP('.$LEP.');" id="lepmenu-'.$LEP.'" onclick="this.blur();" onkeypress="this.onclick();">'.$LEP.'. '.$multiclasse[$i][short].'</a>';
	}
	$BODY.='<a href="javascript:mostraTotale();" id="lepmenu-0" class="sel" onclick="this.blur();" onkeypress="this.onclick();">'.'TOTALE'.'</a>';
	
	// fine tab livelli
	
	$BODY.='</td><td>';
		
	$colonne=array();
	foreach($skills_output AS $key=>$value){
		$col=0;
		$i=0;
		foreach($value as $skill){
			if($i<count($value)/$quanteColonne*1){
				$col=0;
			}else if($i<count($value)/$quanteColonne*2){
				$col=1;
			}else if($i<count($value)/$quanteColonne*3){
				$col=2;
			}else{
				$col=3;
			}
			$colonne[$key][$col][]=$skill[id];
			$i++;
		}
	}
	
	// ciclo livelli
	
	$total_ranks_per_skill=array();
	$total_pa_per_skill=array();
	$only_available_skills_unsorted=array();
	
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
		
		$BODY.='<div id="lep-'.$LEP.'" style="display:none;">';
		
		// inizio pa e cap
		
		$BODY.='<table border="0" cellpadding="0" cellspacing="0">';
		$BODY.='<tr>';
			$BODY.='<td class="thNum'.($pa_disponibili<0?' pa_error':'').'">';
			$BODY.='<span id="pa-disp-'.$LEP.'">'.$pa_disponibili.'</span>/<span id="pa-tot-'.$LEP.'">'.$pa_totale.'</span>';
			$BODY.='<script>pa_disp['.$LEP.']='.$pa_disponibili.';pa_tot['.$LEP.']='.$pa_totale.';</script>';
			$BODY.='</td>';
			$BODY.='<td'.($pa_disponibili<0?' class="pa_error"':'').'>';
			$BODY.='Punti Abilit&agrave;<br>disponibili a questo livello';
			$BODY.='</td>';
			$BODY.='<td class="thNum" id="pa-ccap-'.$LEP.'">';
			$BODY.=''.$cap.'';
			$BODY.='</td>';
			$BODY.='<td>';
			$BODY.='Grado massimo per<br>Abilit&agrave; di Classe';
			$BODY.='</td>';
			$BODY.='<td class="thNum" id="pa-icap-'.$LEP.'">';
			$BODY.=''.($cap/2).'';
			$BODY.='</td>';
			$BODY.='<td>';
			$BODY.='Grado massimo per<br>Abilit&agrave; di Classe incrociata';
			$BODY.='</td>';
		$BODY.='</tr>';
		$BODY.='</table>';
		
		// fine pa e cap
		
		foreach($skills_output AS $group_name=>$group_skills){
			$BODY.='<div id="group-'.$LEP.'-'.$group_name.'" style="display:'.($LEP==1&&$group_name=='generic'?'block':'none').';">';
			$BODY.='<table border="0" cellpadding="0" cellspacing="0">';
			for($i=0;$i<count($colonne[$group_name][0]);$i++){
				$BODY.='<tr>';
				for($c=0;$c<$quanteColonne;$c++){
					
					// inizio abilità singola
					
					if(isset($colonne[$group_name][$c][$i])){
						$k=$skills_output[$group_name][$colonne[$group_name][$c][$i]];
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
						
						if($LEP==count($multiclasse)){
							if($hasRanks||!$strain)$only_available_skills_unsorted[]=$k;
						}
						
						if($total_ranks_per_skill[$skill_id]>$cap/($isClassSkill?1:2)){
							$class1='maxe';
							$class2='mine';
						}else{
							if($hasRanks||!$strain){
								$class1='maxc';
								$class2='minc';
							}else{
								$class1='maxi';
								$class2='mini';
							}
						}
						
						$BODY.='<td id="cell-'.$LEP.'-'.$skill_id.'-0" class="'.$class1.'">';
						$BODY.='<a href="javascript:;" class="plus" onclick="p('.$skill_id.','.$LEP.')" onkeypress="p('.$skill_id.','.$LEP.')">+</a>';
						$BODY.='<a href="javascript:;" class="minus" onclick="m('.$skill_id.','.$LEP.')" onkeypress="m('.$skill_id.','.$LEP.')">&minus;</a>';
						$BODY.='</td>';
						$BODY.='<td id="cell-'.$LEP.'-'.$skill_id.'-1" class="'.$class1.'">';
						$BODY.='<div id="ranks-'.$LEP.'-'.$skill_id.'" class="bigSkill formElement input-text">'.$ranks_current_level.'</div>';
						$BODY.='<input type="hidden" id="pa-'.$LEP.'-'.$skill_id.'" class="formElement input-hidden" name="pa['.$LEP.'-'.$skill_id.']" value="'.$pa_current_level.'"'.($pa_current_level==0?' disabled':'').'>';
						$BODY.='</td>';
						$BODY.='<td id="cell-'.$LEP.'-'.$skill_id.'-2" class="'.$class2.'">';
						if($isClassSkill){
							$BODY.='<span class="skillName diClasse" title="Abilit&agrave; di classe">';
						}else{
							$BODY.='<span class="skillName" title="Abilit&agrave; di classe incrociata">';
						}
						$BODY.=($group_name=='generic')?$sname:$ssub;
						$BODY.='</span>';
						$BODY.='<br>';
						$BODY.=$iability!=0?'<div class="partial">'.sign($total_ranks_per_skill[$skill_id]).'</div>':'';
						$BODY.='<span class="simb">';
						$BODY.=$iability!=0?$lability:'';
						$BODY.=$sarmor>0?' <span title="Penalit&agrave; di armatura alla prova" class="armorPenality">&#x0398;</span> ':'';
						$BODY.=$sarmor>1?' <span title="Penalit&agrave; di armatura alla prova" class="armorPenality">&#x0398;</span> ':'';
						$BODY.=$strain?' <span title="Richiede addestramento" class="needTraining">&#x2261;</span> ':'';
						$BODY.=($group_name=='generic')?' <em>'.$ssub.'</em> ':'&nbsp;';
						$BODY.='</span>';
						$BODY.='</td>';
						$BODY.='<td>&nbsp;</td>';
					}else{
						$BODY.='<td>&nbsp;</td>';
						$BODY.='<td>&nbsp;</td>';
						$BODY.='<td>&nbsp;</td>';
						$BODY.='<td>&nbsp;</td>';
					}
					
					// fine abilità singola
					
				}
				$BODY.='</tr>';
				$BODY.='<tr><td colspan="'.($quanteColonne*4).'" class="fs4">&nbsp;</td></tr>';	
			}
			$BODY.='</table>';
			$BODY.='</div>';
		}
		$BODY.='</div>';
	}
	
	$i=0;$zebra=0;
	$BODY.='<div id="lep-0">';
	$BODY.='<div id="group-0-generic">';
	$BODY.='<table border="0" cellpadding="5" cellspacing="0">';
	$BODY.='<tr>';
	$BODY.='<th>Abilit&agrave;</th>';
	$BODY.='<th>Gradi</th>';
	$BODY.='<th>Caratt.</th>';
	$BODY.='<th>Vari.</th>';
	$BODY.='<th>Totale</th>';
	$BODY.='<th>Abilit&agrave;</th>';
	$BODY.='<th>Gradi</th>';
	$BODY.='<th>Caratt.</th>';
	$BODY.='<th>Vari.</th>';
	$BODY.='<th>Totale</th>';
	$BODY.='</tr>';
	
	// ordino alfabeticamente $skills
	
	$only_available_skills=array();
	$nomi=array();
	foreach($skills AS $oasu)$nomi[]=strtolower($oasu[name].$oasu[subtype]);
	sort($nomi);
	foreach($nomi AS $n){
		foreach($skills AS $i=>$oasu){
			if($n==strtolower($oasu[name].$oasu[subtype])){
				$only_available_skills[]=$oasu;
//					unset($only_available_skills_unsorted[$i]);
				break;
			}
		}
	}
	
	
	//formatto $skills per l'output in tabella
	$colonne=2;
	
	$quanteSkill=count($only_available_skills);
	
	$table=array();
	$righe=ceil($quanteSkill/$colonne);
	/*
	// se leggo in orizzontale:
	for($r=0;$r<$righe;$r++){
		for($c=0;$c<$colonne;$c++){
			$k=$r*$colonne+$c;
			if(isset($only_available_skills[$k])){
				$table[$r][$c]=$only_available_skills[$k];
			}
		}
	}
	*/
	// se leggo in verticale:
	foreach($only_available_skills AS $k=>$oas){
		$c=floor($k/$righe);
		$r=$k-$righe*$c;
		$table[$r][$c]=$oas;
	}
	
	$syn_special=array();
	for($r=0;$r<count($table);$r++){
		$BODY.='<tr class="'.($r%2==0?'dispari':'pari').'" align="right">';
		for($c=0;$c<$colonne;$c++){
			if(isset($table[$r][$c])){
				
				$skill=$table[$r][$c];
				$id=$skill[id];
				
				$hasRanks=$total_ranks_per_skill[$id]>=1;
				$needTraining=$skill[train];
				$class=$hasRanks||!$needTraining?'':' class="unavailable" title="Non disponibile perch&egrave; non ha gradi"';
				
				$mod=($skill[ability_id]==0)?0:$mod=$A[mod][$caratteristiche[$skill[ability_id]][code]];
				$ranks=$total_ranks_per_skill[$id];
				$syn=0;
				if(isset($synergy[$id])){
					foreach($synergy[$id] AS $s){
						if($total_ranks_per_skill[$s[id]]>=5){
							if($s[special]==""){
								$syn+=2;
							}else{
								$syn_special[$s[id]]="+2 alle prove di ".$skill[name]." in caso di: ".$s[special];
							}
						}
					}
				}
				
				$raz=$racial[$skill[id]][special]==""?$racial[$skill[id]][bonus]:0;
				// taglia piccola = +4 Nascondersi
				$size=($id==18&&$R[size_id]==3)?4:0;
				
				$BODY.='<td align="left"><span'.$class.'>';
				$BODY.=$skill[name];
				if($skill[subtype]!="")$BODY.=' ('.$skill[subtype].')';
				$BODY.='</span>';
				$BODY.=$skill[armor]>0?' <span title="Penalit&agrave; di armatura alla prova" style="color:#c00000;cursor:help;">&#x0398;</span> ':'';
				$BODY.=$skill[armor]>1?' <span title="Penalit&agrave; di armatura alla prova" style="color:#c00000;cursor:help;">&#x0398;</span> ':'';
				$BODY.=$skill[train]?' <span title="Richiede addestramento" style="color:#00f;cursor:help;">&#x2261;</span> ':'';
				$BODY.='</td>';
				$BODY.='<td id="ranks-total-'.$id.'">';
				$BODY.=$ranks;
				$BODY.='</td>';
				$BODY.='<td>';
				$BODY.=$mod;
				$BODY.='</td>';
				$BODY.='<td id="vari-total-'.$id.'">';
				$BODY.=$syn+$raz+$size;
				$BODY.='</td>';
				$BODY.='<td id="total-total-'.$id.'">';
				$BODY.=floor($mod+$ranks+$syn+$raz+$size);
				$BODY.='</td>';
			}else{
				$BODY.='<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
			}
		}
		
		$BODY.='</tr>';
	}
	
	$BODY.='</table>';
	
	$BODY.='<div id="raz_special" style="margin:1em 0;">';
	$BODY.="<strong>Bonus raziali condizionali:</strong><br />";
	$i=0;
	foreach($racial AS $k=>$v){
		if($v[special]!=""){
			$BODY.='<div id="raz-'.$k.'">';
			$BODY.=($v[bonus]>0?'+':'').$v[bonus];
			$BODY.=' alle prove di ';
			$BODY.=$skills[$v[id]][name];
			$BODY.=' in caso di: ';
			$BODY.=$v[special];
			$BODY.='</div>';
			$i++;
		}
	}
	if($i==0){
		$BODY.='<div id="syn-none">Nessuno</div>';
	}
	$BODY.='</div>';
	
	$BODY.='<div id="syn_special" style="margin:0 0 1em 0;">';
	$BODY.="<strong>Bonus sinergia condizionali:</strong><br />";
	if(count($syn_special)>0){
		foreach($syn_special AS $k=>$v){
			$BODY.='<div id="syn-'.$k.'">'.$v.'</div>';
		}
	}else{
		$BODY.='<div id="syn-none">Nessuno</div>';
	}
	$BODY.='</div>';
	
	$BODY.='</div>';
	$BODY.='</div>';

	$BODY.='</td></tr></table>';
	
	$BODY.='<br><div style="font-size:11px;color:#666;">';
	$BODY.='<table border="0" cellpadding="0" cellspacing="0"><tr valign="top">';
	$BODY.='<td style="font-size:11px;color:#666;"><strong>Legenda</strong></td>';
	$BODY.='<td style="font-size:11px;color:#666;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
	$BODY.='<td style="font-size:11px;color:#666;">';
	$BODY.='<span style="color:#c00000;">&#x0398;</span> Penalit&agrave; di armatura alla prova<br>';
	$BODY.='<span style="color:#00f;">&#x2261;</span> Richiede addestramento<br>';
	$BODY.='</td>';
	$BODY.='<td style="font-size:11px;color:#666;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
	$BODY.='<td style="font-size:11px;color:#666;">';
	$BODY.='Le abilit&agrave; in <strong>GRASSETTO MAIUSCOLO</strong> sono abilit&agrave; di classe.<br>';
	$BODY.='Il personaggio non pu&ograve; usare le abilit&agrave; <span style="text-decoration:line-through;">sbarrate</span> finch&egrave; non acquistano almeno 1 grado.<br>';
	$BODY.='</td>';
	$BODY.='</tr></table></div>';
	
	$BODY.='<br><input type="button" class="btn" value="'.$_LANG[back].'" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="'.$_LANG[save].'"><br>';
		
}else{
	$BODY.="Nessuna classe";
	$BODY.='<br><input type="button" class="btn" value="'.$_LANG[back].'" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();">';
}

$BODY.='</form><br>';

$smarty->assign('buttons',$BUTTONS);
?>
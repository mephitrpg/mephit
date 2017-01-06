<?php

function BAB($tipo,$livello){
	switch($tipo){
		case"alto":		return $livello;							break;
		case"medio":	return $livello-1-floor(($livello-1)/4);	break;
		case"basso":	return floor($livello/2);					break;
	}		
}
function TS($tipo,$livello){
	switch($tipo){
		case"alto":		return floor($livello/2)+2;	break;
		case"basso":	return floor($livello/3);	break;
	}		
}

$abilita=$P->getAbilitiesPerLevel();
$classi=$P->getClass();
$gradi=$P->getRanksPerLevel();
$talenti=$P->getFeat();
$multiclasse=$P->getMulticlass();


		
		

$BAB=array();
for($i=0,$liv=1;$i<count($classi);$i++,$liv++){
	$BAB[$liv]=isset($BAB[$i])?$BAB[$i]:array();
	$currClassId=$classi[$i][id];
	$currClassBab=$classi[$i][bab];
	foreach($multiclasse as $id=>$value){
		if($id==$currClassId){
			if(isset($BAB[$liv][$currClassId])){
				$BAB[$liv][$currClassId][liv]++;
			}else{
				$BAB[$liv][$currClassId]=array("liv"=>1);
			}
			$BAB[$liv][$currClassId][bab]=BAB($currClassBab,$BAB[$liv][$currClassId][liv]);
		}
	}
}
foreach($BAB as $liv=>$B){
	$tot=0;
	foreach($B as $b)$tot+=$b[bab];
	$BAB[$liv]=$tot;
}

$query="SELECT id,name_".$_MEPHIT[lang]." FROM srd35_skill WHERE psionic=0";
$result=mysql_query($query);
$skills_ids=array();
$skills_eng=array();
while($row=mysql_fetch_assoc($result)){
	$skills_ids[]=$row[id];
	$skills_eng[]=$row[name_en];
}

$query="SELECT * FROM srd35_feat ORDER BY type_".$_MEPHIT[lang].",name_".$_MEPHIT[lang];
$result=mysql_query($query);
$feats=array();
$feats_js=array();
$feats_ids=array();
$feats_eng=array();
while($row=mysql_fetch_assoc($result)){
	$feats[$row['type_'.$_MEPHIT[lang]]][$row[id]]=array(
		"id"=>$row[id],
		"name"=>$row['name_'.$_MEPHIT[lang]],
		"prerequisite"=>$row['prerequisite_'.$_MEPHIT[lang]],
		"pre"=>$row[prerequisite],
		"choice"=>$row[choice],
	);
	$feats_js[$row[id]]=array(
		"pre"=>$row[prerequisite],
		"choice"=>$row[choice],
	);
	$feats_ids[]=$row[id];
	$feats_eng[]=$row[name_en];
}

$talentiPerLivello=array();
foreach($classi as $i=>$c){
	$l=$i+1;
	if(isset($talentiPerLivello[$i]))$talentiPerLivello[$l]=$talentiPerLivello[$i];
	else $talentiPerLivello[$l]=array();
	foreach($talenti as $t){
		if($t[level]==$l){
			$talentiPerLivello[$l][]=array("id"=>$t[id],"name"=>$t[name]);
			$feats_liv[$l][]=array("id"=>$t[id],"name"=>$t[name]);
		}
	}
}
$BODY.='<script>'."\n"
.'var a='.json_encode($abilita)."\n"
.'var f='.json_encode($feats_js)."\n"
.'var sIDs='.json_encode($skills_ids)."\n"
.'var sEng='.json_encode($skills_eng)."\n"
.'var fIDs='.json_encode($feats_ids)."\n"
.'var fEng='.json_encode($feats_eng)."\n"
.'var BAB='.json_encode($BAB)."\n"
.'var spl='.json_encode($gradi)."\n"
.'var fpl={}'."\n"
.'var fl={}'."\n"
.'</script>'."\n\n";

$BODY.='<form id="form-dndtool" action="personaggi_save.php" method="post">';
$BODY.='<input type="hidden" name="what" value="talenti">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';

$BODY.='
Per acquisire un talento trascinalo sul livello desiderato<br />
<br />
<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
';

$BODY.='<td width="48%">';


$BODY.='<table border="0" cellpadding="0" cellspacing="0" style="border:1px solid #c00000;"><tr valign="top"><td style="background:#c00000;" nowrap>';

$i=0;
foreach($feats as $group=>$fts){
	$BODY.='<a class="gruppoDiTalenti" href="javascript:selTab('.$i.');" onfocus="this.blur();">'.$group.'</a>';
	$i++;
}

$BODY.='</td><td>';

foreach($feats as $group=>$fts){
	$BODY.='<div class="listaDiTalenti" style="display:none;"><div class="listaDiTalentiScroll">';
	foreach($fts as $f){
		$BODY.='<div>';
		$BODY.='<a href="javascript:;" class="talento f'.$f[id].'">'.$f[name].'</a>';
		if(!is_null($f[prerequisite])){
			$BODY.=' ';
			$BODY.='<em>'.$f[prerequisite].'</em>';
		}
		$BODY.='</div>';
//		$BODY.='<br />';
	}
	$BODY.='</div></div>';
}

$BODY.='</td></tr></table>';


$BODY.='</td><td width="4%"></td><td width="48%">';

$BODY.='<ol id="talentiAcquisiti">';
foreach($classi as $i=>$c){
	$BODY.='<li id="livello_'.($i+1).'" class="livello">';
		$BODY.='<div><strong>'.$c[name].'</strong></div>';
	$BODY.='</li>';
}
$BODY.='</ol>';

$BODY.='</td>';

$BODY.='</tr></table>';

$BODY.='
<style>
EM{color:#999;}
.gruppoDiTalenti{display:block;color:#fff;text-decoration:none;padding:4px;}
.gruppoDiTalenti.sel{background:#fff;color:#c00000;}
.listaDiTalenti{padding:4px;}
.listaDiTalentiScroll{overflow:auto;height:356px;}
.over{background:#ffff00;}
.nomeTalento{cursor:move;}

.okPre{color:#080;}
.koPre{color:#f00;}
.boPre{color:#f80;}
</style>
<script>
function selTab(q){
	var i=0,gruppi=$$(".gruppoDiTalenti");
	$$(".listaDiTalenti").each(function(DIV){
		if(i==q){
			DIV.show();
			gruppi[i].addClassName("sel");
		}else{
			DIV.hide();
			gruppi[i].removeClassName("sel");
		}
		i++;
	});
}
selTab(0);

var dragOrigin;
$$(".listaDiTalenti").each(function(DIV){
	DIV.select("A").each(function(A){
		
		new Draggable(A,{
			revert:true,
			onStart:function(drgObj,mouseEvent){
				dragOrigin=drgObj.element.up("div");
				$$("BODY")[0].insert({top:drgObj.element})
				drgObj.element.style.position="absolute"
				drgObj.offset=[0,0]
			},
			onEnd:function(drgObj,mouseEvent) {
				dragOrigin.insert({top:drgObj.element.remove()})
				drgObj.element.style.position="static"
			} 
		});
	});
});

var re=[
	{	key:"ability",			reg:/^[a-z]{3} [0-9]+$/i					},
	{	key:"bab",				reg:/^base attack bonus \+[0-9]+$/i			},
	{	key:"skill",			reg:/^[a-z\s]+ [0-9]+ ranks{0,1}$/i				},
	{	key:"characterlev",		reg:/^character level [0-9]+[stndr]{2}$/i	},
	{	key:"casterlev",		reg:/^caster level [0-9]+[stndr]{2}$/i		},
	{	key:"manifesterlev",	reg:/^manifester level [0-9]+[stndr]{2}$/i	}
]

function checkPre(feat_id,LEP){
	var pre=f[feat_id].pre;
	if(pre==null)return "yes";
	
	if(pre.charAt(pre.length-1)==".")pre=pre.substr(0,pre.length-1);
	pre=pre.split(", ");
	var owned=[],tipo;
	pre.each(function(p){
		var result,index;
		tipo="";
		
		for(var i=0;i<re.length;i++){
			if(re[i].reg.test(p)){
				tipo=re[i].key;
				break;
			}
		}
		
		if(tipo==""){
			var i=fEng.indexOf(p);
			if(i!=-1){tipo="feat";index=i;}
		}
		
		switch(tipo){
			case"ability":
				result="no";
				var x=p.split(" ");
				var min=x[1]*1;
				var sigla=x[0].toLowerCase();
				var punteggio=a[LEP].score["_"+sigla];
				if(punteggio>=min)result="yes";
			break;
			case"characterlev":
				result="maybe";
			break;
			case"casterlev":
				result="maybe";
			break;
			case"manifesterlev":
				result="maybe";
			break;
			case"bab":
				var min=p.split(" ").last()*1;
				result=BAB[LEP]>=min?"yes":"no";
			break;
			case"skill":
				var x=p.split(" ");
				var min=x[x.length-2]*1;
				var sName=p.split(" "+min+" ")[0];
				var sId=sIDs[sEng.indexOf(sName)];
				result=spl[LEP][sId]>=min?"yes":"no";
			break;
			case"feat":
				var result="no";
				var pre_id=fIDs[index];
				var livCurrent=Object.values(fpl[LEP]);
				for(var i=0;i<livCurrent.length;i++){
					var fCurrent=livCurrent[i];
					if(fCurrent.id==pre_id){
						result="yes";
						break;
					}
				}
			break;
			default:
				result="maybe";
			break;
		}
		owned.push(result);
		if(result=="no")throw $break;
	});
		
	
	if(owned.indexOf("no")!=-1)return "no";
	if(owned.indexOf("maybe")!=-1)return "maybe";
	return "yes";
}

function checkPreAll(){
	for(liv in fl){if(!isNaN(liv)){
		for(var i=0;i<fl[liv].length;i++){
			var id=fl[liv][i].id;
			setPreClass(
				$$("#livello_"+liv+" .feat-"+id)[0],
				checkPre(id,liv)
			);
		}
	}}
}

function setPreClass(element,what){
	element=$(element);
	switch(what){
		case"maybe":var preClass="boPre";break;
		case"yes":var preClass="okPre";break;
		case"no":var preClass="koPre";break;
	}
	element.removeClassName("okPre").removeClassName("koPre").removeClassName("boPre").addClassName(preClass);
	return element;
}

var quantiLivelli='.count($classi).';

function aggiungiTalento(feat_id,LEP,feat_name,feat_prerequisite,relation_id,feat_choice){
	if(fl==null)fl={}
	if(typeof fl[LEP]=="undefined")fl[LEP]=[];

	relation_id=relation_id!=""?relation_id:new Date().getTime();
	var input=new Element("input",{
		type:"hidden",
		name:"level["+LEP+"][]",
		value:feat_id+","+relation_id
	});
	
	fl[LEP].push({id:feat_id,name:feat_name,relation:relation_id,choice:feat_choice});
	
	if(fpl==null)fpl={}
	for(var liv=LEP;liv<=quantiLivelli;liv++){
		if(typeof fpl[liv]=="undefined")fpl[liv]=[];
		fpl[liv].push({id:feat_id,name:feat_name,relation:relation_id,choice:feat_choice});
	}
	
	var adel=new Element("a",{href:"javascript:;"}).update("&times;");
	var aname=new Element("span",{title:feat_prerequisite,className:"feat-"+feat_id+" nomeTalento"}).update(feat_name);
	var div=new Element("div",{id:"rel-"+relation_id,className:"talentoAssegnato"});
	div.insert(adel).insert("&nbsp;").insert(aname).insert(input);
	
	var choice=f[feat_id].choice;
	if(choice!=null){
		var loadingSelect=new Element("span",{className:"loadingSelect"}).update(" <em>Loading...</em>");
		div.insert(loadingSelect);
		var SELECT=new Element("select",{
			name:"choice["+relation_id+"]"
		});
		new Ajax.Request("feat_choice.php",{
			parameters:{what:choice,time:new Date().getTime()},
			onSuccess:function(transport){
				var o=transport.responseText.evalJSON();
				var i=0,selIndex=0;
				o[0][1].each(function(item){
					var opt=new Option();
					opt.value=o[0][0]+","+item[0];
					opt.text=item[1];
					SELECT.options[SELECT.options.length]=opt;
					if(item[0]==feat_choice)selIndex=i;
					i++;
				});
				loadingSelect.replace(SELECT);
				SELECT.options.selectedIndex=selIndex;
			}
		});
	}
	
	$("livello_"+LEP).insert(div);
	adel.observe("click",function(event){
		eliminaTalento(feat_id,LEP,event.element().up(".talentoAssegnato"));
		checkPreAll();
	});
	new Draggable("rel-"+relation_id,{
		revert:true,
		handle:"nomeTalento"
	});
}

function eliminaTalento(feat_id,LEP,element){
	for(var i in fl[LEP]){
		if(fl[LEP][i].id==feat_id){
			fl[LEP].splice(i,1);
			break;
		}
	}
	for(var liv=LEP;liv<=quantiLivelli;liv++){
		for(var i=0;i<fpl[liv].length;i++){
			if(fpl[liv][i].id==feat_id){
				fpl[liv].splice(i,1);
			}
		}
	}
	element.remove();
}

$$(".livello").each(function(LI){
	Droppables.add(LI.identify(),{
		hoverclass:"over",
		onDrop:function(dragged,dropped){
			var LEP=dropped.id.match(/\d+/)[0]*1;
			if(dragged.hasClassName("talentoAssegnato")){
				// move
				
				var feat_id=dragged.select(".nomeTalento")[0].className.match(/\d+/)[0]*1;
				var feat_listed=$$(".f"+feat_id)[0];
				var LEP_old=dragged.up(".livello").id.match(/\d+/)[0]*1;
				dragOrigin=feat_listed.up("div");
				var relation=dragged.id.split("-").last();
				var s=dragged.down("select");
				var choice=s?$F(s).split(",").last():"";
				eliminaTalento(feat_id,LEP_old,dragged);
				var feat_name=feat_listed.innerHTML;
				
				var n=dragOrigin.down("em");
				var d=n?n.innerHTML:"";
				aggiungiTalento(feat_id,LEP,feat_name,d,relation,choice);
				
				/*
				var INPUT=dragged.down("input");
				INPUT.name=INPUT.name.replace(/\d+/,LEP);
				
				var LEP_old=dragged.up(".livello").id.match(/\d+/)[0]*1;
				
				var o,count=0;
				dropped.insert(dragged.remove());
				for(i in fl[LEP_old]){
					if(fl[LEP_old][i].relation==relation){
						o=fl[LEP_old][i];
						delete fl[LEP_old][i];
					}else{
						count++;
					}
				}
				if(count==0)delete fl[LEP_old];
				if(typeof fl[LEP]=="undefined")fl[LEP]=[];
				fl[LEP].push(o);
				*/
			}else{
				// new
				var feat_id=dragged.className.match(/\d+/)[0]*1;
				var feat_name=dragged.innerHTML;
				var relation="";
				var choice="";
				
				var n=dragOrigin.down("em");
				var d=n?n.innerHTML:"";
				aggiungiTalento(feat_id,LEP,feat_name,d,relation,choice);
			}
			checkPreAll();
		}
	});
});

';

foreach($talenti as $t){
	$BODY.='aggiungiTalento('.$t[id].','.$t[level].',"'.addslashes($t[name]).'","'.addslashes($t[prerequisite]).'",'.$t[relation_id].',"'.$t[choice_done].'");';
}
$BODY.='checkPreAll();';
$BODY.='</script>';

$BODY.='<br><input type="button" class="btn" value="Indietro" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="Salva">';

$BODY.='</form>';

$smarty->assign('buttons',$BUTTONS);
?>
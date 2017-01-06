<?php
global $bySlot;
$bySlot=array();

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
function disponibiliPerSlot($q){
	$t=array();
	$allSlots=array_keys($GLOBALS[bySlot]);
	$availableSlots=array();
	$instances=array();
	foreach($allSlots as $all){
		$out=explode("|",$all);
		foreach($out as $expression){
			if(is_numeric($expression)){
				// n
				if($expression==$q){
					foreach($GLOBALS[bySlot][$expression] as $item){
						$id=$item[type].$item[id];
						$poss=$item[possession_id];
						$instances[$id][$poss]=true;
						$t[$poss]='';
						$t[$poss].='<option value="'.$item[possession_id].'" title="'.$poss.'" class="'.$id.'"';
						if($item[slot_equipped]!=0)$t[$poss].=' selected';
						$t[$poss].='>';
						$t[$poss].=htmlspecialchars($item["name_".$GLOBALS[_MEPHIT][lang]])."";
						$t[$poss].='</option>';
					}
				}
			}else if(strpos($expression,"&")!==false){
				// n&n()[]{}
				if(
						strpos($expression,"{")!==false
					||	strpos($expression,"(")!==false
					||	strpos($expression,"[")!==false
				){
					// n&n()[]{}
					
				}else{
					// n&n
					$slots=explode("&",$expression);
					if(in_array($q,$slots)){
						foreach($GLOBALS[bySlot][$expression] as $item){
							$id=$item[type].$item[id];
  							$poss=$item[possession_id];
							$instances[$id][$poss]=true;
							$t[$poss]='';
							$t[$poss].='<option value="'.$item[possession_id].'" title="'.$poss.'" class="'.$id.'"';
							if($item[slot_equipped]!=0)$t[$poss].=' selected';
							$t[$poss].='>';
							$t[$poss].=htmlspecialchars($item["name_".$GLOBALS[_MEPHIT][lang]])."";
							$t[$poss].='</option>';
						}
					}
				}
			}else{
				// n()[]{}
				if(
						strpos($expression,"{")!==false
					||	strpos($expression,"(")!==false
					||	strpos($expression,"[")!==false
				){
					// n()[]{}
					
				}/*else{
					// n
					
				}*/
			}
		}
	}
	if(isset($GLOBALS[bySlot][$q])){
		foreach($GLOBALS[bySlot][$q] as $item){
			$id=$item[type].$item[id];
			$poss=$item[possession_id];
			$instances[$id][$poss]=true;
			$t[$poss]='';
			$t[$poss].='<option value="'.$item[possession_id].'" title="'.$poss.'" class="'.$id.'"';
			if($item[slot_equipped]!=0)$t[$poss].=' selected';
			$t[$poss].='>';
			$t[$poss].=htmlspecialchars($item["name_".$GLOBALS[_MEPHIT][lang]])."";
			$t[$poss].='</option>';
		}
	}
	return implode("",$t);
}

$BODY.='<script src="js/jPrototype.js"></script>';
$BODY.='<script src="js/jMouse.js"></script>';

$BODY.='<script>var connections={};';
$query="
	SELECT *
	FROM mephit_personaggio_equip AS p
	JOIN srd35_equipment AS e ON fk_item=id
	WHERE fk_personaggio=".$_GET[id]."
	AND p.type=''
	ORDER BY name_".$_MEPHIT[lang]."
";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	while($row=mysql_fetch_assoc($result)){
		$slots=whichSlots($row);
		$connected=true;
		foreach($slots as $slot){
			if(is_numeric($slot)){$connected=false;break;}
		}
		foreach($slots as $slot){
			$i=count($bySlot[$slot]);
			$bySlot[$slot][$i]=$row;
			if($connected){
				$slotti=explode("&",$slot);
				if(count($slotti)>1){
					$BODY.="connections['item-".$row[id]."']=[".implode(",",$slotti)."];";
				}
			}
		}
	}
}
$query="
	SELECT *
	FROM mephit_personaggio_equip AS p
	JOIN srd35_item AS e ON p.fk_item=id
	WHERE fk_personaggio=".$_GET[id]."
	AND p.type='w'
	ORDER BY name_".$_MEPHIT[lang]."
";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	if($row[fk_weapon]!=0)$ref=$row[fk_weapon];
	else if($row[fk_armor]!=0)$ref=$row[fk_armor];
	else if($row[fk_shield]!=0)$ref=$row[fk_shield];
	else $ref=$row[fk_item];
	if($ref==0){
		$slots=whichSlots($row);
		$connected=true;
		foreach($slots as $slot){
			if(is_numeric($slot)){$connected=false;break;}
		}
		foreach($slots as $slot){
			$i=count($bySlot[$slot]);
			$bySlot[$slot][$i]=$row;
			if($connected){
				$slotti=explode("&",$slot);
				if(count($slotti)>1){
					$BODY.="connections['item-"."w".$row[id]."']=[".implode(",",$slotti)."];";
				}
			}
		}
	}else{
		$query2="SELECT * FROM srd35_equipment WHERE id=".$ref;
		$result2=mysql_query($query2);
		while($row2=mysql_fetch_assoc($result2)){
			$slots=whichSlots($row2);
			$connected=true;
			foreach($slots as $slot){
				if(is_numeric($slot)){$connected=false;break;}
			}
			foreach($slots as $slot){
				$i=count($bySlot[$slot]);
				$bySlot[$slot][$i]=$row;
				$bySlot[$slot][$i][referenceItem]=$row2;
				if($connected){
					$slotti=explode("&",$slot);
					if(count($slotti)>1){
						$BODY.="connections['item-"."w".$row[id]."']=[".implode(",",$slotti)."];";
					}
				}
			}
		}
	}
}
$BODY.='</script>';

//xmp($bySlot);

$BODY.='<form id="form-dndtool" action="personaggi_save.php" method="post">';
$BODY.='<input type="hidden" name="what" value="combattimento">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';
$BODY.='
<style>
#equipGraphic IMG{width:118px;height:250px;}
#gliSlot .occupiedSlot{background:#c00000;color:#fff;}
#gliSlot SELECT{width:100px;}
</style>

<table border="0" cellpadding="0" cellspacing="0"><tr valign="top"><td>
	<table border=0 cellpadding=0 cellspacing=4 id="gliSlot">
		<tr>
			<td colspan="3">
			
				<table border=0 cellpadding=0 cellspacing=4 width="100%">
					<tr>
						<td width=25% align="center">Testa<br />
							<select name="slot-1" id="slot-1" onChange="toggleEquip(this.name,$F(this));">
							<option></option>';
							$BODY.=disponibiliPerSlot(1);
						$BODY.='</select></td>
						<td width=25% align="center">Collo<br />
							<select name="slot-2" id="slot-2" onChange="toggleEquip(this.name,$F(this));">
							<option></option>';
							$BODY.=disponibiliPerSlot(2);
						$BODY.='</select></td>
						<td width=25% align="center">Torso<br />
							<select name="slot-3" id="slot-3" onChange="toggleEquip(this.name,$F(this));">
							<option></option>';
						$BODY.=disponibiliPerSlot(3);
						$BODY.='</select></td>
						<td width=25% align="center">Vita<br />
							<select name="slot-4" id="slot-4" onChange="toggleEquip(this.name,$F(this));">
							<option></option>';
						$BODY.=disponibiliPerSlot(4);
						$BODY.='</select></td>
					</tr>
				</table>
			
			</td>
		</tr>
		<tr>
			<td align="right">Occhio destro<br />
				<select name="slot-5" id="slot-5" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(5);
			$BODY.='</select></td>
			
			<td rowspan=6 width="118" height="300" style="background:#fff;padding:20px;" valign="top" id="equipGraphic">
				
				<div class="absolute mantello"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/mantello_back_0.png"></div>
				<div class="absolute mantello on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/mantello_back_1.png"></div>
				
				<div class="absolute slot-16"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/stivalisx_0.png"></div>
				<div class="absolute slot-16 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/stivalisx_1.png"></div>
				<div class="absolute slot-15"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/stivalidx_0.png"></div>
				<div class="absolute slot-15 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/stivalidx_1.png"></div>
				
				<div class="absolute body"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/body.png"></div>
				
				<div class="absolute slot-9"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/braccialidx_0.png"></div>
				<div class="absolute slot-9 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/braccialidx_1.png"></div>
				<div class="absolute slot-10"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/braccialisx_0.png"></div>
				<div class="absolute slot-10 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/braccialisx_1.png"></div>
				
				<div class="absolute slot-18"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/tunica_0.png"></div>
				<div class="absolute slot-18 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/tunica_1.png"></div>
				
				<div class="absolute slot-4"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/cintura_0.png"></div>
				<div class="absolute slot-4 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/cintura_1.png"></div>
				
				<div class="absolute slot-3"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/veste_0.png"></div>
				<div class="absolute slot-3 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/veste_1.png"></div>
				
				<div class="absolute head"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/head.png"></div>
				
				<div class="absolute slot-1"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/elmo_0.png"></div>
				<div class="absolute slot-1 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/elmo_1.png"></div>
				
				<div class="absolute slot-5"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/lentidx_0.png"></div>
				<div class="absolute slot-5 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/lentidx_1.png"></div>
				<div class="absolute slot-6"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/lentisx_0.png"></div>
				<div class="absolute slot-6 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/lentisx_1.png"></div>
				
				<div class="absolute slot-7"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/mantellodx_front_0.png"></div>
				<div class="absolute slot-7 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/mantellodx_front_1.png"></div>
				<div class="absolute slot-8"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/mantellosx_front_0.png"></div>
				<div class="absolute slot-8 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/mantellosx_front_1.png"></div>
				
				<div class="absolute slot-2"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/amuleto_0.png"></div>
				<div class="absolute slot-2 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/amuleto_1.png"></div>
				
				<div class="absolute slot-11"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/guantidx_0.png"></div>
				<div class="absolute slot-11 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/guantidx_1.png"></div>
				<div class="absolute slot-12"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/guantisx_0.png"></div>
				<div class="absolute slot-12 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/guantisx_1.png"></div>
				
				<div class="absolute slot-14"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/anellosx_0.png"></div>
				<div class="absolute slot-14 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/anellosx_1.png"></div>
				<div class="absolute slot-13"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/anellodx_0.png"></div>
				<div class="absolute slot-13 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/anellodx_1.png"></div>
				
				<div class="absolute slot-19"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/manosx_0.png"></div>
				<div class="absolute slot-19 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/manosx_1.png"></div>
				<div class="absolute slot-17"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/manodx_0.png"></div>
				<div class="absolute slot-17 on" style="display:none;"><img src="themes/'.$_COOKIE[mephit_theme].'/images/dressroom/manodx_1.png"></div>
				
			</td>
	
			<td>Occhio sinistro<br />
				<select name="slot-6" id="slot-6" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(6);
			$BODY.='</select></td>
		</tr>
		<tr>
			<td align="right">Spalla destra<br />
				<select name="slot-7" id="slot-7" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(7);
			$BODY.='</select></td>
			<td>Spalla sinistra<br />
				<select name="slot-8" id="slot-8" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(8);
			$BODY.='</select></td>
		</tr>
		<tr>
			<td align="right">Polso destro<br />
				<select name="slot-9" id="slot-9" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(9);
			$BODY.='</select></td>
			<td>Polso sinistro<br />
				<select name="slot-10" id="slot-10" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(10);
			$BODY.='</select></td>
		</tr>
		<tr>
			<td align="right">Mano destra<br />
				<select name="slot-11" id="slot-11" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(11);
			$BODY.='</select></td>
			<td>Mano sinistra<br />
				<select name="slot-12" id="slot-12" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(12);
			$BODY.='</select></td>
		</tr>
		<tr>
			<td align="right">Dito destro<br />
				<select name="slot-13" id="slot-13" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(13);
			$BODY.='</select></td>
			<td>Dito sinistro<br />
				<select name="slot-14" id="slot-14" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(14);
			$BODY.='</select></td>
		</tr>
		<tr>
			<td align="right">Gamba destra<br />
				<select name="slot-15" id="slot-15" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(15);
			$BODY.='</select></td>
			<td>Gamba sinistra<br />
				<select name="slot-16" id="slot-16" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(16);
			$BODY.='</select></td>
		</tr>
		<tr>
			<td align="right">Mano primaria<br />
				<select name="slot-17" id="slot-17" onChange="toggleEquip(this.name,$F(this));">
				<option></option>';
				$BODY.=disponibiliPerSlot(17);
			$BODY.='</option>
			</select></td>
			<td align="center">Armatura<br />
				<select name="slot-18" id="slot-18" onChange="toggleEquip(this.name,$F(this));addToArmor(this);">
				<option></option>';
				$BODY.=disponibiliPerSlot(18);
			$BODY.='</select></td>
			<td>Mano secondaria<br />
				<select name="slot-19" id="slot-19" onChange="toggleEquip(this.name,$F(this));">
				<option></option>
				<option value="2mani">- usa due mani -</option>
        ';
				$BODY.=disponibiliPerSlot(19);
			$BODY.='</select></td>
		</tr>
			
	</table>
<script>
function addToArmor(s){
/*
	id=s.options[s.options.selectedIndex].className;
	if(id==97)$("ca").update($("ca").innerHTML*1+4);
	else $("ca").update($("ca").innerHTML*1-4);
*/
}

var sel = $$("#form-dndtool SELECT");
sel.each(function(s){
	s.tooltip("ajaxItemTooltip.php",{
		ajax:true,
		parameters_callback:[
			{
				func:function(){
					var s=$(arguments[0][0]);
					var sIndex=s.options.selectedIndex;
					var id=s.select("option")[sIndex].className;
					if(id==""){
						jTooltip.hide();
						return false;
					}
					return {
						key:"what",
						value:id
					}
				},
				args:[s.identify()]
			}
		]
	});
	
	s.observe("change",function(event){
		
		var q=$(this);
		if(q.options.selectedIndex==0)q.removeClassName("occupiedSlot");
		else q.addClassName("occupiedSlot");
		
		var item_id=$F(q);
		console.log(connections["item-"+item_id])
		if(typeof connections["item-"+item_id]!="undefined"){
			connections["item-"+item_id].each(function(c){
				if("slot-"+c!=s.id){
					var otherSlot=$("slot-"+c);
					for(var i=0;i<otherSlot.options.length;i++){
						if(otherSlot.options[i].value==item_id){
							otherSlot.options.selectedIndex=i;
							otherSlot.addClassName("occupiedSlot");
							toggleEquip(otherSlot.name,$F(otherSlot));
							break;
						}
					}
				}
			});
		}else{
			var otherSlot=false;
			switch(s.id){
				case"slot-5":case"slot-7":case"slot-9":case"slot-11":case"slot-13":case"slot-15":
					var otherId=s.id.split("-");
					otherId=otherId[0]+"-"+(otherId[1]*1+1);
					otherSlot=$(otherId);
				break;
				case"slot-6":case"slot-8":case"slot-10":case"slot-12":case"slot-14":case"slot-16":
					var otherId=s.id.split("-");
					otherId=otherId[0]+"-"+(otherId[1]*1-1);
					otherSlot=$(otherId);
				break;
				case"slot-17":
					otherSlot=$("slot-19");
				break;
				case"slot-19":
					otherSlot=$("slot-17");
				break;
			}
			if(otherSlot){
				if(typeof connections["item-"+$F(otherSlot)]!="undefined"){
					otherSlot.options.selectedIndex=0;
					otherSlot.removeClassName("occupiedSlot");
					toggleEquip(otherSlot.name,$F(otherSlot));
				}
			}
		}
	});
	
	document.observe("dom:loaded",function(){
		if(s.options.selectedIndex!=0){
			s.onchange();
			s.className="occupiedSlot";
		}
	});
	
});

function toggleEquip(slot,item){
	var images=$$("#equipGraphic div");
	for(var i=0;i<images.length;i++){
		var img=images[i];
		if(img.hasClassName(slot)){
			if(item==""){
				img.style.display = (img.className.indexOf(" on")!=-1) ? "none" : "block" ;
			}else{
				img.style.display = (img.className.indexOf(" on")!=-1) ? "block" : "none" ;
			}
			/*
			if(slot=="manosx"||slot=="manodx"){
				var other = slot == "manosx" ? "manodx" : "manosx" ;
				var otherSelector=$("form-dndtool").elements[other];
				var otherItem=otherSelector.options[otherSelector.options.selectedIndex].value;
				if(item=="2h"&&otherItem!="2h"){
					otherSelector.options.selectedIndex=2;
					otherSelector.onchange();
				}
				if(item!="2h"&&otherItem=="2h"){
					otherSelector.options.selectedIndex=0;
					otherSelector.onchange();
				}
				if(item==otherItem){
					otherSelector.options.selectedIndex=0;
					otherSelector.onchange();
        }
			}
			*/
		}
	}
}
</script>
';
$BODY.='</td><td width="10"></td><td>';

$BODY.='<script>
var bab='.$P->getBAB().';
var tem='.$P->getFOR().';
var rif='.$P->getREF().';
var vol='.$P->getWIL().';
var _for='.M($P->row[personaggio][_for]).';
var _des='.M($P->row[personaggio][_des]).';
var _cos='.M($P->row[personaggio][_cos]).';
var _int='.M($P->row[personaggio][_int]).';
var _sag='.M($P->row[personaggio][_sag]).';
var _car='.M($P->row[personaggio][_car]).';
var taglia='.M($P->row[personaggio][taglia]).';

var t="";

t+="Attacco in mischia: <span id=\"mischia_tpc\">"+(bab+_for)+"</span><br>";
t+="Danni in mischia: <span id=\"mischia_dmg\">"+(tem+_cos)+"</span><br>";
t+="<br>";
t+="Attacco a distanza: <span id=\"distanza_tpc\">"+(bab+_des)+"</span><br>";
t+="Danni a distanza: <span id=\"distanza_dmg\">"+(tem+_cos)+"</span><br>";
t+="<br>";
t+="Classe armatura: <span id=\"ca\">"+(10+_des)+"</span><br>";
t+="<br>";
t+="Tiro salvezza tempra: <span id=\"tempra\">"+(tem+_cos)+"</span><br>";
t+="Tiro salvezza riflessi: <span id=\"riflessi\">"+(rif+_des)+"</span><br>";
t+="Tiro salvezza volont&agrave;: <span id=\"volonta\">"+(vol+_sag)+"</span><br>";
t+="<br>";
t+="Lottare: <span id=\"lottare\">"+(bab+_des)+"</span><br>";
t+="<br>";

document.write(t);
</script>';

$BODY.='';


$BODY.='</td></tr></table>';
$BODY.='<br><input type="button" class="btn" value="Indietro" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="Salva">';

$BODY.='</form>';

$smarty->assign('buttons',$BUTTONS);
?>
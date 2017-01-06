<?php

$query="SELECT * FROM srd35_ability";
$result=mysql_query($query);
$ability=array();
while($row=mysql_fetch_assoc($result)){
	$ability[$row[id]]=array(
		"id"=>$row[id],
		"name"=>$row["name_".$_MEPHIT[lang]],
		"short"=>$row["short_".$_MEPHIT[lang]],
		"code"=>$row["code"],
	);
}

$BODY.='<style>
.lbl,.ability,.modifier,.mephit,.race,.level,.eta,.total{text-align:right;height:1.35em;line-height:1.35em;}
.lbl,.ability{}
	 .ability{cursor:move;}
INPUT.ability{background:none;cursor:text;border:1px solid #ccc;}

UL.noStyle{list-style:none;margin:0;padding:0;}

.tabella TD{border-bottom:0;padding:0;}
.tabella .borderBottom{border-bottom:1px solid #ccc;padding:0 6px;}
.tabella .borderTopSep		{border-top:	1px solid #666;}
.tabella .borderBottomSep	{border-bottom:	1px solid #666;}
.tabella .borderLeftSep		{border-left:	1px solid #666;}
.tabella .borderRightSep	{border-right:	1px solid #666;}

</style>';

$BODY.='<form id="form-dndtool" action="personaggi_save.php" method="post" style="display:none;">';
$BODY.='<input type="hidden" name="what" value="caratteristiche">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';

$c=$P->getAbility();
$C=$P->getAbilityTotal();
$r=$P->getRace();
$abi=$P->getAbilityIncrement();

$ra=array($r[_str],$r[_dex],$r[_con],$r[_int],$r[_wis],$r[_cha]);
foreach($ra AS $k=>$v){
	$ra[$k]=!is_numeric($v)?0:$v;
}
$al=array(0,0,0,0,0,0);
foreach($abi AS $k=>$v){
	$al[$v[id]-1]+=$v[bonus];
}
$ae=array(0,0,0,0,0,0);

$query="SELECT * FROM mephit_personaggio_caratteristica_m WHERE fk_personaggio=".$_GET[id];
$result=mysql_query($query);
$mephit=array();
$mephit_caratt=array();
foreach($ability as $v)$mephit_caratt[$v[code]]=0;
while($row=mysql_fetch_array($result)){
	$cm=$ability[$row[fk_caratteristica_m]][code];
	$cp=$ability[$row[fk_caratteristica_p]][code];
	$mephit_caratt[$cm]-=2;
	$mephit_caratt[$cp]+=1;
	$mephit[]=array($row[fk_caratteristica_m],$row[fk_caratteristica_p]);
}

$BODY.='<script>document.observe("dom:loaded",function(){';
if(count($mephit)>0){
	foreach($mephit as $row){
		$BODY.="aggiornaMephit(".$row[0].",".$row[1].");";
	}
}
$BODY.='$("form-dndtool").show();';
$BODY.='});</script>';

$BODY.='<table border="0" cellpadding="0" cellspacing="0" width="100%">';
$BODY.='<tr valign="top">';
$BODY.='<td width="40%">';

$BODY.='<table border="0" cellpadding="0" cellspacing="0" class="tabella">';
$BODY.='<tr>';
$BODY.='<th>Caratt.</th>';
$BODY.='<th>Dadi *</th>';
if($P->row[personaggio][metodo]=="mephit"){
	$BODY.='<th>Mephit</th>';
}
$BODY.='<th>Razza</th>';
$BODY.='<th>Et&agrave;</th>';
$BODY.='<th>Liv.</th>';
$BODY.='<th class="borderTopSep borderLeftSep">Punt.</th>';
$BODY.='<th class="borderTopSep borderRightSep">Mod.</th>';
$BODY.='</tr>';
$BODY.='<tr valign="top">';
	$BODY.='<td>';
		$i=0;
		foreach($c[score] as $k=>$a){
			$BODY.='<div class="lbl borderBottom '.($i%2?"pari":"dispari").'">'.$_LANG[$k].'</div>';
			$i++;
		}
	$BODY.='</td>';
	$BODY.='<td>';
		$i=0;
		if($P->row[personaggio][metodo]=="free"){
			foreach($c[score] as $k=>$a){
				$BODY.='<div class="borderBottom '.($i%2?"pari":"dispari").'"><input id="_'.$k.'" name="ability[]'.$k.'" value="'.$a.'" class="ability" size="4" style="border:0;"></div>';
				$i++;
			}
		}else{
			$BODY.='<ul class="noStyle" id="ability_sortable">';
			foreach($c[score] as $k=>$a){
				$BODY.='<li id="ability_sortable_'.$i.'" class="ability borderBottom '.($i%2?"pari":"dispari").'">';
				$BODY.='<span class="ability-score">'.$a.'</span>';
				$BODY.='<input id="_'.$k.'" name="ability[]'.$k.'" value="'.$a.'" type="hidden">';
				$BODY.='</li>';
				$i++;
			}
			$BODY.='</ul>';
		}
	$BODY.='</td>';
	if($P->row[personaggio][metodo]=="mephit"){
		$BODY.='<td><div id="ability_mephit">';
			$i=0;
			foreach($mephit_caratt as $k=>$a){
				$BODY.='<div id="ability_mephit_'.$i.'" class="mephit borderBottom '.($i%2?"pari":"dispari").'">'.sign(0).'</div>';
				$i++;
			}
		$BODY.='</div></td>';
	}
	$BODY.='<td><div id="ability_race">';
		$i=0;
		foreach($ra as $k=>$a){
			$BODY.='<div id="ability_race_'.$i.'" class="race borderBottom '.($i%2?"pari":"dispari").'">'.sign($a).'</div>';
			$i++;
		}
	$BODY.='</div></td>';
	$BODY.='<td><div id="ability_eta">';
		$i=0;
		foreach($ae as $k=>$a){
			$BODY.='<div id="ability_eta_'.$i.'" class="eta borderBottom '.($i%2?"pari":"dispari").'">'.sign($a).'</div>';
			$i++;
		}
	$BODY.='</div></td>';
	$BODY.='<td><div id="ability_level">';
		$i=0;
		foreach($al as $k=>$a){
			$BODY.='<div id="ability_level_'.$i.'" class="level borderBottom '.($i%2?"pari":"dispari").'">'.sign($a).'</div>';
			$i++;
		}
	$BODY.='</div></td>';
	$BODY.='<td class="borderLeftSep borderBottomSep"><div id="ability_tot">';
		$i=0;
		foreach($C[score] as $k=>$a){
			$BODY.='<div id="ability_tot_'.$i.'" class="total borderBottom '.($i%2?"pari":"dispari").'">'.$a.'</div>';
			$i++;
		}
	$BODY.='</div></td>';
	$BODY.='<td class="borderRightSep borderBottomSep"><div id="ability_mod">';
		$i=0;
		foreach($C[mod] as $k=>$m){
			$BODY.='<div id="ability_mod_'.$i.'" class="modifier borderBottom '.($i%2?"pari":"dispari").'">'.sign($m).'</div>';
			$i++;
		}
	$BODY.='</div></td>';
$BODY.='</tr>';
$BODY.='</table>';

$BODY.='
<script>
	var ar=['.implode(",",$ra).'];
	var al=['.implode(",",$al).'];
	function sign(x){
		return String(x<0?x:"+"+x);
	}
	function M(x){
		x=Math.floor((x-10)/2);
		return x<0?x:"+"+x;
	}
</script>
';
if($P->row[personaggio][metodo]!="free"){
	$BODY.='<em>* Puoi trascinare i risultati</em>';
	$BODY.='<script>
	function updateScores(){
		var at=$("ability_tot").childElements();
		var am=$("ability_mod").childElements();
		var i=0;
		$("ability_sortable").childElements().each(function(e){
			if(i%2){
				e.removeClassName("dispari").addClassName("pari");
			}else{
				e.removeClassName("pari").addClassName("dispari");
			}
			var x=e.down(".ability-score").innerHTML*1+ar[i]+al[i]+$("ability_mephit_"+i).innerHTML*1+$("ability_eta_"+i).innerHTML*1;
			at[i].update(x);
			am[i].update(M(x));
			i++;
		});
	}
	Sortable.create("ability_sortable",{
		onChange:function(element){
			updateScores();
		}
	});
	</script>';
}else{
	$BODY.='<em>* Puoi scrivere i punteggi</em> &nbsp;&nbsp;&nbsp;&nbsp; Totale punti usati: <span id="usedPointsTotal"></span>
	<script>
	var usedPointsTotal=0;
	function updateUsedPointsTotal(){
		usedPointsTotal=0;
		$$(".ability").each(function(input){
			usedPointsTotal+=input.value*1;
		});
		$("usedPointsTotal").innerHTML=usedPointsTotal;
	}
	function updateScores(){
		var at=$("ability_tot").childElements();
		var am=$("ability_mod").childElements();
		var i=0;
		$$(".ability").each(function(e){
			var x=e.value*1+ar[i]+al[i]+$("ability_eta_"+i).innerHTML*1;
			at[i].update(x);
			am[i].update(M(x));
			i++;
		});
	}
	$$(".ability").each(function(input){
		input.observe("change",function(){
			updateUsedPointsTotal();
			updateScores();
		});
	});
	updateUsedPointsTotal();
	updateScores();
	</script>
	';
}

$BODY.='</td>';
$BODY.='<td width="20%">';

$BODY.='<script>
function aggiorna(q){
	var TABLE=$("carAtLev");
	var allSelected=true;
	var valori={}
	TABLE.select("SELECT").each(function(s){
		allSelected=$F(s)!=""&&allSelected;
		valori[s.className]=$F(s);
	});
	if(!allSelected){
		alert("ERRORE: selezionare tutti i campi");
		return false;
	}
	var tmp=TABLE.down(".caratteristica").options;
	valori.caratteristica_nome=tmp[tmp.selectedIndex].text;
	
	var levels=[];
	var TRs=TABLE.select(".riga")
	TRs.each(function(TR){
		var TD=TR.down("TD");
		levels.push(TD.innerHTML*1);
	});
	if(levels.length>0){
		var l=$F(TABLE.down(".livello"))*1;
		var index=levels.indexOf(l);
		if(index!=-1){
			TRs[index].remove();
			var input=$("lcb-"+l);
			var k=input.value.split("|")[1]-1;
			var b=input.value.split("|")[2]*1;
			var a=$("ability_level_"+k);
			var x=a.innerHTML*1-b;
			a.update(sign(x));
			al[k]=x;
			input.remove();
		}
	}
	TABLE.insert(
		"<tr class=\"riga\">"
		+"<td align=\"right\">"+valori.livello+"</td>"
		+"<td>"+valori.caratteristica_nome+"</td>"
		+"<td align=\"right\">"+valori.bonus+"</td>"
		+"<td align=\"center\"><a href=\"javascript:;\" onclick=\"elimina(this);\" onkeypress=\"this.onclick();\">&times;</a></td>"
		+"</tr>"
	);
	$("form-dndtool").insert(new Element("input",{
		id:"lcb-"+valori.livello,
		name:"lcb[]",
		type:"hidden",
		value:valori.livello+"|"+valori.caratteristica+"|"+valori.bonus*1
	}));
	
	// riordina
	TRs=TABLE.select(".riga");
	levels.push(valori.livello);
	levels.uniq().sort(function(a,b){return a-b}).each(function(v,k){
		for(var i=0;i<TRs.length;i++){
			if(TRs[i].down("TD").innerHTML*1==v){
				TABLE.insert(TRs[i].remove());
				break;
			}
		}
	});
	
	// aggiorna tabella generale
	var k=valori.caratteristica-1;
	var a=$("ability_level_"+k);
	var x=a.innerHTML*1+valori.bonus*1;
	a.update(sign(x));
	al[k]=x;
	updateScores();
}

function aggiornaMephit(){
	var TABLE=$("mephitHouseRule");
	var valori={}
	if(arguments.length==0){
		var allSelected=true;
		TABLE.select("SELECT").each(function(s){
			allSelected=$F(s)!=""&&allSelected;
			valori[s.className]=$F(s);
		});
		if(!allSelected){
			alert("ERRORE: selezionare tutti i campi");
			return false;
		}
		var tmp=TABLE.down(".menodue").options;
		valori.menodue_nome=tmp[tmp.selectedIndex].text;
		valori.menodue_value=tmp[tmp.selectedIndex].value;
		var tmp=TABLE.down(".piuuno").options;
		valori.piuuno_nome=tmp[tmp.selectedIndex].text;
		valori.piuuno_value=tmp[tmp.selectedIndex].value;
	}else{
		var tmp=TABLE.down(".menodue").options;
		valori.menodue_nome=tmp[arguments[0]].text;
		valori.menodue_value=tmp[arguments[0]].value;
		var tmp=TABLE.down(".piuuno").options;
		valori.piuuno_nome=tmp[arguments[1]].text;
		valori.piuuno_value=tmp[arguments[1]].value;
	}
	
	TABLE.insert(
		"<tr class=\"riga\">"
		+"<td>"+valori.menodue_nome+"</td>"
		+"<td>"+valori.piuuno_nome+"</td>"
		+"<td align=\"center\"><a href=\"javascript:;\" onclick=\"eliminaMephit(this);\" onkeypress=\"this.onclick();\">&times;</a></td>"
		+"</tr>"
	);
	
	$("form-dndtool").insert(new Element("input",{
		className:"mhr",	//mephit home rule
		name:"mhr[]",
		type:"hidden",
		value:valori.menodue_value+"|"+valori.piuuno_value
	}));
	
	// aggiorna tabella generale
	var m=valori.menodue_value-1;
	var p=valori.piuuno_value-1;
	
	var divm=$("ability_mephit_"+m);
	var divp=$("ability_mephit_"+p);
	divm.update(sign(divm.innerHTML*1-2));
	divp.update(sign(divp.innerHTML*1+1));
	
	updateScores();
}

function elimina(q){
	var TR=$(q).up("TR");
	var l=TR.down("TD").innerHTML*1;
	var input=$("lcb-"+l);
	var k=input.value.split("|")[1]*1-1;
	var b=input.value.split("|")[2]*1;
	input.remove();
	TR.remove();
	var a=$("ability_level_"+k);
	var x=a.innerHTML*1-b;
	a.update(sign(x));
	al[k]=x;
	updateScores();
}

function eliminaMephit(q){
	var TR=$(q).up("TR");
	var found=false;
	$$("#mephitHouseRule .riga").each(function(v,k){
		if(TR==v)i=k;
	});
	var input=$$(".mhr")[i];

	var m=input.value.split("|")[0]*1-1;
	var p=input.value.split("|")[1]*1-1;
	
	input.remove();
	TR.remove();
	
	// aggiorna tabella generale
	var divm=$("ability_mephit_"+m);
	var divp=$("ability_mephit_"+p);
	divm.update(sign(divm.innerHTML*1+2));
	divp.update(sign(divp.innerHTML*1-1));
	
	updateScores();
}
</script>';

$BODY.='<table border="1" cellpadding="6" cellspacing="0" id="carAtLev">';
$BODY.='<tr>';
$BODY.='<th>Livello</th>';
$BODY.='<th>Caratt</th>';
$BODY.='<th>Bonus</th>';
$BODY.='<th>&nbsp;</th>';
$BODY.='</tr>';
$BODY.='<tr>';
$BODY.='<th><select name="livello[]" class="livello" style="text-align:right;">';
$BODY.='<option value="">-</option>';
for($i=1;$i<=20;$i++){
	$BODY.='<option>'.$i.'</option>';
}
$BODY.='</select></th>';
$BODY.='<th><select name="caratteristica[]" class="caratteristica">';
$BODY.='<option value="">-</option>';
foreach($ability as $v){
	$BODY.='<option value="'.$v[id].'">'.$v[short].'</option>';
}
$BODY.='</select></th>';
$BODY.='<th><select name="bonus[]" class="bonus" style="text-align:right;">';

						$BODY.='<option value="" selected>-</option>';
for($i=1;$i<=10;$i++)	$BODY.='<option>+'.$i.'</option>';
//for($i=10;$i>0;$i--)	$BODY.='<option>+'.$i.'</option>';
//for($i=-1;$i>=-10;$i--)	$BODY.='<option>'.$i.'</option>';

$BODY.='</select></th>';
$BODY.='<th align="center">';
$BODY.='<input type="button" value="+" class="btn" onclick="aggiorna();" onkeypress="this.onclick();">';
$BODY.='</th>';
$BODY.='</tr>';

foreach($abi AS $ai){
	$BODY.='<tr class="riga">';
	$BODY.='<td align="right">'.$ai[level].'</td>';
	$BODY.='<td>'.$ai[short].'</td>';
	$BODY.='<td align="right">'.sign($ai[bonus]).'</td>';
	$BODY.='<td align="center"><a href="javascript:;" onclick="elimina(this);" onkeypress="this.onclick();">&times;</a></td>';
	$BODY.='</tr>';
}

$BODY.='</table>';


$BODY.='</td>';
$BODY.='<td width="20%">';

if($P->row[personaggio][metodo]=="mephit"){

$BODY.='<table border="1" cellpadding="6" cellspacing="0" id="mephitHouseRule">';
$BODY.='<tr>';
$BODY.='<th>Penalit&agrave; -2</th>';
$BODY.='<th>Bonus +1</th>';
$BODY.='<th>&nbsp;</th>';
$BODY.='</tr>';
$BODY.='<tr>';
$BODY.='<th><select name="menodue[]" class="menodue">';
$BODY.='<option value="">-</option>';
foreach($ability as $v){
	$BODY.='<option value="'.$v[id].'">'.$v[short].'</option>';
}
$BODY.='</select></th>';
$BODY.='<th><select name="piuuno[]" class="piuuno">';
$BODY.='<option value="">-</option>';
foreach($ability as $v){
	$BODY.='<option value="'.$v[id].'">'.$v[short].'</option>';
}
$BODY.='</select></th>';
$BODY.='<th align="center">';
$BODY.='<input type="button" value="+" class="btn" onclick="aggiornaMephit();" onkeypress="this.onclick();">';
$BODY.='</th>';
$BODY.='</tr>';
$BODY.='</table>';

}else{
	$BODY.='&nbsp;';
}

$BODY.='</td>';
$BODY.='</tr>';
$BODY.='</table>';

$BODY.='<br><input type="button" class="btn" value="Indietro" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="Salva">';

foreach($abi AS $ai){
	$BODY.='<input type="hidden" id="lcb-'.$ai[level].'" name="lcb[]" value="'.$ai[level].'|'.$ai[id].'|'.$ai[bonus].'">';
}

$BODY.='</form>';

$smarty->assign('buttons',$BUTTONS);
?>
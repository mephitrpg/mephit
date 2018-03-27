<?php
switch($_MEPHIT[lang]){
	case"it":
		$after=array("","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;","&deg;");
	break;
	case"en":
		$after=array("","st","nd","rd","th","th","th","th","th","th","th","th","th","th","th","th","th","th","th","th","th","st","nd","rd","th","th","th","th","th","th","th");
	break;
}

$BODY.='<style>
#tabellaClasse TD{/*cursor:pointer;*/text-align:center;empty-cells:show;}
#tabellaClasse TD DIV:empty{display: block;height: 1em;}
#tabellaClasse .left{text-align:left;}
#tabellaClasse .right{text-align:right;}
/*
#tabellaClasse TD:hover{background-color:#009cff;color:#fff;}
*/
</style>';
$BODY.='<script>
function facilitatore(cosa,tendina){
	var col=$(tendina).up("TH").previousSiblings().length,val=tendina.value;
	if(val){
		var TRs=document.getElementById("tabellaClasse").getElementsByTagName("TBODY")[0].getElementsByTagName("TR");
		var i=TRs.length;
		while(i--){
			var FIELD=$(TRs[i]).select(".v")[col],level=i+1;
			switch(cosa){
				case"dadoVita":
					FIELD.innerHTML=level+"d"+val;
				break;
				case"puntiAbilita":
					if(i==0){
						FIELD.innerHTML="4*("+val+"+INT)";
					}else{
						FIELD.innerHTML=val+"+INT";
					}
				break;
				case"bab":
					switch(val){
						case"high":		var bab=level;								break;
						case"medium":	var bab=level-1-Math.floor((level-1)/4);	break;
						case"low":		var bab=Math.floor(level/2);				break;
					}
					var quantiAttacchi=Math.ceil(bab/5);
					if(quantiAttacchi==0)quantiAttacchi=1;
					var attacchi=[];
					for(a=0;a<quantiAttacchi;a++)attacchi[a]="+"+(bab-5*a);
					FIELD.innerHTML=attacchi.join("/");
				break;
				case"for":
				case"ref":
				case"wil":
					switch(val){
						case"high":		var ts=Math.floor(level/2)+2;				break;
						case"low":		var ts=Math.floor(level/3);					break;
					}
					FIELD.innerHTML="+"+ts;
				break;
			}
		}
		tendina.selectedIndex=0;
	}
}
document.observe("dom:loaded",function(){
	$("tabellaClasse").observe("click",function(event){
		var clicked=event.target,binded=this;
		if(clicked.tagName.toUpperCase()=="SPAN"){
			var value=clicked.innerHTML;
			clicked.innerHTML=\'<input value="\'+value	+\'">\';
		}
	});
});
</script>';

$BODY.='<br>';

$BODY.='<table border="0" cellpadding="0" cellspacing="0" class="tabella" id="tabellaClasse">';

$BODY.='<thead>';

if($showSpells){
	$BODY.='<tr valign="bottom">';
		$BODY.='<th rowspan="2" id="liv">'."Liv".'</th>';
		$BODY.='<th rowspan="2" id="hd" class="left">'."Dadi Vita".'</th>';
		$BODY.='<th rowspan="2" id="bab" class="left">'."Bonus di<br>attacco base".'</th>';
		$BODY.='<th rowspan="2" id="for">'."Tiro salv.<br>Tempra".'</th>';
		$BODY.='<th rowspan="2" id="ref">'."Tiro salv.<br>Riflessi".'</th>';
		$BODY.='<th rowspan="2" id="wil">'."Tiro salv.<br>Volont&agrave;".'</th>';
		$BODY.='<th rowspan="2" id="sp" class="left">'."Punti<br>abilit&agrave;".'</th>';
		$BODY.='<th rowspan="2" id="special" class="left">'."Speciale".'</th>';
		$BODY.='<th colspan="10">'."Incantesimi al giorno".'</th>';
	$BODY.='</tr>';
	$BODY.='<tr valign="bottom">';
		for($i=0;$i<10;$i++){
			$BODY.='<th>'.$i.$after[$i].'</th>';
		}
	$BODY.='</tr>';
}else{
	$BODY.='<tr valign="bottom">';
		$BODY.='<th id="liv">'."Liv".'</th>';
		$BODY.='<th id="hd" class="left">'."Dadi Vita".'</th>';
		$BODY.='<th id="bab">'."Bonus di<br>attacco base".'</th>';
		$BODY.='<th id="for">'."Tiro salv.<br>Tempra".'</th>';
		$BODY.='<th id="ref">'."Tiro salv.<br>Riflessi".'</th>';
		$BODY.='<th id="wil">'."Tiro salv.<br>Volont&agrave;".'</th>';
		$BODY.='<th id="sp" class="left">'."Punti<br>abilit&agrave;".'</th>';
		$BODY.='<th id="special">'."Speciale".'</th>';
	$BODY.='</tr>';
}

$BODY.='<tr valign="bottom">';
	$BODY.='<th>'."&nbsp;".'</th>';
	$BODY.='<th>'.'<select onchange="facilitatore(\'dadoVita\',this)">
		<option value="0"></option>
		<option value="4">d4</option>
		<option value="6">d6</option>
		<option value="8">d8</option>
		<option value="10">d10</option>
		<option value="12">d12</option>
	</select>'.'</th>';
	$BODY.='<th>'.'<select onchange="facilitatore(\'bab\',this)">
		<option value="0"></option>
		<option value="high">'.$_LANG[high].'</option>
		<option value="medium">'.$_LANG[medium].'</option>
		<option value="low">'.$_LANG[low].'</option>
	</select>'.'</th>';
	$BODY.='<th>'.'<select onchange="facilitatore(\'for\',this)">
		<option value="0"></option>
		<option value="high">'.$_LANG[high].'</option>
		<option value="low">'.$_LANG[low].'</option>
	</select>'.'</th>';
	$BODY.='<th>'.'<select onchange="facilitatore(\'ref\',this)">
		<option value="0"></option>
		<option value="high">'.$_LANG[high].'</option>
		<option value="low">'.$_LANG[low].'</option>
	</select>'.'</th>';
	$BODY.='<th>'.'<select onchange="facilitatore(\'wil\',this)">
		<option value="0"></option>
		<option value="high">'.$_LANG[high].'</option>
		<option value="low">'.$_LANG[low].'</option>
	</select>'.'</th>';
	$BODY.='<th>'.'<select onchange="facilitatore(\'puntiAbilita\',this);">
		<option value="0"></option>
		<option value="2">2+INT</option>
		<option value="4">4+INT</option>
		<option value="6">6+INT</option>
		<option value="8">8+INT</option>
		<option value="10">10+INT</option>
		<option value="12">12+INT</option>
	</select>'.'</th>';
	$BODY.='<th>'."&nbsp;".'</th>';
	if($showSpells){
	$BODY.='<th>'."<button>X</button>".'</th>';
	$BODY.='<th>'."<button>X</button>".'</th>';
	$BODY.='<th>'."<button>X</button>".'</th>';
	$BODY.='<th>'."<button>X</button>".'</th>';
	$BODY.='<th>'."<button>X</button>".'</th>';
	$BODY.='<th>'."<button>X</button>".'</th>';
	$BODY.='<th>'."<button>X</button>".'</th>';
	$BODY.='<th>'."<button>X</button>".'</th>';
	$BODY.='<th>'."<button>X</button>".'</th>';
	$BODY.='<th>'."<button>X</button>".'</th>';
	}
$BODY.='</tr>';

$BODY.='</thead>';
$BODY.='<tbody>';

foreach($classe[livelli] AS $index=>$livello){
	$l=$livello[level];
	$BODY.='<tr class="'.($index%2?'pari':'dispari').'">';
	
	$key="level";
	$value=$livello[$key].$after[$l];
	$BODY.='<td>'.					'<div contentEditable class="v">'.$value.'</div>'.	'</td>';
	
	$key='dv';
	$value=$livello[$key];
	$BODY.='<td class="right">'.	'<div contentEditable class="v">'.$value.'</div>'.	'</td>';
	
	$key="base_attack_bonus";
	$value=$livello[$key];
	$BODY.='<td class="left">'.		'<div contentEditable class="v">'.$value.'</div>'.	'</td>';

	$key="fort_save";
	$value=$livello[$key];
	$BODY.='<td>'.					'<div contentEditable class="v">'.$value.'</div>'.	'</td>';

	$key="ref_save";
	$value=$livello[$key];
	$BODY.='<td>'.					'<div contentEditable class="v">'.$value.'</div>'.	'</td>';
	
	$key="will_save";
	$value=$livello[$key];
	$BODY.='<td>'.					'<div contentEditable class="v">'.$value.'</div>'.	'</td>';
	
	$key="pa";
	$value=$livello[$key];
	$BODY.='<td class="right">'.	'<div contentEditable class="v">'.$value.'</div>'.	'</td>';

	$key="special";
	$value=array();
	foreach ($livello[$key] as $level) {
		$value[] = $level['table_'.$_MEPHIT['lang']];
	}
	$BODY.='<td class="left">'.		'<div contentEditable class="v">'.join(", ", $value).'</div>'.	'</td>';

	if($showSpells){
		for($i=0;$i<10;$i++){
			$key="slots_".$i;
			$value=$livello[$key];
			$BODY.='<td>'.			'<div contentEditable class="v">'.$value.'</div>'.	'</td>';
		}
	}
	$BODY.='</tr>';
}

$BODY.='</tbody>';
$BODY.='</table>';
$BODY.='<div><em style="color:#999;">NOTA: le caselle della tabella possono essere modificate a mano oppure tramite i menu a tendina sotto alle intestazioni</em></div>';
?>
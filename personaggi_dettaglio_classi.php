<?php

$classi=array();
$query="
	SELECT *,c.id AS class_id
	FROM srd35_class AS c
	JOIN srd35_class_level AS l ON c.id=l.fk_classe
	ORDER BY name_".$_MEPHIT["lang"].",level
";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
//	xmp($row);
	$class_id=$row["class_id"];
	if(!isset($classi[$class_id]))$classi[$class_id]=array(
		"id"=>$class_id,
		"name"=>$row["name_".$_MEPHIT["lang"]],
		"type"=>$row["class_type"],
		"ppaa"=>$row["ppaa"],
		"ddvv"=>$row["ddvv"],
		"levels"=>array(),
	);
	$bab=$row["base_attack_bonus"]*1;
	$for=$row["fort_save"]*1;
	$dex=$row["ref_save"]*1;
	$wil=$row["will_save"]*1;
	$classi[$class_id]["levels"][$row["level"]]=array(
		"bab"=>($bab<0?"":"+").$bab,
		"tem"=>($for<0?"":"+").$for,
		"rif"=>($dex<0?"":"+").$dex,
		"vol"=>($wil<0?"":"+").$wil,
		"special"=>$row["special"],
		"slots"=>array(),
		"dv"=>$row["dv"],
		"pa"=>$row["pa"],
	);
	if(is_null($row["caster_level"])){
		for($i=0;$i<10;$i++){
			$classi[$class_id]["levels"][$row["level"]]["slots"][$i]=$row["slots_".$i];
		}
	}else{
		$classi[$class_id]["levels"][$row["level"]]["slots"]=$row["caster_level"];
	}
}

//xmp($classi);

$BODY.='
<style>
.riga{overflow:hidden;width:auto;*width:100%;}
#lista_classi{
	list-style: none;
	margin: 0;
	padding: 0;
	overflow:hidden;width:auto;*width:100%;
}
#lista_classi LI{display:inline;}
#lista_classi A{display:block;padding:0.5em 1em;}
#lista_classi A:hover{background:#ccc;color:#000;}
.lista_classi_label{}
.aggiungi_classe{display:block;float:right;text-decoration:none;margin-left:1em;}
.aggiungi_classe:hover{background-color:#c00000;color:#fff;}

#PG_CLASSI .dispari{background:#F2E4BC;}
#PG_CLASSI .pari{}

#form-dndtool .elimina{padding:0;border-left:0;}
#form-dndtool .elimina A{display:block;*width:100%;padding:0 6px;text-decoration:none}
#form-dndtool .elimina A:hover{background:#c00;color:#fff;}
.highlight{background:#7fbfdf !important;}
.th-height{min-height:39px;}

#PG_classi{
	list-style: none;
	margin: 0 0 0 0;
	padding: 0;
	display:table;
	width:100%;
}
#PG_classi LI{
	display:table-row;
}
#PG_classi .td{
	display:table-cell;
	cursor:move;
	border-bottom:1px solid #ccc;
	vertical-align:middle;
}
.ttip{cursor:help;}
</style>';

$BODY.='<form id="form-dndtool" action="personaggi_save.php" method="post">';
$BODY.='<input type="hidden" name="what" value="classi">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';

$BODY.='<table border="0" cellpadding="0" cellspacing="0"><tr valign="top">';
$BODY.='<td width="220">';

$class_types=array("base","pc","pce","npc");
foreach($class_types as $type){
	$BODY.='<div>';
		$BODY.='<a href="javascript:$PG.addClass($F(\'select_classi_'.$type.'\'));" class="aggiungi_classe">'.$_LANG["add"].'</a>';
		$BODY.='<strong>'.$_LANG["class_type_".$type].'</strong><br>';
		$BODY.='<select id="select_classi_'.$type.'" size="3" style="width:100%">';
		$i=0;
		foreach($classi AS $id=>$C){
			$selected="";
			if($C["type"]==$type){
				if($i==0){$i++;$selected=" selected";}
				$BODY.='<option value="'.$id.'"'.$selected.'>'.$C[name].'</option>';
			}
		}
		$BODY.='</select>';
	$BODY.='</div>';
	$BODY.='<br>';
}
	
$BODY.='</td>';

$BODY.='<td width="10" nowrap></td>';

$BODY.='<td>';
$BODY.='<table border="0" cellpadding="0" cellspacing="0" class="tabella" style="border-right:0;*margin-right:-3px;">
<tr><th>
<div class="th-height" style="text-align:left;vertical-align:middle;display:table-cell">
	LEP. Classe Livello
	<div style="font-weight:normal;font-style:italic;">(trascina per spostare)</div>
</div>
</th></tr>
<tr><td style="padding:0;border-bottom:0;" nowrap><ul id="PG_classi" style="margin:0;padding:0;">';

$BODY.='</ul></td></tr>
';
//$BODY.='<tr><td style="background:#77BFFE;color:#fff;">Totale </td></tr>
//';
$BODY.='<tr><td style="background:#0080C0;color:#fff;" nowrap>Totale</td></tr>
';
$BODY.='</table>';

$BODY.='</td><td>';

$BODY.='
<table border="0" cellpadding="0" cellspacing="0" id="tabella_classi" class="tabella">
<thead>
<tr>
<th rowspan="2" style="border-left:0;"><div class="th-height">&nbsp;</div></th>
<th rowspan="2">DV</th>
<th rowspan="2">BAB</th>
<th colspan="3">Tiri salvezza</th>
<th rowspan="2">PA</th>
<th rowspan="2" class="left">Speciale</th>
<th colspan="10">Incantesimi al giorno</th>
</tr>
<tr>
<th>Tem</th>
<th>Rif</th>
<th>Vol</th>
<th>0</th>
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
<th>5</th>
<th>6</th>
<th>7</th>
<th>8</th>
<th>9</th>
</tr>
</thead>
<tbody id="tibodi">
</tbody>
<tfoot>
';
// style="background:#77BFFE;"
$BODY.='
	<tr align="center">
		<td style="border-left:0;">&nbsp;</td>
		<td><span id="pf">&nbsp;</span></td>
		<td><span id="bab">&nbsp;</span></td>
		<td><span id="tem">&nbsp;</span></td>
		<td><span id="rif">&nbsp;</span></td>
		<td><span id="vol">&nbsp;</span></td>
		<td><span id="pa">&nbsp;</span></td>
		<td>&nbsp;</td>
		<td><span id="slots_0">&nbsp;</span></td>
		<td><span id="slots_1">&nbsp;</span></td>
		<td><span id="slots_2">&nbsp;</span></td>
		<td><span id="slots_3">&nbsp;</span></td>
		<td><span id="slots_4">&nbsp;</span></td>
		<td><span id="slots_5">&nbsp;</span></td>
		<td><span id="slots_6">&nbsp;</span></td>
		<td><span id="slots_7">&nbsp;</span></td>
		<td><span id="slots_8">&nbsp;</span></td>
		<td><span id="slots_9">&nbsp;</span></td>
	</tr>
';
/*$BODY.='
	<tr align="center">
		<td style="border-left:0;">&nbsp;</td>
		<td><span id="dv-tot">&nbsp;</span></td>
		<td><span id="bab-tot">&nbsp;</span></td>
		<td><span id="tem-tot">&nbsp;</span></td>
		<td><span id="rif-tot">&nbsp;</span></td>
		<td><span id="vol-tot">&nbsp;</span></td>
		<td><span id="pa-tot">&nbsp;</span></td>
		<td class="none">&nbsp;</td>
		<td>&nbsp;</td>
		<td><span id="slots_0-tot">&nbsp;</span></td>
		<td><span id="slots_1-tot">&nbsp;</span></td>
		<td><span id="slots_2-tot">&nbsp;</span></td>
		<td><span id="slots_3-tot">&nbsp;</span></td>
		<td><span id="slots_4-tot">&nbsp;</span></td>
		<td><span id="slots_5-tot">&nbsp;</span></td>
		<td><span id="slots_6-tot">&nbsp;</span></td>
		<td><span id="slots_7-tot">&nbsp;</span></td>
		<td><span id="slots_8-tot">&nbsp;</span></td>
		<td><span id="slots_9-tot">&nbsp;</span></td>
	</tr>
';*/
$BODY.='</tfoot>
</table>
';

$BODY.='</td>';

$BODY.='<td width="10" nowrap></td>';

$BODY.='
<td width="200">
	<strong>Totale Parziale</strong><br />
	<em style="color:#ccc;">Passa il mouse sopra la tabella per aggiornare</em><br>
	<br />
	<strong>BAB:</strong> <span id="bab_partial">0</span><br />
	<strong>TS TEM:</strong> <span id="tem_partial">0</span><br />
	<strong>TS RIF:</strong> <span id="rif_partial">0</span><br />
	<strong>TS VOL:</strong> <span id="vol_partial">0</span><br />
	<div  class="none"><strong>PA:</strong> <span id="pa_partial">0</span><br /></div>
	<br />
	<strong>Coming soon:</strong><br />
	<ul style="padding-left:1em;">
		<li>Bonus (MOD caratteristiche, talenti, ...)</li>
		<li>Incantesimi bonus conferiti da un\'alta caratteristica chiave</li>
		<li>Livello dell\'incantatore</li>
		<li>Calcolo degli incantesimi al giorno invece di diciture come "+1 livello incantatore arcano"</li>
		<li>Lista degli incantesimi</li>
		<li>Incantesimi conosciuti</li>
		<li>Verifica dei prerequisiti delle CdP</li>
		<li>Verifica delle EX-classi</li>
		<li>flurry of blows</li>
		<li>bonus CA</li>
		<li>incantesimi bonus</li>
		<li>...</li>
	</ul>
</td>
';
$BODY.='</tr></table>';

$BODY.='<br><input type="button" class="btn" value="Indietro" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="Salva">';

$BODY.='</form>';

$BODY.='<br/>';

$BODY.='
<script src="'.$_MEPHIT[WWW_ROOT].'/js/personaggi_dettaglio_classe.js"></script>
<script>
var availableClasses='.json_encode($classi).';
';
$c=$P->getClass();
foreach($c AS $classe){
	$BODY.='$'.'PG.addClass('.$classe[id].');';
}
$BODY.='
tableRowsHeight("dom");
Event.observe(document.onresize?document:window,"resize",function(){tableRowsHeight("resize");});
</script>';
?>
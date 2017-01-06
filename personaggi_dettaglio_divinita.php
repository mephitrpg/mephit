<?php

$divinita_current='NULL';
$query="SELECT * FROM mephit_personaggio WHERE id_personaggio=".$_GET["id"];
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$smarty->assign('title',$row[nome]);
	$divinita_current=$row[divinita];
	$allineamento_current=$row[allineamento];
	$race=$row[race];
	$domains_current=array($row[domain1],$row[domain2]);
}

$alignment=array();
$query="SELECT * FROM srd35_alignment";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$alignment[$row[id]]=array(
		'name'=>$row['name_'.$_MEPHIT[lang]],
		'name_short'=>$row['name_short_'.$_MEPHIT[lang]],
	);
}

$domini=array();
$query="SELECT * FROM srd35_domain WHERE provenienza='core35' order by name_".$_MEPHIT[lang];
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$domini[$row[id]]=$row["name_".$_MEPHIT[lang]];
}

$divinita=array();
$query="SELECT * FROM mephit_god ORDER BY name";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$divinita[$row[id]]=array(
		'name'=>$row[name],
		'alignment'=>$row[fk_alignment],
		'races'=>array(),
		'domains'=>array(),
	);
}

$query="
SELECT fk_god,race.id,race.name_".$_MEPHIT[lang]." FROM mephit_god_race AS fedeli
JOIN srd35_race AS race ON fedeli.fk_race=race.id
ORDER BY race.name_".$_MEPHIT[lang]."
";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$divinita[$row[fk_god]][races][$row[id]]=$row['name_'.$_MEPHIT[lang]];
}

$query="SELECT * FROM mephit_god_domain";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$divinita[$row[fk_god]][domains][$row[fk_domain]]=$domini[$row[fk_domain]];
}

$BODY.='<script>var divinita=[];';

foreach($divinita AS $id=>$D){
	$BODY.='divinita['.$id.']={';
		$BODY.='name:"'.$D[name].'",';
		$BODY.='alignment:'.$D[alignment].',';
		$BODY.='races:[],';
		$BODY.='domains:[],';
		$BODY.='weapons:[]';
	$BODY.='};';
	foreach($D[races] AS $i=>$r){
		$BODY.='divinita['.$id.'].races.push('.$i.');';
	}
	foreach($D[domains] AS $i=>$d){
		$BODY.='divinita['.$id.'].domains.push('.$i.');';
	}
}
$BODY.='divinita["NULL"]={';
	$BODY.='name:"Nessuna divinit&agrave; o divinit&agrave; non elencata",';
	$BODY.='alignment:"Nessun allineamento",';
	$BODY.='races:[],';
	$BODY.='domains:['.implode(",",array_keys($domini)).'],';
	$BODY.='weapons:[]';
$BODY.='};';


$BODY.='</script>';

$pagPos=array();
if(isset($_GET[pag]))$pagPos[pag]="pag=".$_GET[pag];
if(isset($_GET[orderby]))$pagPos[orderby]="orderby=".$_GET[orderby];
if(count($pagPos)>0){
	$pagPos_personaggio="&".implode("&",$pagPos);
	$pagPos_path="?".implode("&",$pagPos);
}
$PATH='<a href="personaggi.php'.$pagPos_path.'">'.$_LANG["characters"].'</a> &raquo; <a href="personaggi.php?id='.$_GET[id].$pagPos_personaggio.'">'.htmlspecialchars($nome_personaggio)."</a>";
$TAB1='risorse';

$BODY.='
<style>/*
.divinita{
	list-style: none;
	margin-left: 0;
	padding-left: 1em;
	text-indent: -1.6em;
}
.divinita LI{
	float:left;
	width:400px;height:100px;
	border:1px solid #ccc;
	margin-right:1em;
	margin-bottom:1em;
	margin-bottom:1em;
	padding-bottom:1.4em;
	*padding-bottom:0;
}
.divinita A{
	display:block;
	*width:100%;
	padding:1em 2em;
	color:#000;
	text-decoration:none;
}
.domini{
	list-style: none;
	margin: 0;
	padding: 0;
}
.domini LI{
	float:left;
	width:100px;
}*/
.divinita,.domini{
	list-style: none;
	margin: 0;
	padding: 0;
}
.alignmentsCross LABEL{
	display:block;
	padding:1em;
	border:1px solid #ccc;
	text-align:center;
}
#form-dndtool LABEL{display:block;}
#form-dndtool LABEL.itemOver{background:#ccc;cursor:pointer;cursor:hand;}

#form-dndtool LABEL.ok{background-color:#67e067;}
#form-dndtool LABEL.error{background-color:#ff8787;}

#form-dndtool LABEL.available{background-color:#67e067;}
#form-dndtool LABEL.unavailable{background-color:#cccccc;}
#form-dndtool LABEL.warning{background-color:#f78541;}

#form-dndtool LABEL.onestep{background-color:#a6f8a6;}
</style>

<form id="form-dndtool" action="personaggi_save.php" method="post">
<input type="hidden" name="what" value="divinita">
<input type="hidden" name="id" value="'.$_GET[id].'">

<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr valign="top">

<td width="22%">

<table border="0" cellpadding="0" cellspacing="0" class="alignmentsCross">

<strong>Allineamento</strong><br>
<br>

';

$c=3;
for($i=0;$i<count($alignment);$i++){
	$a=$alignment[$i];
	if($i%$c==0)$BODY.='<tr>';
	$BODY.='<td id="cella-allineamento-'.$i.'">';
	$BODY.='<label onclick="selAllineamento(this);" for="allineamento-'.$a[name_short].'">';
	$BODY.=str_replace(' ','<br>',$a[name]).'<br>';
	$BODY.='<input type="radio" name="allineamento" value="'.$i.'" id="allineamento-'.$a[name_short].'"'.(($i==$allineamento_current)?' checked':'').'>';
	$BODY.='</label>';
	$BODY.='</td>';
	if($i%$c==$c-1)$BODY.='</tr>';
}
$BODY.='
</table>

<script>
var allineamenti_onestep=[];
var alignment_current='.$allineamento_current.';

function selAllineamento(LABEL){
	
	// reset
	var LBLS=$$("#form-dndtool .alignmentsCross LABEL");
	LBLS.each(function(L){
		L.removeClassName("ok").removeClassName("onestep").removeClassName("available").removeClassName("error");
		alignment_current=LABEL.down("INPUT").value*1;
	});
	
	// select
	LABEL=$(LABEL);
	LABEL.addClassName("ok");
	
	// select availables
	var check,index=$F(LABEL.down("INPUT"))*1;
	allineamenti_onestep=[];
	
	if(alignment_current!=4){
		
		check=LABEL.up("TD").previous();
		if(check){
			check.down("LABEL").addClassName("onestep");
			allineamenti_onestep.push(check.down("INPUT").value*1)
		}
		check=LABEL.up("TD").next();
		if(check){
			check.down("LABEL").addClassName("onestep");
			allineamenti_onestep.push(check.down("INPUT").value*1)
		}
		check=$("cella-allineamento-"+(index-3));
		if(check){
			check.down("LABEL").addClassName("onestep");
			allineamenti_onestep.push(check.down("INPUT").value*1)
		}
		check=$("cella-allineamento-"+(index+3));
		if(check){
			check.down("LABEL").addClassName("onestep");
			allineamenti_onestep.push(check.down("INPUT").value*1)
		}
		
	}
	
	// ---------------------------------
	
	$$(".divinita LI").each(function(LI){
		var id=LI.down("INPUT").value;
		var LABEL=LI.down("LABEL");
		LABEL.removeClassName("available").removeClassName("unavailable").removeClassName("warning");
		if(id=="NULL"){
			LABEL.addClassName("available");
		}else{
			id*=1;
			var isCompatibleRace;
			if( divinita[id].races.length==0 || divinita[id].races.indexOf(pg_race)!=-1 ){
				isCompatibleRace=true;
			}else{
				isCompatibleRace=false;
			}
			
			if(!isCompatibleRace){
				LABEL.addClassName("unavailable");
			}else{
				var alignStatus="";
				var cDwnLbl=$("cella-allineamento-"+divinita[id].alignment).down("LABEL");
				if(cDwnLbl.hasClassName("ok"))alignStatus="ok";
				else if(cDwnLbl.hasClassName("onestep"))alignStatus="onestep";
				
				if( alignStatus!="onestep" && alignStatus!="ok" ){
					LABEL.addClassName("warning");
				}else{
					LABEL.addClassName("available");
				}
			}
		}
	});
	
	alignment_current	
	
	
	// select deity
	selDivinita($("divinita-"+divinita_current).up("LABEL"));
}
</script>

</td><td width="4%"></td><td width="22%">

<script>
function isBuono(q){return [0,3,6].indexOf(q)!=-1;}
function isMalvagio(q){return [2,5,8].indexOf(q)!=-1;}
function isLegale(q){return [0,1,2].indexOf(q)!=-1;}
function isCaotico(q){return [6,7,8].indexOf(q)!=-1;}

function isCurrentAlignmentCompatibleWithDomain(domain){
	domain*=1;
	switch(domain){
		case 21: return isBuono(alignment_current);
		case 19: return isMalvagio(alignment_current);
		case 24: return isLegale(alignment_current);
		case 15: return isCaotico(alignment_current);
	}
	return true;
}

var pg_race='.$race.';
var divinita_current="'.(is_null($divinita_current)?'NULL':$divinita_current).'";

function selDivinita(LABEL){
	LABEL=$(LABEL);
	var id=LABEL.down("INPUT").value;
	$("god-"+divinita_current+"-description").hide();
	$("god-"+id+"-description").show();
	divinita_current=id;
	
	var domini_concessi=divinita[divinita_current].domains.compact();
	$$(".domini LI").each(function(LI){
		var dominio_id=LI.down("INPUT").value*1;
		LI.down("LABEL").removeClassName("available").removeClassName("warning");
		if(domini_concessi.indexOf(dominio_id)!=-1){
			if(isCurrentAlignmentCompatibleWithDomain(dominio_id)){
				LI.down("LABEL").addClassName("available");
			}else{
				LI.down("LABEL").addClassName("warning");
			}
		}
	});
	
}
</script>

<strong>Divinit&agrave;</strong><br>
<br>

<ul class="divinita">

';

foreach($divinita AS $id=>$D){
	$BODY.='<li title="'.$alignment[$D[alignment]][name].'"><label for="divinita-'.$id.'" onclick="selDivinita(this);">';
	$BODY.='<input type="radio" name="patrono" id="divinita-'.$id.'" value="'.$id.'"';
	if($id==$divinita_current && $divinita_current!='NULL'){
		$BODY.=' checked';
	}
	$BODY.='>';
	$BODY.=$D[name].'<br>';
	/*
	$BODY.=$alignment[$D[alignment]][name].'<br>';
	
	$dd=array();
	foreach($domini_concessi[$id] AS $d)$dd[]=$domini[$d];
	$BODY.=implode(', ',$dd).'<br>';
	
	$BODY.='Arma preferita<br>';
	$BODY.='Fedeli tipici<br>';
	*/
	$BODY.='</label></li>';
}

$BODY.='
	<li><label for="divinita-NULL" onclick="selDivinita(this);"><input type="radio" name="patrono" id="divinita-NULL" value="NULL"'.($divinita_current=='NULL'||is_null($divinita_current)?' checked':'').'>Nessuna divinit&agrave; o divinit&agrave; non elencata</label></li>
	
</ul>

<br>

<label class="unavailable" style="display:inline;padding:0 0.5em;">&nbsp;</label> Non selezionabile per via della razza<br>
<label class="warning" style="display:inline;padding:0 0.5em;">&nbsp;</label> Non selezionabile per via dell\'allineamento<br>
<label class="available" style="display:inline;padding:0 0.5em;">&nbsp;</label> Selezionabile<br>



</td><td width="4%"></td><td width="22%">

<strong>Domini</strong><br>
<br>

<ul class="domini">

';

foreach($domini AS $i=>$d){
	$BODY.='<li class="dominio-'.$i.'"';
	$concessoDa=array();
	foreach($divinita AS $id=>$D){
		if(in_array($i,array_keys($D[domains])))$concessoDa[]=$D[name];
	}
	$BODY.=' title="'.implode(', ',$concessoDa).'"';
	$BODY.='>';
		$BODY.='<label for="dominio-'.$i.'">';
			$BODY.='<input type="checkbox" name="domains[]" id="dominio-'.$i.'" value="'.$i.'"';
			if(in_array($i,$domains_current))$BODY.=' checked';
			$BODY.='>'.$d;
		$BODY.='</label>';
	$BODY.='</li>';
}

$BODY.='<!--
<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-7" value="7"><strong>JUST</strong><br>
	Legale buono, Dio della Giustizia<br>
	Bene,Legge,Guerra<br>
	Spada lunga<br>
	Paladini,guerrieri,monaci<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-10" value="10"><strong>ADWARF</strong><br>
	Legale buono, Dio della Costanza<br>
	Bene,Legge,Protezione,Terra<br>
	Martello da guerra<br>
	Nani<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-17" value="17"><strong>ALING</strong><br>
	Legale buono, Dea dell\'Adattabilit&agrave;<br>
	Bene,Legge,Protezione<br>
	Spada corta<br>
	Halfling<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-2" value="2"><strong>LEAFY</strong><br>
	Neutrale buono, Dea della Natura Rigogliosa<br>
	Animale,Bene,Sole,Vegetale<br>
	Spada lunga<br>
	Elfi,gnomi,mezzelfi,halfling,ranger,druidi<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-5" value="5"><strong>AGNOME</strong><br>
	Neutrale buono, Dio dell\'Ingegno<br>
	Bene,Inganno,Protezione<br>
	Ascia da battaglia<br>
	Gnomi<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-18" value="18"><strong>SAN</strong><br>
	Neutrale buono, Dea della Salute Spirituale<br>
	Bene,Forza,Guarigione,Sole<br>
	Mazza<br>
	Ranger,bardi<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-1" value="1"><strong>ANELF</strong><br>
	Caotico buono, Dio della Vita<br>
	Bene,Caos,Guerra,Protezione<br>
	Spada lunga<br>
	Elfi,mezzelfi,bardi<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-9" value="9"><strong>COMBO</strong><br>
	Caotico buono, Dio della Salute Fisica<br>
	Bene, Caos, Fortuna, Forza<br>
	Spadone<br>
	Guerrieri, barbari, ladri, atleti<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-14" value="14"><strong>MEG</strong><br>
	Legale neutrale, Dea della Salute Mentale<br>
	Legge, Magia, Morte<br>
	Pugnale<br>
	Maghi, necromanti, stregoni<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-15" value="15"><strong>ORG</strong><br>
	Legale neutrale, Dio dell\'Ordine<br>
	Distruzione, Forza, Legge, Protezione<br>
	Mazza<br>
	Guerrieri, monaci, soldati<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-0" value="0"><strong>OBAH</strong><br>
	Neutrale, Dea dell\'Energia<br>
	Conoscenza, Inganno, Magia<br>
	Bastone ferrato<br>
	Maghi, stregoni, saggi<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-4" value="4"><strong>NULL</strong><br>
	Neutrale, Dea del Nulla<br>
	Fortuna, Protezione, Viaggio<br>
	Bastone ferrato<br>
	Bardi, avventurieri, mercanti<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-12" value="12"><strong>ONAI</strong><br>
	Neutrale, Dio degli Elementi<br>
	Acqua, Animale, Aria, Fuoco, Terra, Vegetale<br>
	Bastone ferrato<br>
	Druidi, barbari, ranger<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-13" value="13"><strong>FURT</strong><br>
	Caotico neutrale, Dea dell\'Inganno<br>
	Caos, Fortuna, Inganno<br>
	Stocco<br>
	Ladri, bardi<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-8" value="8"><strong>UNJUST</strong><br>
	Legale malvagio, Dio dell\'Ingiustizia<br>
	Distruzione, Guerra, Legge, Male<br>
	Mazzafrusto<br>
	Guerrieri malvagi, monaci<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-11" value="11"><strong>MORTEM</strong><br>
	Neutrale malvagio, Dio della Malattia<br>
	Inganno, Male, Morte<br>
	Falce<br>
	Necromanti malvagi, ladri<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-16" value="16"><strong>OMIS</strong><br>
	Neutrale malvagio, Dea della Conoscenza<br>
	Conoscenza, Magia, Male<br>
	Pugnale<br>
	Maghi malvagi, stregoni, ladri, spie<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-3" value="3"><strong>CARNEM</strong><br>
	Caotico malvagio, Dio dell\'Incomprensione<br>
	Caos, Guerra, Inganno, Male<br>
	Morning star<br>
	Guerrieri malvagi, barbari, ladri<br>
</a></li>

<li><a href="javascript:;" onclick="$(this).down(\'input\').checked=1;" onkeypress="this.onclick();" class="sensibleLink">
	<input type="radio" name="patrono" id="divinita-6" value="6"><strong>ANORC</strong><br>
	Caotico malvagio, Dio dell\'Estinzione<br>
	Caos, Forza, Guerra, Male<br>
	Lancia<br>
	Mezzorchi, orchi<br>
</a></li>
-->
</ul>

<br>

<label class="warning" style="display:inline;padding:0 0.5em;">&nbsp;</label> Non selezionabile per via dell\'allineamento<br>
<label class="available" style="display:inline;padding:0 0.5em;">&nbsp;</label> Selezionabile grazie alla Divinit&agrave;<br>

</td><td width="4%"></td><td width="22%">

<strong>Descrizione</strong><br>
<br>

<div id="god-NULL-description"'.(('NULL'==$divinita_current)?'':' style="display:none;"').'>
	<div><strong>'.'Allineamento'.'</strong></div>
	<div>Qualsiasi</div>
	<br>
	<div><strong>'.'Razze protette'.'</strong></div>
	<div>'.'Qualsiasi'.'</div>
	<br>
	<div><strong>'.'Arma preferita'.'</strong></div>
	<div><em>under construction</em></div>
</div>
';

foreach($divinita as $id=>$D){
	$BODY.='<div id="god-'.$id.'-description"'.(($id==$divinita_current)?'':' style="display:none;"').'>';
		$BODY.='<div><strong>'.'Allineamento'.'</strong></div>';
		$BODY.='<div id="god-'.$id.'-alignment" class="'.$alignment[$D[alignment]][name_short].'">'.$alignment[$D[alignment]][name].'</div>';
		$BODY.='<br>';
		$BODY.='<div><strong>'.'Razze protette'.'</strong></div>';
		if(count($D[races])>0){
			$BODY.='<div>'.implode(", ",$D[races]).'</div>';
		}else{
			$BODY.='<div>'.'Qualsiasi'.'</div>';
		}
		$BODY.='<br>';
		$BODY.='<div><strong>'.'Arma preferita'.'</strong></div>';
		$BODY.='<div><em>under construction</em></div>';

	$BODY.='</div>';
}

$BODY.='
</td></tr></table>

<br><input type="button" class="btn" value="Indietro" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="Salva">

</form>

<script>
$$("#form-dndtool LABEL").each(function(LABEL){
	LABEL.observe("mouseover",function(e){
		this.addClassName("itemOver");
	}).observe("mouseout",function(e){
		this.removeClassName("itemOver");
	});
});
</script>

<script>
selAllineamento($("cella-allineamento-'.$allineamento_current.'").down("LABEL"));
</script>

';

$smarty->assign('buttons',$BUTTONS);
?>
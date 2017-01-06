<?php
$BODY.='
<style>
#storyTools OL,UL{padding:0;margin:0 0 0 2em;}
#storyTools OL LI,UL LI{}
.accordion_toggle{cursor:pointer;cursor:hand;border-top:1px solid #094379;padding:1em 0;}
.accordion_content{margin-bottom:1em;}
.adventurer_menu{background:#c00000;margin-bottom:1px;}
.adventurer_menu A{display:block;float:left;padding:0 1em;line-height:2em;text-decoration:none;color:#fff;font-weight:normal !important;}
.adventurer_menu .sel{background:#fff;color:#c00000;}
</style>
<script>
function showHide(q){
	$(q).next().toggle();
}
</script>
';

$steps=array(
	"tavolo"			=>array("Tavolo",array(
		"griglia"		=>array("Griglia",array()),
		"ingame"		=>array("INgame",array()),
		"servizio"		=>array("OUTgame",array()),
	)),
	"info"			=>array("Info",array(
		"summary"		=>array("Riepilogo",array()),
		"trama"			=>array("Trama",array()),
		"ambientazione"	=>array("Ambientazione",array()),
		"diario"		=>array("Diario",array()),
		"eventi"		=>array("Calendario",array()),
	)),
	"p"				=>array("Personaggi",array(
		"pg"			=>array("PG",array()),
		"png"			=>array("PNG",array()),
	)),
	"map"			=>array("Mappe",array(
	)),
	"regole"		=>array("Regole",array(
		"home"			=>array("Home",array()),
		"srd"			=>array("SRD",array()),
	)),
	"note"			=>array("Note",array(
		"personali"		=>array("Personali",array()),
		"pubbliche"		=>array("Pubbliche",array()),
	)),
);

$stepsMaster=array(
	"gm"			=>array("Game Master",array(
		"invita"		=>array("Invita",array()),
		"schermo"		=>array("Schermo",array()),
		"spunti"		=>array("Spunti",array()),
		"propp"			=>array("Schema di Propp",array()),
		"dizionari"		=>array("Dizionari",array()),
	)),
);

if($avv[fk_master]==$_SESSION[user_id])$steps=array_merge($steps,$stepsMaster);

$step_current=array();
foreach($steps AS $k=>$v){
	if($_GET[what]==$k)$step_current[0]=$k;
	else{
		foreach($v[1] AS $kk=>$vv){
			if($_GET[what]==$kk){
				$step_current[0]=$k;
				$step_current[1]=$kk;
			}
		}
	}
}
if(count($step_current)==0)$step_current=array("info");
if(count($step_current)==1){
	if(count($steps[$step_current[0]][1])>0){
		$step_current[1]=array_pop(array_reverse(array_keys($steps[$step_current[0]][1])));
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: avventura.php?id=".$_GET[id]."&what=".$step_current[1]);
		exit();
	}
}

$BODY.='<div class="adventurer_menu row">';
foreach($steps as $k=>$v){
	$BODY.='<a href="avventura.php?id='.$_GET[id].'&what='.$k.'"'.($k==$step_current[0]?' class="sel"':'').'><strong>'.$v[0].'</strong></a>';
}
$BODY.='</div>';

if(count($steps[$step_current[0]][1])>0){
	$BODY.='<div class="adventurer_menu row">';
	foreach($steps[$step_current[0]][1] as $k=>$v){
		$BODY.='<a href="avventura.php?id='.$_GET[id].'&what='.$k.'"'.($k==$step_current[1]?' class="sel"':'').'><strong>'.$v[0].'</strong></a>';
	}
	$BODY.='</div>';
}


/*
$BODY.='<div class="accordion_toggle" onclick="showHide(this)"><strong>Trama</strong></div>';
$BODY.='<div class="accordion_content" style="display:none;"><div>';
$BODY.='&nbsp;';
$BODY.='</div></div>';

$BODY.='<div class="accordion_toggle" onclick="showHide(this)"><strong>Capitoli</strong></div>';
$BODY.='<div class="accordion_content" style="display:none;"><div>';
$BODY.='&nbsp;';
$BODY.='</div></div>';

$BODY.='<div class="accordion_toggle" onclick="showHide(this)"><strong>Personaggi</strong></div>';
$BODY.='<div class="accordion_content" style="display:none;"><div>';
$BODY.='&nbsp;';
$BODY.='</div></div>';

$BODY.='<div class="accordion_toggle" onclick="showHide(this)"><strong>Luoghi</strong></div>';
$BODY.='<div class="accordion_content" style="display:none;"><div>';
$BODY.='&nbsp;';
$BODY.='</div></div>';

$BODY.='<div class="accordion_toggle" onclick="showHide(this)"><strong>Spunti</strong></div>';
$BODY.='<div class="accordion_content" style="display:none;"><div>';
$BODY.='&nbsp;';
$BODY.='</div></div>';

$BODY.='<div class="accordion_toggle" onclick="showHide(this)"><strong>Schema di Propp</strong></div>';
$BODY.='<div class="accordion_content" style="display:none;"><div>
<div style="height:10em;overflow:auto;border:1px solid #ccc;">
<ol>
<li><strong>allontanamento</strong><br>
uno dei membri della famiglia si allontana da casa (ad es. il principe va in guerra)</li>
<li><strong>divieto (o ordine)</strong><br>
(es. a Cappuccetto Rosso viene proibito di passare per il bosco)</li>
<li><strong>infrazione</strong><br>
(es. Cappuccetto rosso passa per il bosco)</li>
<li><strong>investigazione</strong><br>
l\'antagonista fa delle ricerche</li>
<li><strong>delazione</strong><br>
l\'antagonista riceve informazioni sulla sua vittima</li>
<li><strong>tranello</strong><br>
l\'antagonista tenta di ingannare l\'eroe</li>
<li><strong>connivenza</strong><br>
l\'eroe cade nel tranello</li>
<li><strong>danneggiamento (o mancanza)</strong><br>
l\'antagonista reca danno a uno dei membri della famiglia (o viene a mancare qualcosa) (es. la bella addormentata &egrave; punta a causa della maledizione di una vecchia fata)</li>
<li><strong>mediazione</strong><br>
il danneggiamento o la mancanza vengono resi noti</li>
<li><strong>consenso dell\'eroe</strong><br>
l\'eroe reagisce</li>
<li><strong>partenza dell\'eroe</strong><br>
</li>
<li><strong>l\'eroe messo alla prova</strong><br>
il mentore mette alla prova l\'eroe</li>
<li><strong>reazione dell\'eroe</strong><br>
risposta positiva dell\'eroe</li>
<li><strong>conseguimento del mezzo magico</strong><br>
il mentore d&agrave; l\'oggetto magico all\'eroe</li>
<li><strong>trasferimento dell\'eroe</strong><br>
l\'eroe si trasferisce sul luogo dell\'azione</li>
<li><strong>lotta tra eroe e antagonista</strong><br>
scontro con l\'antagonista</li>
<li><strong>marchiatura dell\'eroe</strong><br>
all\'eroe &egrave; impresso un marchio</li>
<li><strong>vittoria sull\'antagonista</strong><br>
l\'antagonista &egrave; vinto</li>
<li><strong>rimozione della sciagura o mancanza iniziale</strong><br>
si ripristina la situazione iniziale</li>
<li><strong>ritorno dell\'eroe</strong><br>
</li>
<li><strong>sua persecuzione</strong><br>
l\'eroe &egrave; sottoposto a persecuzione</li>
<li><strong>l\'eroe si salva</strong><br>
</li>
<li><strong>l\'eroe arriva in incognito a casa</strong><br>
</li>
<li><strong>pretese del falso eroe</strong><br>
</li>
<li><strong>all\'eroe &egrave; imposto un compito difficile</strong><br>
</li>
<li><strong>esecuzione del compito</strong><br>
</li>
<li><strong>riconoscimento dell\'eroe</strong><br>
</li>
<li><strong>smascheramento del falso eroe o dell\'antagonista</strong><br>
</li>
<li><strong>trasfigurazione dell\'eroe</strong><br>
l\'eroe assume nuove sembianze</li>
<li><strong>punizione dell\'antagonista</strong><br>
</li>
</ol>
</div>
</div></div>';

$BODY.='
<div class="accordion_toggle" onclick="showHide(this)"><strong>Dizionari</strong></div>
<div class="accordion_content" style="display:none;"><div>
	<a href="http://parole.virgilio.it/parole/" target="_blank"><strong>Italiano</strong></a><br>
	Con sinonimi, contrari, coniugazioni e molto altro.<br>
	<br>
	<a href="http://www.wordreference.com/it/" target="_blank"><strong>Italiano-Inglese</strong></a><br>
	E\' possibile scegliere anche altre lingue.<br>
	<br>
	<a href="http://rpcompendium.altervista.org/testi01.htm" target="_blank"><strong>Linguaggi D&D</strong></a><br>
	Elfico, Drow, Druidico e altri.
	
</div></div>
';

$BODY.='<div class="accordion_toggle" onclick="showHide(this)"><strong>Wizards of the Coast Tools</strong></div>';
$BODY.='<div class="accordion_content" style="display:none;"><div><ul>';
$BODY.='<script>';
$BODY.='function apriPopTool(q,w,h){window.open(q,"","scrollbars=0,width="+w+",height="+h)}';
$BODY.='</script>';
$BODY.='<li><a href="http://www.wizards.com/dnd/hook/Welcome.asp" 					onclick="apriPopTool(this.href,570,380);return false;" onkeypress="this.onclick();return false;">Hooks</a></li>';
$BODY.='<li><a href="http://www.wizards.com/dnd/NPCBG/generator.asp" 				onclick="apriPopTool(this.href,583,400);return false;" onkeypress="this.onclick();return false;">NCP Backgrounds</a></li>';
$BODY.='<li><a href="http://www.wizards.com/dnd/article5.asp?x=dnd/dx20010202b,0" 	onclick="apriPopTool(this.href,500,630);return false;" onkeypress="this.onclick();return false;">Character Names</a></li>';
$BODY.='<li><a href="http://www.wizards.com/dnd/tavern/Welcome.asp" 				onclick="apriPopTool(this.href,600,600);return false;" onkeypress="this.onclick();return false;">Tavern</a></li>';
$BODY.='<li><a href="http://www.wizards.com/dnd/ELCALC/Welcome.asp" 				onclick="apriPopTool(this.href,270,370);return false;" onkeypress="this.onclick();return false;">Encounter Level</a></li>';
$BODY.='<li><a href="http://www.wizards.com/dnd/dragon/index.htm" 					onclick="apriPopTool(this.href,423,500);return false;" onkeypress="this.onclick();return false;">Dragons</a></li>';
$BODY.='</ul></div></div>';

$BODY.='<div class="accordion_toggle" onclick="showHide(this)"><strong>SRD</strong></div>';
$BODY.='<div class="accordion_content" style="display:none;"><div>';
$BODY.='&nbsp;';
$BODY.='</div></div>';

$BODY.='<div class="accordion_toggle" onclick="showHide(this)"><strong>Schermo del Game Master</strong></div>';
$BODY.='<div class="accordion_content" style="display:none;"><div>';
$BODY.='&nbsp;';
$BODY.='</div></div>';
*/
?>
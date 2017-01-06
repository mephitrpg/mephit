<?php
$BODY.='<ul id="optTabs" class="row">
	<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[load_and_money].'</a></li>
	<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[new_container].'</a></li>
	'/*<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[add_custom_item].'</a></li>
	*/.'<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[options].'</a></li>
	<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[info].'</a></li>
	<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[help].'</a></li>
</ul>';

$BODY.='<div id="optCnt">';
	$BODY.='<div class="tabContent row" style="display:none;">';
		$BODY.='<div class="col" style="width:34%;">';
			$BODY.='
			<div id="load_bar_background">
				<div id="load_bar">&nbsp;</div>
				<div id="load_bar_text">
					<span id="load_total"></span> '.$_LANG[lb].' (<span id="load_perc"></span>%) <span id="load_label"></span>
					<br>
					<span id="load_bar_text_small"><span id="load_less"></span> '.$_LANG[lb].' (<span id="load_perc_less"></span>%) <span id="load_next"></span></span>
				</div>
			</div>
			';
		$BODY.='</div>';
		$BODY.='<div class="col" style="width:2%;">&nbsp;</div>';
		$BODY.='<div class="col money" style="width:20%;background:#67E067;">';
			$BODY.='<div class="moneyQ" id="">Nessuna</div>';
			$BODY.='<div class="moneyT">Armatura</div>';
		$BODY.='</div>';
		$BODY.='<div class="col" style="width:2%;">&nbsp;</div>';
		$BODY.='<div class="col money" style="width:20%;background:#AA7D00;">';
			$BODY.='<div class="moneyQ" id="gp_total_equip">0</div>';
			$BODY.='<div class="moneyT">Equipaggiamento ('.$_LANG[gp].')</div>';
		$BODY.='</div>';
		$BODY.='<div class="col" style="width:2%;">&nbsp;</div>';
		$BODY.='<div class="col money" style="width:20%;background:#FEB801;">';
			$BODY.='<div class="moneyQ" id="gp_total">0</div>';
			$BODY.='<div class="moneyT">Valori ('.$_LANG[gp].')</div>';
		$BODY.='</div>';
	$BODY.='</div>';
	$BODY.='<div class="tabContent" style="display:none;">';
		$BODY.='<table border="0" cellpadding="0" cellspacing="0"><tr>
		<td>'.$_LANG[name].':&nbsp;</td><td><input id="newContainerName" class="tst"></td>
		<td width="30"></td>
		<td>'.$_LANG[capacity].':&nbsp;</td><td><input id="newContainerCapacity" class="tst" value="0" style="text-align:right;"></td><td>&nbsp;'.$_LANG[lb].'</td>
		<td width="30"></td>
		<td><input type="button" id="newContainerSubmit" class="btn" value="'.$_LANG[add].'"></td>
		<td width="30"></td>
		<td><input type="button" id="newContainerCancel" class="btn" value="'.$_LANG[cancel].'"></td>
		</tr></table>';
	$BODY.='</div>';
	/*
	$BODY.='<div class="tabContent" style="display:none;">';
		$BODY.='&nbsp;';
	$BODY.='</div>';
	*/
	$BODY.='<div class="tabContent" style="display:none;">';
		$BODY.='Aggiungi ai contenitori oggetti di taglia:<br /><br />';
		$BODY.='<label style="cursor:pointer;cursor:hand;" for="taglia_pg"><input id="taglia_pg" type="radio" name="taglia" value="'.$C[taglia].'" checked> adeguata al personaggio</label><br />';
		$BODY.='<label style="cursor:pointer;cursor:hand;" for="taglia_3"><input id="taglia_3" type="radio" name="taglia" value="3"> Piccola</label><br />';
		$BODY.='<label style="cursor:pointer;cursor:hand;" for="taglia_4"><input id="taglia_4" type="radio" name="taglia" value="4"> Media</label><br />';
		$BODY.='<label style="cursor:pointer;cursor:hand;" for="taglia_5"><input id="taglia_5" type="radio" name="taglia" value="5"> Grande</label><br />';
	$BODY.='</div>';
	$BODY.='<div class="tabContent" style="display:none;">';
		
		$BODY.='<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr valign="top"><td width="49%">';
			$BODY.='<h4>'.$_LANG[carrying_capacity].'</h4>';
			$BODY.=$_LANG[load_light]			.': '.$_LANG[until].' '	.translateWeight($C[carico][leggero],$_MEPHIT[lang])	.'<br>';
			$BODY.=$_LANG[load_medium]			.': '.$_LANG[until].' '	.translateWeight($C[carico][medio],$_MEPHIT[lang])		.'<br>';
			$BODY.=$_LANG[load_heavy]			.': '.$_LANG[until].' '	.translateWeight($C[carico][pesante],$_MEPHIT[lang])	.'<br>';
			$BODY.=$_LANG[load_maximum]			.': '					.translateWeight($C[carico][massimo],$_MEPHIT[lang])	.'<br>';
			$BODY.=$_LANG[lift_over_the_head]	.': '.$_LANG[until].' '	.translateWeight($C[carico][testa],$_MEPHIT[lang])		.'<br>';
			$BODY.=$_LANG[lift_off_the_ground]	.': '.$_LANG[until].' '	.translateWeight($C[carico][sollevare],$_MEPHIT[lang])	.'<br>';
			$BODY.=$_LANG[drag]					.': '.$_LANG[until].' '	.translateWeight($C[carico][trascinare],$_MEPHIT[lang])	.'<br>';
		$BODY.='</td><td width="1%"></td><td width="1%" style="border-left:1px solid #ccc;">&nbsp;</td><td width="49%">';
			$BODY.='<h4>'.$_LANG[legend].'</h4>';
			$BODY.='<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center"><input type="checkbox" checked onclick="this.checked=1"></td>
				<td>&nbsp;</td>
				<td><em>Aggiungi il contenitore al carico totale</em></td>
			</tr>
			<tr>
				<td align="center">&#9824;</td>
				<td>&nbsp;</td>
				<td><em>Oggetto maledetto</em></td>
			</tr>
			<tr>
				<td align="center">&#185;</td>
				<td>&nbsp;</td>
				<td><em>Oggetti di taglia piccola pesano e contengono 1/4 del normale.</em></td>
			</tr>
			</table>';
		$BODY.='</td></tr></table>';
	$BODY.='</div>';
	$BODY.='<div class="tabContent" style="display:none;">';
		$BODY.='<ul style="margin:0;padding:0 0 0 1em;">
			<li>Per aggiungere o togliere una quantit&agrave; a piacere, SHIFT+CLICK su "+" o "-"</li>
			<li>Per aggiungere un nuovo oggetto in un contenitore, selezionare il contenitore, quindi cliccare sull\'oggetto nella lista "Oggetti disponibili"</li>
			<li>Per spostare tutte le copie di un oggetto da un contenitore all\'altro, trascinare il nome dell\'oggetto sul contenitore desiderato</li>
			<li>Per spostare alcune copie di un oggetto da un contenitore all\'altro, trascinare il nome dell\'oggetto sul contenitore desiderato tenendo premuto SHIFT ed indicare la quantit&agrave;</li>
			<li>Per creare un nuovo contenitore senza limiti di capacit&agrave;, inserire "0" nel campo "capacit&agrave;"</li>
		</ul>';
	$BODY.='</div>';
$BODY.='</div>';
$BODY.='<script>new jTab("optTabs","optCnt");</script>';
?>
<?php
$user_max_pc=$_MEPHIT[user][permission][$_SESSION[user_type]][max_pc];

if($user_max_pc<0){
	$continue=true;
}else{
	$query="SELECT * FROM mephit_personaggio WHERE autore=".$_SESSION[user_id];
	$result=mysql_query($query);
	$continue=mysql_num_rows($result)<$user_max_pc;
}

if(!$continue){
	$BODY.=$_LANG[too_many_pc];
}else{
	
	$BODY.='
	<script src="js/dndtools/dndcharsgen_nameGen.js"></script>
	<script>
	function mostraNome(q){
		switch(q){
			case"auto":
				$("nome-auto").show();
				$("nome-man").hide();
			break;
			case"man":
				$("nome-man").show();
				$("nome-auto").hide();
				$$("#nome-man INPUT")[0].select();
			break;
		}
	}
	function verifica(){
		if($("tipoNome2").checked){
			if($$("#nome-man INPUT")[0].value.strip()==""){
				alert("Inserisci un nome");
				$$("#nome-man INPUT")[0].select();
				return false;
			}
		}
		return true;
	}
	function methodDesc(q){
		switch(q){
			case"mephit":
				$("desc_standard_method").hide();
				$("desc_free_method").hide();
			break;
			case"standard":
				$("desc_mephit_method").hide();
				$("desc_free_method").hide();
			break;
			case"free":
				$("desc_mephit_method").hide();
				$("desc_standard_method").hide();
			break;
		}
		$("desc_"+q+"_method").show();
	}
	</script>
	
	<div id="DnDTools">';
	//<form name="f" action="'.$_SERVER[PHP_SELF].'?dndtool='.$_GET["dndtool"].'&step=2" method="post">
	$BODY.='<form id="form-dndtool" name="f" action="personaggi_save.php" method="post" onsubmit="return verifica();">';
	$BODY.='<input type="hidden" name="what" value="crea">';
	
	$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0">';
	/*
	$BODY.='<td>
	<fieldset><legend>Classic methods</legend>
	<input type="radio" name="metodo" value="acquisto_standard" id="acquisto_standard_method" onclick="unsetANS();"><label for="acquisto_standard_method">Acquisto punteggi standard (25pt)</label><br>
	<input type="radio" name="metodo" value="acquisto_non_standard" id="acquisto_non_standard_method" onclick="selAcquistoNonStandard();"><label for="acquisto_non_standard_method">Acquisto punteggi non standard:</label><br>
	&nbsp; &nbsp; <input type="radio" name="tipo_campagna" value="high" id="tipo_campagna_high" onclick="selAcquistoNonStandard();"><label for="tipo_campagna_high">Campagna ad alto livello di potere (32pt)</label><br>
	&nbsp; &nbsp; <input type="radio" name="tipo_campagna" value="hard" id="tipo_campagna_hard" onclick="selAcquistoNonStandard();"><label for="tipo_campagna_hard">Campagna difficile (28pt)</label><br>
	&nbsp; &nbsp; <input type="radio" name="tipo_campagna" value="binding" id="tipo_campagna_medium" onclick="selAcquistoNonStandard();"><label for="tipo_campagna_medium">Campagna impegnativa (22pt)</label><br>
	&nbsp; &nbsp; <input type="radio" name="tipo_campagna" value="low" id="tipo_campagna_low" onclick="selAcquistoNonStandard();"><label for="tipo_campagna_low">Campagna a basso livello di potere (15pt)</label><br>
	<input type="radio" name="metodo" value="elite" id="elite_method" onclick="unsetANS();"><label for="elite_method">Assortimento di elite</label><br>
	<input type="radio" name="metodo" value="rilancio" id="rilancio_method" onclick="unsetANS();"><label for="rilancio_method">Con un rilancio</label><br>
	<input type="radio" name="metodo" value="organici" id="organici_method" onclick="unsetANS();"><label for="organici_method">Personaggi organici</label><br>
	<input type="radio" name="metodo" value="medi_personalizzati" id="medi_personalizzati_method" onclick="unsetANS();"><label for="medi_personalizzati_method">Personaggi medi personalizzati</label><br>
	<input type="radio" name="metodo" value="medi_casuali" id="medi_casuali_method" onclick="unsetANS();"><label for="medi_casuali_method">Personaggi medi casuali</label><br>
	<input type="radio" name="metodo" value="potenziati" id="potenziati_method" onclick="unsetANS();"><label for="potenziati_method">Personaggi potenziati</label><br>
	</fieldset>
	</td>';
	*/
	$BODY.='
	
	<tr valign="top">
	
	<td><strong>Nome</strong></td>
	<td width="20">&nbsp;</td>
	<td>
	
	<div>
		<input type="radio" name="tipoNome" value="man" id="tipoNome2" onclick="mostraNome(\'man\');" onkeypress="this.onclick();" checked>
		<label for="tipoNome2" onclick="mostraNome(\'man\');" onkeypress="this.onclick();">Manuale</label>
	</div>
	<div>
		<input type="radio" name="tipoNome" id="tipoNome1" value="auto" onclick="mostraNome(\'auto\');" onkeypress="this.onclick();">
		<label for="tipoNome1" onclick="mostraNome(\'auto\');" onkeypress="this.onclick();">Automatico</label>
	</div>
	
	</td>
	<td width="20">&nbsp;</td>
	<td>
	
	<div id="nome-auto" style="display:none;">
		<table width="1">
			<tr>
				<td><select name="namesSel" size="10"></select></td>
				<td width="1%" align="center" nowrap>
					<label for="minsyl">Min. sillabe:</label><br />
					<select name="minsyl" size="1"">
					<option value="2">2
					<option selected="selected" value="3">3
					<option value="4">4
					<option value="5">5
					<option value="6">6
					<option value="7">7
					<option value="8">8
					<option value="9">9
					<option value="10">10
					</select><br />
					<label for="maxsyl">Max. sillabe:</label><br />
					<select name="maxsyl" size="1">
					<option value="2">2
					<option value="3">3
					<option value="4">4
					<option selected="selected" value="5">5
					<option value="6">6
					<option value="7">7
					<option value="8">8
					<option value="9">9
					<option value="10">10
					</select><br />
					<br /><br /><br /><br />
					<input type="button" name="generate" class="btn" value="Genera" onclick="FillRandomName(this.form);">
				</td>
			</tr>
		</table>
	</div>
	<div id="nome-man">
		<input class="tst" name="names" value="">
		<script>$$("#nome-man INPUT")[0].select();</script>
	</div>
	<br>
	
	<script>
	InitForm(document.forms["f"]);
	</script>
	
	</td>
	</tr>
	
	<tr><td colspan="5" height="20">&nbsp;</td></tr>
	
	<tr valign="top">
	<td><strong>Metodo</strong></td>
	<td width="20">&nbsp;</td>
	<td>
	
		<label for="mephit_method" style="display:block;" onclick="methodDesc(\'mephit\');">
			<input type="radio" name="metodo" name="metodo" value="mephit" id="mephit_method" checked>Mephit<br />
		</label>
		<label for="standard_method" style="display:block;" onclick="methodDesc(\'standard\');">
			<input type="radio" name="metodo" value="standard" id="standard_method">Standard<br />
		</label>
		<label for="free_method" style="display:block;" onclick="methodDesc(\'free\');">
			<input type="radio" name="metodo" value="free" id="free_method">Libero<br>
		</label>
	
	</td><td width="20">&nbsp;</td><td width="320">
	
		<div id="desc_mephit_method">
			<strong>PER OGNI CARATTERISTICA:</strong><br />
			- Lancia 4d6<br />
			- Rilancia tutti gli 1<br />
			- Elimina il risultato pi&ugrave basso.<br />
			<br />
			<strong>AL TERMINE:</strong><br />
			- Rilancia se la somma dei modificatori &egrave; minore di 1<br />
			- Rilancia se il punteggio pi&ugrave; alto &egrave; minore di 14<br />
			- Puoi togliere 2 punti da una caratteristica per aggiungerne 1 ad un\'altra (ripeti quante volte vuoi).<br />
		</div>
		<div id="desc_standard_method" style="display:none;">
			<strong>PER OGNI CARATTERISTICA:</strong><br />
			- Lancia 4d6<br />
			- Elimina il risultato pi&ugrave basso.<br />
			<br />
			<strong>AL TERMINE:</strong><br />
			- Rilancia se la somma dei modificatori &egrave; minore di 1<br />
			- Rilancia se il punteggio pi&ugrave; alto &egrave; minore di 14<br />
		</div>
		<div id="desc_free_method" style="display:none;">
			<strong>PER OGNI CARATTERISTICA:</strong><br />
			Inserisci manualmente i valori.<br />
			Questo metodo &egrave; utile se hai gi&agrave; generato i punteggi di caratteristica in un altro modo.<br />
		</div>
	
	</td></tr>
	
	<tr><td colspan="5">
	
	';
	/*
	<br />
	
	<label for="acquisto_method">
		<input type="radio" name="metodo" value="acquisto" id="acquisto_method" onclick="unsetANS();">Acquisto punteggi personalizzato: <input maxlength="2" value="33" onfocus="byId(\'acquisto_method\',\'checked\',1);" style="width:20px;text-align:right;" name="punti"> punti<br />
		
	</label>
	*/
	$BODY.='
	
	<!--
	La somma dei modificatori &egrave; minore di 1.
	Il pi&ugrave; alto punteggio &egrave; inferiore a 14.
	-->
	
	<div align="right">
	<br /><br />
	<input type="button" value=" ? " class="btn" onclick="alert(\'Questo generatore NON &Egrave; AUTOMATICO.\n\nQuesta utility permette di creare una scheda del personaggio che sarà possibile compilare a piacimento.\n\nLa descrizione dei metodi di creazione &quot;Classic&quot; la trovi nel Manuale del Giocatore e nella Guida del Dungeon Master.\')">
	<input type="submit" value="Avanti" class="btn">
	</div>
	</td>';
	$BODY.='</tr></table>
	';
	/*
	<p>Includi queste classi: (<a href="javascript:selAllClasses(1);">tutte</a>/<a href="javascript:selAllClasses(0);">nessuna</a>)</p>';
	
	$lang=($_COOKIE["mephit_lang"]!="en_English")?"_".substr($_COOKIE["mephit_lang"],0,2):"";
	$query="SELECT `id`,`name".$lang."` FROM `srd35_class` ORDER BY `name".$lang."`";
	$result=mysql_query($query);
	$i=0;
	$BODY.='<table border="0" cellpadding="0" cellspacing="0" width="100%">';
	while(list($id,$name)=mysql_fetch_array($result)){
		if($i%3==0)$BODY.='<tr valign="top">';
		$i++;
		$BODY.='<td width="33%"><input type="checkbox" name="class['.$id.']" id="classe'.$id.'" checked><label for="classe'.$id.'">'.$name.'</label></td>';
		if($i%3==0)$BODY.='</tr>';
	}
	if($i%3!=0){
		while($i%3!=0){
			$BODY.='<td width="33%">&nbsp;</td>';
			$i++;
		}
		echo'</tr>';
	}
	$BODY.='</table>
	*/
	$BODY.='</form>';
	
}
?>
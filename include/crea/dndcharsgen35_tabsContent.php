<?php
$query_temp="SELECT * FROM srd35_race ORDER BY name_it";
$result_temp=mysql_query($query_temp);
$razza_options='';
$razza_js='races=new Array();
';
if($result_temp){
	while($row=mysql_fetch_array($result_temp)){
		$razza_options.='<option value='.$row[id].(($row[name_it]=="Umano"||$row[name]=="Human")?' selected':'').'>'.$row[name_it];
		$razza_js.='races['.$row[id].']={"FOR":'.(($row[_str]!=NULL)?$row[_str]:0).',"DES":'.(($row[_dex]!=NULL)?$row[_dex]:0).',"COS":'.(($row[_con]!=NULL)?$row[_con]:0).',"INT":'.(($row[_int]!=NULL)?$row[_int]:0).',"SAG":'.(($row[_wis]!=NULL)?$row[_wis]:0).',"CAR":'.(($row[_cha]!=NULL)?$row[_cha]:0).'}
';
	}
}
$BODY.='
<td width="40">&nbsp;</td><td>

<!-- <div id="razza_content" class="h">
<script>
'.$razza_js.'
</script>
<select name="razza" onchange="selezionaRazza(this.options[this.options.selectedIndex].value)">'.$razza_options.'</select>
</div> -->
<div id="nome_content" class="h">

<script src="js/dndtools/dndcharsgen_nameGen.js"></script>
<table summary="." border="0" cellpadding="0" cellspacing="0"><tr valign="top"><td>
<fieldset id="fieldset_tipoNome1" class=sensible style="height:234px;"><legend><input type=radio name=tipoNome id="tipoNome1" value="auto"><label for="tipoNome1">Generazione automatica</label></legend><div style="margin:10px;">
<table width="80%"><tr>
<td><select name="namesSel" size="10" style="width:90%;" onclick="document.f.tipoNome[0].checked=1;"></select></td>
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
<script>InitForm(f)</script>
<br /><br /><br /><br />
<input type="button" name="generate" value="Genera" onclick="FillRandomName(this.form);">
</td>
</tr>
</table>
</div></fieldset>
</td><td>
<fieldset id="fieldset_tipoNome2" class=sensible style="height:234px;"><legend><input type=radio name=tipoNome value="man" id="tipoNome2" checked><label for="tipoNome2">Inserimento manuale</label></legend><div style="margin:10px;">
<br />Nome: <input name="names" value="';
$query_temp="SELECT MAX(id_personaggio) FROM mephit_personaggio";
$result_temp=mysql_query($query_temp);
if($result_temp){
	while($row=mysql_fetch_array($result_temp)){
		$BODY.="Personaggio #".($row[0]+1);
	}
}
$BODY.='">
</div></fieldset>
</td></tr></table>

</div>
<script>
sensibleFieldset("fieldset_tipoNome1","tipoNome1");
sensibleFieldset("fieldset_tipoNome2","tipoNome2");
</script>

</td>

';
?>
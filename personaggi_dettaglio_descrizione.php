<?php
/*
$query_temp="SELECT MAX(id_personaggio) FROM mephit_personaggio";
$result_temp=mysql_query($query_temp);
if($result_temp){
	while($row=mysql_fetch_array($result_temp)){
		$maxPgId=$row[0];
	}
}
$name='Personaggio #'.($maxPgId+1);
*/

$BODY.='
<script src="js/fckeditor/fckeditor.js"></script>
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
</script>
';

$BODY.='<form id="form-dndtool" name="f" action="personaggi_save.php" method="post" enctype="multipart/form-data" onsubmit="return verifica();">';
$BODY.='<input type="hidden" name="what" value="descrizione">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';

$BODY.='
<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr valign="top"><td><div style="overflow:auto;">

<strong>Nome</strong><br>
<br>

<div>
	<input type="radio" name="tipoNome" id="tipoNome1" value="auto" onclick="mostraNome(\'auto\');" onkeypress="this.onclick();">
	<label for="tipoNome1" onclick="mostraNome(\'auto\');" onkeypress="this.onclick();">Automatico</label>
</div>
<div>
	<input type="radio" name="tipoNome" value="man" id="tipoNome2" onclick="mostraNome(\'man\');" onkeypress="this.onclick();" checked>
	<label for="tipoNome2" onclick="mostraNome(\'man\');" onkeypress="this.onclick();">Manuale</label>
</div>

<br>

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
	<input class="tst" name="names" value="'.htmlspecialchars($P->row[personaggio][nome]).'">
</div>
<br>

<script>
InitForm(document.forms["f"]);
</script>


';

/*
// <img src="'.$_MEPHIT[WWW_ROOT].$_MEPHIT[upload_path].'/users/10/pg/printable/ghostdog.jpg">

$httpPath=$_MEPHIT[WWW_ROOT].$_MEPHIT[upload_path].'/users/'.$P->row[personaggio][autore].$_MEPHIT[user][folders][pg_printable].'/'.$P->row[personaggio][immagine_stampa];
$serverPath=$_MEPHIT[DOCUMENT_ROOT].$httpPath;
if(file_exists($serverPath)){
	$BODY.='<img width="100%" src="'.$httpPath.'">';
}else{
	$BODY.='<img width="100%" src="'.$_MEPHIT[pgimage_default].'">';
}
*/

$BODY.='<strong>Occhi</strong><br>';
$BODY.='<input class="tst" name="occhi" value="'.htmlspecialchars($P->row[personaggio][occhi]).'"><br><br>';

$BODY.='<strong>Capelli</strong><br>';
$BODY.='<input class="tst" name="capelli" value="'.htmlspecialchars($P->row[personaggio][capelli]).'"><br><br>';

$BODY.='<strong>Pelle</strong><br>';
$BODY.='<input class="tst" name="skin" value="'.htmlspecialchars($P->row[personaggio][skin]).'"><br><br>';

$BODY.='

</div></td><td width="100%"><div style="padding-left:10px;">

<strong>Background</strong><br>
<br>

<textarea id="descrizione" name="descrizione">'.htmlspecialchars($P->row[personaggio][descrizione]).'</textarea>
<script>
var oFCKeditor = new FCKeditor( \'descrizione\' ) ;
oFCKeditor.BasePath	= \'js/fckeditor/\' ;
oFCKeditor.Height	= 600 ;
oFCKeditor.Value	= \'<p>This is some <strong>sample text<\/strong>. You are using <a href="http://www.fckeditor.net/">FCKeditor<\/a>.<\/p>\' ;
oFCKeditor.ReplaceTextarea() ;
</script>

</div></td></tr></table>
';

$BODY.='<br><input type="button" class="btn" value="Indietro" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="Salva">';

$BODY.='</form>';

$smarty->assign('buttons',$BUTTONS);
?>
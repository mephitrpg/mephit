<?php
$BODY.='<form id="form-dndtool" action="personaggi_delete.php?id='.$_GET[id].'&what=doit" method="post">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';

if($P->row[personaggio][autore]==$_SESSION[user_id]||$_SESSION[user_type]=="admin"){
	
	$BODY.='<input type="hidden" name="what" value="doit">';
	$BODY.=$_LANG["to_delete_character_confirm_operation_writing_delete"].'<br>
	<br>
	<input name="confirm"><br>
	';
	$BODY.='<br><input type="button" class="btn" value="'.$_LANG["back"].'" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="'.$_LANG["delete"].'">';
	
}else{
	
	$BODY.=$_LANG["you_cant_delete_this_character"]."<br>";
	$BODY.='<br><input type="button" class="btn" value="'.$_LANG["back"].'" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();">';

}

$BODY.='</form>';

?>

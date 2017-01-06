<?php
$user_max_class=$_MEPHIT[user][permission][$_SESSION[user_type]][max_class];

if($user_max_class<0){
	$continue=true;
}else{
	$query="SELECT * FROM mephit_class WHERE fk_author=".$_SESSION[user_id];
	$result=mysql_query($query);
	$continue=mysql_num_rows($result)<$user_max_class;
}

if(!$continue){
	$BODY.=$_LANG[too_many_class];
}else{
		
	$BODY.='<script>
	</script>';
	$BODY.='<div id="DnDTools">';
	$BODY.='<form id="form-dndtool" name="f" action="classe_save.php" method="post" onsubmit="return verifica();">';
	$BODY.='<input type="hidden" name="what" value="crea">';
	
	$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0">';
	
	$BODY.='
	<tr valign="top">
	<td><strong>Nome</strong></td>
	<td width="20">&nbsp;</td>
	<td><input class="tst" id="name" name="name" value=""></td>
	</tr>
	';
	
	$BODY.='
	<tr><td colspan="3" height="20">&nbsp;</td></tr>
	<tr><td colspan="3">
	<div align="right">
	<input type="submit" value="Avanti" class="btn">
	</div>
	</td></tr>
	';
	
	$BODY.='</table>';
	
}
?>
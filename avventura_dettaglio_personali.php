<?php
$valid=false;
if($_SESSION[user_id]==$avv[fk_master]){
	$valid=true;
	$text=$avv[note_private];
}else{
	$partecipanti=array_keys(getAdventureMembers($avv[id_avventura]));
	if(in_array($_SESSION[user_id],$partecipanti)){
		$valid=true;
		$query="SELECT *
		FROM mephit_giocatore_avventura
		WHERE fk_avventura=".$_GET[id]."
		AND fk_giocatore=".$_SESSION[user_id];
		$result=mysql_query($query);
		while($row=mysql_fetch_assoc($result)){
			$text=$row[note_private];
		}
	}
}

if($valid){
	
	$BODY.='<script src="js/fckeditor/fckeditor.js"></script>';
	$BODY.='<form action="avventura_save.php" method="post">';
	$BODY.='<input type="hidden" name="what" value="private">';
	$BODY.='<input type="hidden" name="id" value="'.$avv[id_avventura].'">';
	$BODY.='<input type="hidden" name="act" value="note-private">';
	$BODY.='<div id="mynoteread"><div>'.$text.'</div><input type="button" class="btn" value="Modifica" onclick="$(\'mynoteread\').toggle();$(\'mynotewrite\').toggle();"></div>';
	$BODY.='<div id="mynotewrite" style="display:none;">';
		$BODY.='<div style="padding:1px;background:#ccc;">';
		$BODY.='<textarea id="FCKeditor1" name="text">'.$text.'</textarea><br>';
		$BODY.='</div>';
		$BODY.='<script>
		var oFCKeditor = new FCKeditor( \'FCKeditor1\' ) ;
		oFCKeditor.BasePath	= \'js/fckeditor/\' ;
		oFCKeditor.Height	= 600 ;
		oFCKeditor.ReplaceTextarea() ;
		function apriPopTool(q,w,h){
			window.open(q,"","width="+w+",height="+h+",scrollbars=0");
		}
		</script>';
		$BODY.='<div align="right">';
		$BODY.='<input type="submit" class="btn" value="Salva">';
		$BODY.='</div>';
	$BODY.='</div>';
	$BODY.='</form>';
	
}
?>
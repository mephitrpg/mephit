<?php
$text=array();
$text[$avv[fk_master]]=array(
	"text"=>$avv[note_pubbliche]
);

$query="SELECT *
FROM mephit_giocatore_avventura 
JOIN mephit_giocatore ON id_giocatore=fk_giocatore
WHERE fk_avventura=".$_GET[id]."
ORDER BY nick";
$result=mysql_query($query);

while($row=mysql_fetch_assoc($result)){
	$text[$row[id_giocatore]]=array(
		"text"=>$row[note_pubbliche],
		"nick"=>$row[nick]
	);
}

$BODY.='<table border="0" cellpadding="6" cellspacing="0" width="100%">';
foreach($text as $giocatore=>$txt){
	
	if($giocatore==$_SESSION[user_id])$postType="gm";
	else $postType="pg";
	
	$BODY.='<tr valign="top">';
	$BODY.='<td width="100" nowrap class="pbf-post-'.$postType.'">'.getAvatarBox($giocatore,array("type"=>"link","row"=>$txt)).'</td>';
	$BODY.='<td class="pbf-post-'.$postType.'">';
	if($giocatore==$_SESSION[user_id]){
		$BODY.='<script src="js/fckeditor/fckeditor.js"></script>';
		$BODY.='<form action="avventura_save.php" method="post">';
		$BODY.='<input type="hidden" name="what" value="public">';
		$BODY.='<input type="hidden" name="id" value="'.$avv[id_avventura].'">';
		$BODY.='<input type="hidden" name="act" value="note-public">';
		$BODY.='<div id="mynoteread"><div>'.$txt[text].'</div><input type="button" class="btn" value="Modifica" onclick="$(\'mynoteread\').toggle();$(\'mynotewrite\').toggle();"></div>';
		$BODY.='<div id="mynotewrite" style="display:none;">';
			$BODY.='<div style="padding:1px;background:#ccc;">';
			$BODY.='<textarea id="FCKeditor1" name="text">'.$txt[text].'</textarea>';
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
	}else{
		$BODY.=$txt[text];
	}
	$BODY.='</td>';
	$BODY.='</tr>';
	
}
$BODY.='</table>';
?>
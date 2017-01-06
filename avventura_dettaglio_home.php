<?php
$text=$avv[home];

if($avv[fk_master]==$_SESSION[user_id]){
	$BODY.='<script src="js/fckeditor/fckeditor.js"></script>';
	$BODY.='<form>';
	$BODY.='<div style="padding:1px;background:#ccc;">';
	$BODY.='<textarea id="FCKeditor1" name="home">'.$text.'</textarea>';
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
	$BODY.='</form>';
}else{
	$BODY.=$text;
}
?>
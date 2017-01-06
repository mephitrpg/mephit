<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["avatar"]);

$BODY='';

$PATH='<a href="my_avatar.php">'.$_LANG[avatar].'</a>';
$TAB1='my';

require_once("include/jure_upload.php");
$avatar_obj=new jure_upload("unique");

$avatar_uploaded="";
$handle=opendir($_SESSION["user_folder_server"].$_MEPHIT["user"]["folders"]["avatar"]);
while($file = readdir($handle)){if(!is_dir($file)){
	$avatar_uploaded=$_SESSION["user_folder_http"].$_MEPHIT["user"]["folders"]["avatar"].'/'.$file;
	break;
}}
if(isset($_POST[avatar_type])){
/*
	$query_avatar="SELECT avatar_size FROM mephit_giocatore WHERE id_giocatore='".$_SESSION[user_id]."'";
	$result_avatar=mysql_query($query_avatar);
	while($row=mysql_fetch_array($result_avatar)){
		$avatar_size_was=$row[avatar_size];
	}
1 upload
2 link
3 default
	
	tipo 1 size 1 : ok
	tipo 1 size 2 : ok
	tipo 1 size 3 : if (==3) set 2 ELSE not change
	tipo 2 size 1 : if (==1) set 2 ELSE not change
	tipo 2 size 2 : ok
	tipo 2 size 3 : ok
	tipo 3 size 1 : ok
	tipo 3 size 2 : ok
	tipo 3 size 3 : ok
	
*/
	switch($_POST[avatar_type]){
		case"upload":
			if( $_FILES[avatar][error]==0 && $_MEPHIT[gd_enabled] ){
				$size=getimagesize($_FILES[avatar][tmp_name]);
				$valid=$size[0]<=$_MEPHIT[avatar_maxWidth] && $size[1]<=$_MEPHIT[avatar_maxHeight];
				$skip=false;
			}else{
				$valid=false;
				$skip=true;
			}
			if( $valid || $skip ){
				$avatar_obj->addFile("avatar",$_SESSION["user_folder_server"].$_MEPHIT["user"]["folders"]["avatar"],"images");
				$avatar_obj->upload();
				if($avatar_obj->isValid()){
					$valid=true;
					$newAvatar=$_SESSION["user_folder_http"].$_MEPHIT["user"]["folders"]["avatar"]."/".$_FILES[avatar][name];
					if(!is_file($newAvatar)){
						$newAvatar=$_SESSION["avatar"];
					}
				}else{
					$valid=false;
				}
				$avatar_message="";
				if($valid){
					if($_POST[avatar_size]==2){
						$newSize=($_SESSION[avatar_size]!=2)?$_SESSION[avatar_size]:0;
					}else{
						$newSize=$_POST[avatar_size];
					}
					$query="UPDATE mephit_giocatore SET avatar_type='1',avatar_size=".$newSize." WHERE id_giocatore=".$_SESSION[user_id];
					$result=mysql_query($query);
					if($result){
						$avatar_message="Avatar modificato correttamente";
	//					$LOGIN=str_replace('<img name="avatar" src="'.$_SESSION["avatar"],'<img name="avatar" src="'.$newAvatar,$LOGIN);
						$_SESSION[avatar]=(is_file($newAvatar))?$newAvatar:$_SESSION[avatar]=$avatar_uploaded;
						$_SESSION[avatar_size]=$newSize;
					}else{
						$avatar_message="ERRORE DEL SERVER: Impossibile leggere il database";
					}
				}
				if(!$avatar_obj->isValid())$avatar_message.=$avatar_obj->showResultDetails();
			}else{
				$avatar_message="ERRORE: le dimensioni massime sono ".$_MEPHIT[avatar_maxWidth]."x".$_MEPHIT[avatar_maxHeight]." pixel";
			}
		break;
		case"link":
			if(trim($_POST[avatar_link])!=""){
				// leggo le dimensioni dell'immagine e controllo se esiste
				if( $_MEPHIT[gd_enabled] ){
					$size=@getimagesize($_POST[avatar_link]);
					if( $size!==false ){
						$valid=$size[0]<=$_MEPHIT[avatar_maxWidth] && $size[1]<=$_MEPHIT[avatar_maxHeight];
						$exists=true;
					}else{
						$valid=false;
						$exists=false;
					}
				}else{
					$valid=false;
					$exists=true;
				}
				if($exists){
					// imposto le opzioni
					$newAvatar=trim($_POST[avatar_link]);
					if($valid){
						$avatar_message="";
						$newSize=$_POST[avatar_size];
					}else{
						if($_POST[avatar_size]==0){
							$avatar_message="Non puoi scegliere l'opzione \"Original Size\" perchè l'avatar è più grande di ".$_MEPHIT[avatar_maxWidth]."x".$_MEPHIT[avatar_maxHeight]." pixel."."<br />";
							if(($_SESSION[avatar_size]!=0)){
								$newSize=$_SESSION[avatar_size];
							}else{
								$newSize=1;
							}
						}else{
							$newSize=$_POST[avatar_size];
						}
					}
					// salvo nel db i dati dell'avatar e delle opzioni
					$query="UPDATE mephit_giocatore SET avatar_type='2',avatar_link='".$newAvatar."',avatar_size=".$newSize.",avatar_link_x=".($_POST[avatar_link_x]*1).",avatar_link_y=".($_POST[avatar_link_y]*1)." WHERE id_giocatore=".$_SESSION[user_id];
					$result=mysql_query($query);
					if($result){
						$avatar_message.="Avatar modificato correttamente";
	//					$LOGIN=str_replace('<img name="avatar" src="'.$_SESSION["avatar"],'<img name="avatar" src="'.$newAvatar,$LOGIN);
						$_SESSION["avatar"]=$newAvatar;
						$_SESSION["avatar_link_x"]=$_POST["avatar_link_x"]*1;
						$_SESSION["avatar_link_y"]=$_POST["avatar_link_y"]*1;
					}else{
						$avatar_message.="ERRORE DEL SERVER: Impossibile leggere il database";
					}
				}else{
					$avatar_message="ERRORE: Immagine inesistente o corrotta"."<br /><a href=\"".$_POST[avatar_link]."\" target=\"_blank\">".$_POST[avatar_link]."</a>";
				}
			}
		break;
		case"standard":
			$newAvatar=$_MEPHIT[avatar_default];
			//$newSize=$_POST[avatar_size];
			$newSize=0;
			$query="UPDATE mephit_giocatore SET avatar_type='0',avatar_size='".$newSize."' WHERE id_giocatore=".$_SESSION[user_id];
			$result=mysql_query($query);
			if($result){
				$avatar_message="Avatar modificato correttamente";
			}else{
				$avatar_message="ERRORE DEL SERVER: Impossibile leggere il database";
			}
//			$LOGIN=str_replace('<img name="avatar" src="'.$_SESSION["avatar"],'<img name="avatar" src="'.$newAvatar,$LOGIN);
			$_SESSION["avatar"]=$newAvatar;
		break;
	}
}
$query_avatar="SELECT avatar_type,avatar_size,avatar_link,avatar_link_x,avatar_link_y FROM mephit_giocatore WHERE id_giocatore='".$_SESSION[user_id]."'";
$result_avatar=mysql_query($query_avatar);
while($row=mysql_fetch_array($result_avatar)){
	$avatar_type=$row[avatar_type];
	$avatar_size=$row[avatar_size];
	$avatar_link=$row[avatar_link];
	$avatar_link_x=$row[avatar_link_x];
	$avatar_link_y=$row[avatar_link_y];
}

require("include/menu_personal.php");

$BODY.='<h3>'.'Avatar'.'</h3>';

if(isset($avatar_message))$BODY.='<p align="center">'.$avatar_message.'</p>';

$BODY.='<form name="f_avatar" enctype="multipart/form-data" action="'.$_SERVER[PHP_SELF].'" method="post">';
$BODY.=$avatar_obj->printFiled("MAX_FILE_SIZE",$_MEPHIT[avatar_maxSize]);
$BODY.='<fieldset style="padding:15px;"><legend>Tipi di avatar</legend>';
$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0" width="100%"><tr valign="top"><td width="33%">';

// ===UPLOAD===
$BODY.='<fieldset id="fieldset_upload" class="sensible"><legend><input type="radio" name="avatar_type" id="avatar_type_upload" value="upload"'.(($avatar_type==1)?' checked':'').'><label for="avatar_type_upload">Upload</label></legend><div style="padding:15px;height:264px;" align="center">';
/* $BODY.='<script>
function preview(q){
	if(document.images.avatar_up_preview){
		q=q.split("\\\\");
		q=q.join("/");
		q="file:///"+q.substring(0,2)+escape(q.substring(2,q.length));
		prompt("",q);
		document.images.avatar_up_preview.src=q;
	}
}
</script>';*/
$BODY.='<input type="file" name="avatar" size="10"><br />';
$BODY.='<br />';
if( $avatar_size==0  || $avatar_size==2 ){
	$BODY.='<img name="avatar_up_preview" src="'.$avatar_uploaded.'" vspace="2">';
}else if($avatar_size==1){
	$BODY.='<img src="'.$avatar_uploaded.'" width="'.$_MEPHIT[avatar_maxWidth].'" height="'.$_MEPHIT[avatar_maxHeight].'" vspace="2">';
}
$BODY.='<br /><br /><b>Dimensioni massime:</b><br />'.$_MEPHIT[avatar_maxWidth].'x'.$_MEPHIT[avatar_maxHeight].' pixel, '.($_MEPHIT[avatar_maxSize]/1024).'k';
//$BODY.='<input type=button onclick="document.images.avatar_up_preview.src=\'file:///C:/Documents%20and%20Settings/jure/Documenti/Immagini/avatar/60x60_bandieradellapace.gif\';">';
$BODY.='</div></fieldset></td>';

// ===LINK===
$BODY.='<td width="34%"><fieldset id="fieldset_link" class="sensible"><legend><input type="radio" name="avatar_type" id="avatar_type_link" value="link"'.(($avatar_type==2)?' checked':'').'><label for="avatar_type_link">Link</label></legend><div style="padding:15px;height:264px;" align="center">';
$BODY.='<input name="avatar_link" value="'.$avatar_link.'" onfocus="this.select();" style="width:150px;">';
if($avatar_link!=""){
	$BODY.='<br /><br />';
	if( $_MEPHIT[gd_enabled] ){
		$size=@getimagesize($avatar_link);
		if( $size!==false ){
			$valid=$size[0]<=$_MEPHIT[avatar_maxWidth] && $size[1]<=$_MEPHIT[avatar_maxHeight];
			$exists=true;
		}else{
			$valid=false;
			$exists=false;
		}
	}else{
		$valid=false;
		$exists=true;
	}
	if($exists){
		if( $avatar_size==0 && $valid ){
			$BODY.='<div><img src="'.$avatar_link.'"></div>';
		}else if($avatar_size==0 || $avatar_size==1){
			$BODY.='<div><img src="'.$avatar_link.'" width="100" height="100"></div>';
		}else if($avatar_size==2){
			$BODY.='<div style="display:block;width:100px;height:100px;background: url('.$avatar_link.') no-repeat '.$avatar_link_x.'% '.$avatar_link_y.'%;"></div>';
		}
	}
}
if( $avatar_type==2 && $avatar_size==2 ){
	$BODY.='<br /><b>Centro:</b><br /><select name="avatar_link_x">';
	for($i=0;$i<=100;$i++){
		$BODY.="<option".(($i==$avatar_link_x)?" selected":"").">".sprintf("%02d",$i)."%";
	}
	$BODY.='</select> x <select name="avatar_link_y">';
	for($i=0;$i<=100;$i++){
		$BODY.="<option".(($i==$avatar_link_y)?" selected":"").">".sprintf("%02d",$i)."%";
	}
	$BODY.='</select>';
}else{
	$BODY.='<input type=hidden name=avatar_link_x value='.$avatar_link_x.'>';
	$BODY.='<input type=hidden name=avatar_link_y value='.$avatar_link_y.'>';
}
$BODY.='<br /><small>Scegli il tuo avatar su</small><br /><a href="http://www.fantasyavatar.altervista.org/" target="_blank"><small>Fantasy Avatar</small></a>';
$BODY.='</div></fieldset></td>';

// ===STANDARD===
$BODY.='<td width="33%"><fieldset id="fieldset_standard" class="sensible"><legend><input type="radio" name="avatar_type" id="avatar_type_standard" value="standard"'.(($avatar_type==0)?' checked':'').'><label for="avatar_type_standard">Standard</label></legend><div style="padding:15px;height:264px;" align="center"><input size="1" style="visibility:hidden;" disabled>';
$BODY.='<br /><br /><img src="'.$_MEPHIT[avatar_default].'">';
$BODY.='</div></fieldset>';

$BODY.='</td>';
$BODY.='</td></tr></table>';
$BODY.='</fieldset>';

$BODY.='<br />';

$BODY.='<fieldset class="sensibleLinks"><legend>Opzioni</legend>';

$BODY.='<a href="javascript:;" onclick="this.blur();document.f_avatar.avatar_size[0].checked=1;" style="display:block;color:#000;text-decoration:none;">';
$BODY.='<input type="radio" name="avatar_size" value="1" id="avatar_size_stretch"'.(($avatar_size==1)?" checked":"").'>';
$BODY.='<b>Stretch to '.$_MEPHIT[avatar_maxWidth].'x'.$_MEPHIT[avatar_maxHeight].' pixel</b><br />
Set width and height of the image to the maximum values allowed.';
//$BODY.='<br /><br />';
$BODY.='</a>';

$BODY.='<a href="javascript:;" onclick="this.blur();document.f_avatar.avatar_size[1].checked=1;" style="display:block;color:#000;text-decoration:none;">';
$BODY.='<input type="radio" name="avatar_size" value="2" id="avatar_size_cut"'.(($avatar_size==2)?" checked":"").'>';
$BODY.='<b>Cut to '.$_MEPHIT[avatar_maxWidth].'x'.$_MEPHIT[avatar_maxHeight].' pixel</b><br />
Cut an area of the image. You can center the area on a point of the image at your coice. Disabled for uploaded avatar.';
$BODY.='</a>';

if($_MEPHIT[gd_enabled]){
	$BODY.='<a href="javascript:;" onclick="this.blur();document.f_avatar.avatar_size[2].checked=1;" style="display:block;color:#000;text-decoration:none;">';
	$BODY.='<input type="radio" name="avatar_size" value="0" id="avatar_size_original"'.(($avatar_size==0)?" checked":"").'>';
	$BODY.='<b>Original size</b><br />
	The image at its original size. ';
	//$BODY.='<br /><br />';
	$BODY.='</a>';
}

$BODY.='</fieldset>';

$BODY.="<script>
sensibleFieldset('fieldset_upload','avatar_type_upload');
sensibleFieldset('fieldset_link','avatar_type_link');
sensibleFieldset('fieldset_standard','avatar_type_standard');
</script>";

$BODY.='<br /><div align="center"><input type="submit" name="avatarChange" class="btn" value="Cambia"></div><br />';
$BODY.='</form>';

require_once("include/dress_dynamic.php");
?>
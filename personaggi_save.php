<?php
$debug=0;
require_once("include/config.php");
$pgID=$_POST[id]*1;
if($debug){
	xmp($_POST);
	xmp($_FILES);
}

$canIedit=$_SESSION[user_type]=="admin"||$_POST[what]=="crea";
$query="SELECT * FROM mephit_personaggio WHERE id_personaggio=".$pgID;
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$autore=$row[autore];
	$canIedit=$canIedit||$_SESSION[user_id]==$autore;
}

if($canIedit){
	$datetime=date("Y-m-d H:i:s");
	$updated=false;
	switch($_POST[what]){
		case"combattimento":
			$queries=array();
			$queries[]="UPDATE mephit_personaggio_equip SET slot_equipped=0 WHERE fk_personaggio=".$pgID;
			for($i=1;$i<20;$i++){
				$possession_id=$_POST["slot-".$i];
				if(is_numeric($possession_id)){
					$queries[]="UPDATE mephit_personaggio_equip SET slot_equipped=".$i." WHERE fk_personaggio=".$pgID." AND possession_id=".$possession_id;
				}
			}
			foreach($queries as $q){
				$result=mysql_query($q);
			}
			$updated=true;
		break;
		case"equipaggiamento":
			$contenitori_post=$_POST[c_id];
			
			$query="SELECT * FROM mephit_personaggio_contenitori WHERE fk_personaggio=".$pgID;
			$result=mysql_query($query);
			$contenitori_db=array();
			while($row=mysql_fetch_assoc($result))$contenitori_db[]=$row[id];
			
			$update=array_intersect($contenitori_post,$contenitori_db);
			$insert=array_diff($contenitori_post,$contenitori_db);
			$delete=array_diff($contenitori_db,$contenitori_post);
			/*
			xmp($update);
			xmp($insert);
			xmp($delete);
			xmp($_POST);
			*/
			// delete
			if(count($delete)>0){
				$query="DELETE FROM mephit_personaggio_contenitori WHERE id IN (".implode(",",$delete).") AND fk_personaggio=".$pgID;
				$result=mysql_query($query);
			}
			
			// update
			if(count($update)>0){
				foreach($update as $id){
					$id=(int)$id;
					$nome=mysql_real_escape_string($_POST[c_nome][$id]);
					$carico=is_numeric($_POST[c_carico][$id])?$_POST[c_carico][$id]:0;
					$xd=$_POST[c_xd][$id]==1?0:1;
					$query="UPDATE mephit_personaggio_contenitori SET nome='".$nome."',carico='".$carico."',xd='".$xd."' WHERE id=".$id." AND fk_personaggio=".$pgID;
					$result=mysql_query($query);
				}
			}
			
			// insert
			$insert_id=array();
			if(count($insert)>0){
				$values=array();
				foreach($insert as $id){
					preg_match('/^(anonymous_element_){0,1}\d+$/',$id,$matches);
					if($matches!=0){
						$nome=mysql_real_escape_string($_POST[c_nome][$id]);
						$carico=is_numeric($_POST[c_carico][$id])?$_POST[c_carico][$id]:0;
						$xd=$_POST[c_xd][$id]==1?0:1;
						$query="INSERT INTO mephit_personaggio_contenitori (fk_personaggio,nome,carico,xd) VALUES (".$pgID.",'".$nome."','".$carico."','".$xd."')";
						$result=mysql_query($query);
						$insert_id[$id]=mysql_insert_id();
					}
				}
			}
			
			$query="DELETE FROM mephit_personaggio_equip WHERE fk_personaggio=".$pgID;
			$result=mysql_query($query);
			$values=array();
			if(isset($_POST[item])){
				foreach($_POST[item] as $i=>$item_id){
					if(strpos($item_id,"w")!==false){
						$type="w";
						$new_item_id=substr($item_id,1);
					}else if(strpos($item_id,"t")!==false){
						$type="t";
						$new_item_id=substr($item_id,1);
					}else{
						$type="";
						$new_item_id=$item_id;
					}
					$possession_id=is_numeric($_POST[possession_id][$i])?$_POST[possession_id][$i]:0;
					$container_id=is_numeric($_POST[container][$i])?$_POST[container][$i]:0;
					$slot=is_numeric($_POST[slot][$i])?$_POST[slot][$i]:0;
					$note=mysql_real_escape_string($_POST[note][$i]);
					$userSize=is_numeric($_POST[userSize][$i])?$_POST[userSize][$i]:0;
					$quantity=is_numeric($_POST[quantity][$i])?$_POST[quantity][$i]:0;
					$values[]="(".$possession_id.",".$userSize.",".$container_id.",".$pgID.",".$new_item_id.",".$quantity.",'".$type."',".$slot.",'".$note."')";
				}
				$query="INSERT INTO
				mephit_personaggio_equip
				(possession_id,fk_userSize,fk_container,fk_personaggio,fk_item,quantity,type,slot_equipped,note)
				VALUES ".implode(",",$values)."";
				$result=mysql_query($query);
				if(!$result)die(mysql_error()."<br>".$query);
			}
			$updated=true;
		break;
		case"talenti":
			$query="DELETE FROM mephit_personaggio_talento WHERE fk_personaggio=".$pgID;
			$result=mysql_query($query);
			$values=array();
			foreach($_POST[level] as $l=>$liv){
				foreach($liv as $f){
					list($feat_id,$relation_id)=explode(",",$f);
					$choice=isset($_POST[choice][$relation_id])?end(explode(",",$_POST[choice][$relation_id])):"NULL";
					$values[]="(".$relation_id.",".$pgID.",".$feat_id.",".$l.",".$choice.",'')";
				}
			}
			$query="INSERT INTO mephit_personaggio_talento (`relation_id`,`fk_personaggio`,`fk_feat`,`liv`,`choice`,`note`) VALUES ".implode(",",$values);
			$result=mysql_query($query);
			$updated=true;
		break;
		case"classi":
			if(is_numeric($pgID)){
				$query="DELETE FROM mephit_personaggio_classe WHERE fk_personaggio=".$pgID;
				$result=mysql_query($query);
				$values=array();
				$i=1;
				foreach($_POST[pgClass] as $c){
					$values[]="(".$pgID.",".$c.",".$i.")";
					$i++;
				}
				$query="INSERT INTO mephit_personaggio_classe (fk_personaggio,fk_classe,liv) VALUES ".implode(",",$values);
				$result=mysql_query($query);
				$updated=true;
			}
		break;
		case"abilita":
			if(is_numeric($pgID)){
				$query="DELETE FROM mephit_personaggio_abilita WHERE fk_personaggio=".$pgID;
				$result=mysql_query($query);
				$values=array();
				$i=1;
				foreach($_POST[pa] as $leppa=>$pa){
					$leppa=explode("-",$leppa);
					$LEP=$leppa[0];
					$skill_id=$leppa[1];
					$values[]="(".$pgID.",".$skill_id.",".$LEP.",".$pa.")";
					$i++;
				}
				$query="INSERT INTO mephit_personaggio_abilita (fk_personaggio,fk_abilita,liv,pa) VALUES ".implode(",",$values);
				$result=mysql_query($query);
				$updated=true;
			}
		break;
		case"razza":
			$checks=array(
				is_numeric($pgID),
				is_numeric($_POST[race]),
				$_POST[sex]=='M'||$_POST[sex]=='F',
			);
			if(!array_search(false,$checks)){
				$size=($_POST[race]==1||$_POST[race]==2)?3:4;
				$query="UPDATE mephit_personaggio SET race=".$_POST[race].",taglia=".$size.",sex='".$_POST[sex]."' WHERE id_personaggio=".$pgID;
				$result=mysql_query($query);
				$updated=true;
			}
		break;
		case"divinita":
			$checks=array(
				is_numeric($pgID),
				is_numeric($_POST[allineamento]),
				is_numeric($_POST[patrono])||$_POST[patrono]=='NULL',
				is_array($_POST[domains])||!isset($_POST[domains]),
			);
			if(!array_search(false,$checks)){
				if(count($_POST[domains])>0)$domains1=$_POST[domains][0];
				if(count($_POST[domains])>1)$domains2=$_POST[domains][1];
				
				$query="UPDATE mephit_personaggio SET divinita='".$_POST[patrono]."',allineamento='".$_POST[allineamento]."'";
				$query.=",domain1=".(isset($domains1)?$domains1:'NULL')."";
				$query.=",domain2=".(isset($domains2)?$domains2:'NULL')."";
				$query.=" WHERE id_personaggio=".$pgID;
				$result=mysql_query($query);
				$updated=true;
			}
		break;
		case"caratteristiche":
			$query="UPDATE mephit_personaggio
			SET
			_for='".($_POST[ability][0]*1)."',
			_des='".($_POST[ability][1]*1)."',
			_cos='".($_POST[ability][2]*1)."',
			_int='".($_POST[ability][3]*1)."',
			_sag='".($_POST[ability][4]*1)."',
			_car='".($_POST[ability][5]*1)."'
			WHERE id_personaggio=".$pgID;
			$result=mysql_query($query);
			
			$query="DELETE FROM mephit_personaggio_caratteristica WHERE fk_personaggio=".$pgID;
			$result=mysql_query($query);
			$values=array();
			for($i=0;$i<count($_POST[lcb]);$i++){
				$lcb=explode("|",$_POST[lcb][$i]);
				$lcb[]=$pgID;
				$values[]="(".implode(",",$lcb).")";
			}
			$query="INSERT INTO mephit_personaggio_caratteristica
			(liv,fk_caratteristica,bonus,fk_personaggio)
			VALUES ".implode(",",$values);
			$result=mysql_query($query);
			
			$query="DELETE FROM mephit_personaggio_caratteristica_m WHERE fk_personaggio=".$pgID;
			$result=mysql_query($query);
			$values=array();
			for($i=0;$i<count($_POST[mhr]);$i++){
				$mhr=explode("|",$_POST[mhr][$i]);
				$mhr[]=$pgID;
				$values[]="(".implode(",",$mhr).")";
			}
			$query="INSERT INTO mephit_personaggio_caratteristica_m
			(fk_caratteristica_m,fk_caratteristica_p,fk_personaggio)
			VALUES ".implode(",",$values);
			$result=mysql_query($query);
			$updated=true;
		break;
		case"descrizione":
			switch($_POST[tipoNome]){
				case"auto":	$name=mysql_real_escape_string(trim($_POST[namesSel]));	break;
				case"man":	$name=mysql_real_escape_string(trim($_POST[names]));	break;
			}
			$query="UPDATE mephit_personaggio";
			$query.=" SET nome='".$name."',";
			$query.=" descrizione='".mysql_real_escape_string(trim($_POST[descrizione]))."',";
			$query.=" occhi='".mysql_real_escape_string(trim($_POST[occhi]))."',";
			$query.=" capelli='".mysql_real_escape_string(trim($_POST[capelli]))."',";
			$query.=" skin='".mysql_real_escape_string(trim($_POST[skin]))."'";
			$query.=" WHERE id_personaggio=".$pgID;
			$result=mysql_query($query);
			$updated=true;
		break;
		case"immagine":
			
			$query="SELECT immagine_stampa FROM mephit_personaggio WHERE id_personaggio=".$pgID;
			$result=mysql_query($query);
			while($row=mysql_fetch_assoc($result)){
				$immagine=$row[immagine_stampa];
			}
			
			$fieldName="userfile";
			$folder_big  =$_MEPHIT[DOCUMENT_ROOT]."/public/users/".$autore.$_MEPHIT[user][folders][pg_printable];
			$folder_small=$_MEPHIT[DOCUMENT_ROOT]."/public/users/".$autore.$_MEPHIT[user][folders][pg_tooltip];
			
			if($_FILES[$fieldName]['error']!=4){
				require_once("include/jure_upload_images.php");
				$image_obj=new jure_upload("replace");
				
				if( $_FILES[$fieldName][error]==0 && $_MEPHIT[gd_enabled] ){
					$size=getimagesize($_FILES[$fieldName][tmp_name]);
					$valid=$size[0]<=$_MEPHIT[pgimage_maxWidth] && $size[1]<=$_MEPHIT[pgimage_maxHeight];
					$skip=false;
				}else{
					$valid=false;
					$skip=true;
				}
				if( $valid || $skip ){
					$image_obj->addFile($fieldName,$folder_big,"images");
					$image_obj->upload();
					$upload_message="";
					if($image_obj->isValid()){
						//$upload_message="Immagine modificata correttamente";
					}else{
						$upload_message.=$image_obj->showResultDetails();
					}
				}else{
					$upload_message="ERRORE: le dimensioni massime sono ".$_MEPHIT[pgimage_maxWidth]."x".$_MEPHIT[pgimage_maxHeight]." pixel";
				}
				
				if(isset($upload_message)&&$upload_message!=""){
					echo'<div style="text-align:center;">';
					echo'<div style="padding:1em;margin:1em 0;border:1px solid #999;color:red;font:bold 16pt arial;">'.$upload_message.'</div>';
					echo'<a href="personaggi.php?id='.$pgID.'&what=immagine">Indietro</a>';
					echo' &nbsp; ';
					echo'<a href="personaggi.php?id='.$pgID.'">Continua</a>';
					echo'</div>';
					exit;
				}
				
				$estensione = explode(".",$_FILES[$fieldName][name]);
				$estensione = strtolower($estensione[count($estensione)-1]);
				$nomefile   = substr($_FILES[$fieldName][name],0,strrpos($_FILES[$fieldName][name],"."));
				$thumbnail  = $nomefile.".jpg";
				$resized = false ;
				
				$w = (int) $_MEPHIT[pgthumb_maxWidth] ;	// importatnte: ottenere tipo int
				$h = (int) $_MEPHIT[pgthumb_maxHeight];	// importatnte: ottenere tipo int
				
				$coord=array();
				$coord[x1] = (int) $size[1]>=$size[0] ? 0 : ($size[1]-$size[0])/2 ;
				$coord[y1] = (int) $size[0]>=$size[1] ? 0 : ($size[0]-$size[1])/2 ;
				$coord[x2] = (int) $size[1]>=$size[0] ? $size[0] : $coord[x1]+$size[0] ;
				$coord[y2] = (int) $size[0]>=$size[1] ? $size[1] : $coord[y1]+$size[1] ;
				
				require_once('include/Image_Toolbox.class.php');
				$img = new Image_Toolbox($folder_big."/".$_FILES[$fieldName][name]);
				$img->newOutputSize($w,$h,1);
				$img->save($folder_small."/".$thumbnail,"jpg");
				chmod($folder_small."/".$thumbnail,0777);
				$resized = true ;
				
				$query="UPDATE mephit_personaggio";
				$query.=" SET coordinate_tooltip='".implode(",",$coord)."',";
				$query.=" immagine_stampa='".$_FILES[$fieldName][name]."'";
				$query.=" WHERE id_personaggio=".$pgID;
				$result=mysql_query($query);
				$updated=true;
				
			}else{
				
				$estensione = explode(".",$immagine);
				$estensione = strtolower($estensione[count($estensione)-1]);
				$nomefile   = substr($immagine,0,strrpos($immagine,"."));
				$thumbnail  = $nomefile.".jpg";
				$size = getimagesize($folder_big."/".$immagine);
				@unlink($folder_small."/".$thumbnail);
				
				switch(strtolower($estensione)){
					case"jpg":	$src_image=imagecreatefromjpeg($folder_big."/".$immagine);	break;
					case"gif":	$src_image=imagecreatefromgif($folder_big."/".$immagine);	break;
					case"png":	$src_image=imagecreatefrompng($folder_big."/".$immagine);	break;
				}
				
				$dst_image = imagecreatetruecolor($_MEPHIT[pgthumb_maxWidth], $_MEPHIT[pgthumb_maxHeight]);
				
				$coordinate=array(
					(int)$_POST[x1],
					(int)$_POST[y1],
					(int)$_POST[x2],
					(int)$_POST[y2],
				);
				
				imagecopyresampled(
					$dst_image,
					$src_image,
					0,//$dst_x,
					0,//$dst_y,
					$coordinate[0],//$src_x,
					$coordinate[1],//$src_y,
					$_MEPHIT[pgthumb_maxWidth],//$dst_w,
					$_MEPHIT[pgthumb_maxHeight],//$dst_h,
					$coordinate[2]-$coordinate[0],//$src_w,
					$coordinate[3]-$coordinate[1] //$src_h,
				);
				
				imagejpeg($dst_image,$folder_small."/".$thumbnail,80);
				
				$query="UPDATE mephit_personaggio";
				$query.=" SET coordinate_tooltip='".implode(",",$coordinate)."'";
				$query.=" WHERE id_personaggio=".$pgID;
				$result=mysql_query($query);
				$updated=true;
				
			}
			
			if(!$debug){
				header("location: personaggi.php?id=".$pgID."&what=".$_POST[what]);
				exit;
			}
			
		break;
		case"crea":
			require_once("include/functions_ogl.php");
			require_once("include/functions_dnd.php");
			require_once("include/functions_mephit.php");
			$valid=true;
			switch($_POST[metodo]){
				case"standard":
					$d=array();$p=array(0,0,0,0,0,0);$m=array(0,0,0,0,0,0);
					while(array_sum($m)<1&&max($p)<14){
						if($d=@file("http://www.random.org/integers/?num=24&min=1&max=6&col=1&base=10&format=plain&rnd=new")){
							@mail('www.mephit.it@gmail.com','random.org ok - crea pg standard','','From:jure@mephit.it');
							$p=array(
								"_str"=>array($d[0],$d[1],$d[2],$d[3]),
								"_dex"=>array($d[4],$d[5],$d[6],$d[7]),
								"_con"=>array($d[8],$d[9],$d[10],$d[11]),
								"_int"=>array($d[12],$d[13],$d[14],$d[15]),
								"_wis"=>array($d[16],$d[17],$d[18],$d[19]),
								"_cha"=>array($d[20],$d[21],$d[22],$d[23]),
							);
							foreach($p as $k=>$v){
								sort($p[$k]);
								$p[$k]=array_sum(array_splice($p[$k],1-count($p[$k])));
							}
						}else{
							@mail('www.mephit.it@gmail.com','random.org ko - crea pg standard','','From:jure@mephit.it');
							$p=array(
								"_str"=>mephit_roll(),"_dex"=>mephit_roll(),"_con"=>mephit_roll(),
								"_int"=>mephit_roll(),"_wis"=>mephit_roll(),"_cha"=>mephit_roll(),
							);
						}
						$m=array(
							"_str"=>M($p[_str])*1,"_dex"=>M($p[_dex])*1,"_con"=>M($p[_con])*1,
							"_int"=>M($p[_int])*1,"_wis"=>M($p[_wis])*1,"_cha"=>M($p[_cha])*1,
						);
					}
				break;
				case"mephit":
					$d=array();$p=array(0,0,0,0,0,0);$m=array(0,0,0,0,0,0);
					while(array_sum($m)<1&&max($p)<14){
						if($d=@file("http://www.random.org/integers/?num=24&min=2&max=6&col=1&base=10&format=plain&rnd=new")){
							@mail('www.mephit.it@gmail.com','random.org ok - crea pg mephit','','From:jure@mephit.it');
							$p=array(
								"_str"=>array($d[0],$d[1],$d[2],$d[3]),
								"_dex"=>array($d[4],$d[5],$d[6],$d[7]),
								"_con"=>array($d[8],$d[9],$d[10],$d[11]),
								"_int"=>array($d[12],$d[13],$d[14],$d[15]),
								"_wis"=>array($d[16],$d[17],$d[18],$d[19]),
								"_cha"=>array($d[20],$d[21],$d[22],$d[23]),
							);
							foreach($p as $k=>$v){
								sort($p[$k]);
								$p[$k]=array_sum(array_splice($p[$k],1-count($p[$k])));
							}
						}else{
							@mail('www.mephit.it@gmail.com','random.org ko - crea pg mephit','','From:jure@mephit.it');
							$p=array(
								"_str"=>mephit_roll(),"_dex"=>mephit_roll(),"_con"=>mephit_roll(),
								"_int"=>mephit_roll(),"_wis"=>mephit_roll(),"_cha"=>mephit_roll(),
							);
						}
						$m=array(
							"_str"=>M($p[_str])*1,"_dex"=>M($p[_dex])*1,"_con"=>M($p[_con])*1,
							"_int"=>M($p[_int])*1,"_wis"=>M($p[_wis])*1,"_cha"=>M($p[_cha])*1,
						);
					}
				break;
				case"free":
						$p=array(
							"_str"=>10,"_dex"=>10,"_con"=>10,
							"_int"=>10,"_wis"=>10,"_cha"=>10,
						);
				break;
				default:
					$valid=false;
				break;
			}
			if($valid){
				switch($_POST[tipoNome]){
					case"auto":	$name=mysql_real_escape_string(trim($_POST[namesSel]));	break;
					case"man":	$name=mysql_real_escape_string(trim($_POST[names]));	break;
				}
				$query="INSERT INTO mephit_personaggio (
					`_for`,`_des`,`_cos`,
					`_int`,`_sag`,`_car`,
					`nome`,
					`autore`,
					`metodo`,
					`descrizione`,
					`date_upd`,
					`date_ins`
				) VALUES (
					'".$p[_str]."','".$p[_dex]."','".$p[_con]."',
					'".$p[_int]."','".$p[_wis]."','".$p[_cha]."',
					'".$name."',
					'".$_SESSION[user_id]."',
					'".$_POST[metodo]."',
					'',
					'".$datetime."',
					'".$datetime."'
				)";
				$result=mysql_query($query);
				$pgID=mysql_insert_id($conn);
				$query="INSERT INTO mephit_personaggio_contenitori (
					fk_personaggio,nome,xd,editabile
				) VALUES (
					'".$pgID."','".addslashes($_LANG["bag_carried_items"])."',0,0
				),(
					'".$pgID."','".addslashes($_LANG["bag_owned_items"])."',1,0
				)";
				$result=mysql_query($query);
			}
			//$updated=false;
		break;
		default:
			//$updated=false;
		break;
	}
	if($updated){
		$query="UPDATE mephit_personaggio SET date_upd='".$datetime."' WHERE id_personaggio=".$pgID;
		mysql_query($query);
	}
}
if(!$debug)header("location: personaggi.php?id=".$pgID);
?>

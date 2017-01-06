<?php
require_once("include/config.php");
$advID=$_POST[id]*1;
if(isset($_POST[luogo]))$luogo=$_POST[luogo]*1;
if(isset($_POST[luogo]))$gruppo=$_POST[gruppo]*1;
if(isset($_POST[item]))$item=$_POST[item]*1;
if(isset($_POST[arr])){
	$arr=array();
	foreach($_POST[arr] as $k=>$v){
		if(!is_array($v)){
			$arr[$k]=$v*1;
		}else{
			$arr[$k]=array();
			foreach($v as $kk=>$vv){
				$arr[$k][$kk]=$vv*1;
			}
		}
	}
}


$query="SELECT * FROM mephit_avventura WHERE id_avventura=".$advID;
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$avv=$row;
}

function torna($id,$place){
	$location="avventura.php";
	$location.="?id=".$id;
	$location.="&what=".$_POST[what];
	if($_POST[act]=="addluogo"||$_POST[act]=="editluogo"||$_POST[act]=="delluogo"||$_POST[act]=="updatemapluogo"){
		$location.="&luogo=".$place;
	}
	header("location: ".$location);
	exit;
}

// azioni del master

if($avv[fk_master]==$_SESSION[user_id]||$_SESSION[user]=="jure"){
	switch($_POST[what]){
		case"map":
			switch($_POST[act]){
				case"addluogo":
					$name=$_POST[name];
					$query="INSERT INTO mephit_map_group (nome,fk_avventura) VALUES ('".$name."',".$advID.")";
					$result=mysql_query($query);
					$luogo=mysql_insert_id($conn);
				break;
				case"editluogo":
					
					$idEdit=$_POST[idEdit]*1;
					$nameEdit=$_POST[nameEdit];
					$query="UPDATE mephit_map_group SET nome='".$nameEdit."' WHERE id=".$idEdit;
					$result=mysql_query($query);
					
				break;
				case"delluogo":
					
					$idDel=$_POST[idDel]*1;
					
					if($luogo==$idDel){
						$query="SELECT id FROM mephit_map_group WHERE parent_id IS NULL ORDER BY nome";
						$result=mysql_query($query);
						$q=mysql_num_rows($result);
						if($q>1){
							$groups=array();
							while($row=mysql_fetch_row($result))$groups[]=$row[0];
							$i=array_search($idDel,$groups);
							$luogo_new=isset($groups[$i+1])?$groups[$i+1]:$groups[$i-1];
						}else{
							$luogo_new=0;
						}
					}else{
						$luogo_new=$luogo;
					}
					
					$mapFolder=$_MEPHIT[ROOT].'/public/users/'.$avv[fk_master].'/map';
					$query2="SELECT * FROM mephit_map_image WHERE fk_map_group=".$idDel;
					$result2=mysql_query($query2);
					while($row2=mysql_fetch_assoc($result2)){
						unlink($mapFolder."/".$row2[filename]);
					}
					
					$query2="DELETE FROM mephit_map_image WHERE fk_map_group=".$idDel;
					$result2=mysql_query($query2);
					
					$query2="DELETE FROM mephit_map_group WHERE parent_id=".$idDel." OR id=".$idDel;
					$result2=mysql_query($query2);
					
					$luogo=$luogo_new;
					
				break;
				case"updatemapluogo":
					
					$fields=array(
						"`width`='".($_POST[width]*1)."'",
						"`height`='".($_POST[height]*1)."'",
						"`top`='".($_POST[top]*10)."'",
						"`left`='".($_POST[left]*10)."'",
						"`side`='".($_POST[side]*10)."'",
						"`border`='".($_POST[border]*1)."'",
					);
					$query="UPDATE mephit_map_image SET ".implode(",",$fields)." WHERE id=".$item;
					$result=mysql_query($query);
					
				break;
				case"updategruppoluogo":
					
					$rowsNEW=array();
					foreach($arr as $x=>$row)foreach($row as $y=>$id){
						$rowsNEW[]=array("id"=>$id."","x"=>$x."","y"=>$y."");
					}
					
					$rowsOLD=array();
					$query="SELECT id,x,y FROM mephit_map_image WHERE fk_map_group=".$gruppo;
					$result=mysql_query($query);
					while($row=mysql_fetch_assoc($result)){
						$rowsOLD[]=array("id"=>$row[id]."","x"=>$row[x]."","y"=>$row[y]."");
					}
					
					$queries=compareRecords($rowsNEW,$rowsOLD,"id");
					$updateGroupSize=false;
					
					if(count($queries["delete"])>0){
						$myids=array();
						foreach($queries["delete"] as $row)$myids[]=$row[id];
						
						$result=mysql_query("SELECT * FROM mephit_map_image WHERE id IN (".implode(",",$myids).") AND fk_map_group=".$gruppo);
						while($row=mysql_fetch_assoc($result)){
							if($row[filename]!="")unlink($_MEPHIT[DOCUMENT_ROOT].'/public/users/'.$avv[fk_master].'/map/'.$row[filename]);
						}
						
						$result=mysql_query("DELETE FROM mephit_map_image WHERE id IN (".implode(",",$myids).") AND fk_map_group=".$gruppo);
						$updateGroupSize=true;
					}
					
					if(count($queries["insert"])>0){
						$fields=array();$values=array();$i=0;
						foreach($queries["insert"] as $row){
							$row["fk_map_group"]=$gruppo;
							if($i==0)$fields=array_keys($row);
							$values[]=implode_single($row);
							$i++;
						}
						$result=mysql_query("INSERT INTO mephit_map_image (`".implode("`,`",$fields)."`) VALUES (".implode("),(",$values).")");
						$updateGroupSize=true;
					}
					
					if(count($queries["update"])>0){
						foreach($queries["update"] as $row){
							$q="UPDATE mephit_map_image SET ";
							$fields=array();
							foreach($row as $k=>$v)$fields[]="`".mysql_real_escape_string($k)."`='".mysql_real_escape_string($v)."'";
							$q.=implode(",",$fields)." WHERE id='".$row[id]."' AND fk_map_group=".$gruppo;
							$result=mysql_query($q);
							$updateGroupSize=true;
						}
					}
					
					if($updateGroupSize){
						if(is_numeric($_POST[width])&&is_numeric($_POST[height])){
							$result=mysql_query("UPDATE mephit_map_group SET width=".$_POST[width].",height=".$_POST[height]." WHERE id=".$gruppo);
						}
					}
					
				break;
			}
			
		break;
		case"crea":
			$user_max_adv=$_MEPHIT[user][permission][$_SESSION[user_type]][max_adv];
			
			if($user_max_adv<0){
				$continue=true;
			}else{
				$query="SELECT * FROM mephit_avventura WHERE fk_master=".$_SESSION[user_id];
				$result=mysql_query($query);
				$continue=mysql_num_rows($result)<$user_max_adv;
			}
			
			if(!$continue){
				$BODY.=$_LANG[too_many_adv];
			}else{
						
				$master=$_POST[master]*1;
				$query="INSERT INTO mephit_avventura (
					nome,
					fk_master,
					fk_gilda,
					trama,
					eventi,
					home,
					png,
					note,
					ambientazione,
					note_pubbliche,
					note_private
				) VALUES (
					'".$_POST[name]."',
					'".$_SESSION[user_id]."',
					".(is_numeric($_POST[gilda])&&$_POST[gilda]*1>0?"'".$_POST[gilda]."'":"NULL").",
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					''
				)";
				$result=mysql_query($query);
				$advID=mysql_insert_id($conn);
				$continue=false;
				
			}
		break;
		default:
			$continue=true;
		break;
	}
}

if(!$continue)torna($advID,$luogo);

// azioni di tutti gli utenti

$allowed=array_keys(getAdventureMembers($advID));
$query="SELECT * FROM mephit_avventura WHERE id_avventura=".$advID;
$result=mysql_query($query);
$GM=NULL;$isGM=false;
while($row=mysql_fetch_assoc($result)){
	$GM=$row[fk_master];
	$isGM=$_SESSION[user_id]==$GM;
}
$allowed[]=$GM;
$continue=in_array($_SESSION[user_id],$allowed);

if(!$continue)torna($advID,$luogo);

switch($_POST[what]){
	case"pg":
		switch($_POST[act]){
			case"scegli":
				$query="SELECT * FROM mephit_personaggio WHERE fk_avventura=".$advID." AND autore=".$_SESSION[user_id];
				$result=mysql_query($query);
				if(mysql_num_rows($result)<2){
					$mypg=$_POST[mypg]*1;
					$query="UPDATE mephit_personaggio SET fk_avventura=NULL WHERE fk_avventura=".$advID." AND autore = ".$_SESSION[user_id]."";
					$result=mysql_query($query);
					if(!$result)die("<div>".mysql_error()."<br>".$query."<br><br></div>");
					$query="UPDATE mephit_personaggio SET fk_avventura=".$advID." WHERE id_personaggio=".$_POST[mypg]." AND autore = ".$_SESSION[user_id]."";
					$result=mysql_query($query);
					if(!$result)die("<div>".mysql_error()."<br>".$query."<br><br></div>");
				}
			break;
			case"rimuovi":
				if(count($_POST[rimuovi])>0){
					$rimuovi=array();
					foreach($_POST[rimuovi] as $k=>$v)$rimuovi[]=$v*1;
					$rimuovi=array_filter($rimuovi);
					$query="DELETE FROM mephit_giocatore_avventura WHERE fk_avventura=".$advID." AND fk_giocatore IN (".implode(",",$_POST[rimuovi]).")";
					$result=mysql_query($query);
					if(!$result)die("<div>".mysql_error()."<br>".$query."<br><br></div>");
					$query="UPDATE mephit_personaggio SET fk_avventura=NULL WHERE fk_avventura=".$advID." AND autore IN (".implode(",",$_POST[rimuovi]).")";
					$result=mysql_query($query);
					if(!$result)die("<div>".mysql_error()."<br>".$query."<br><br></div>");
				}
			break;
			case"rimuovipg":
				if(count($_POST[rimuovipg])>0){
					$rimuovi=array();
					foreach($_POST[rimuovipg] as $k=>$v)$rimuovi[]=$v*1;
					$rimuovi=array_filter($rimuovi);
					$query="UPDATE mephit_personaggio SET fk_avventura=NULL WHERE id_personaggio IN (".implode(",",$rimuovi).")";
					$result=mysql_query($query);
					if(!$result)die("<div>".mysql_error()."<br>".$query."<br><br></div>");
				}
			break;
		}
	break;
	case"ingame":
		switch($_POST[act]){
			case"post":
				
					$query="SELECT id_personaggio FROM mephit_personaggio WHERE fk_avventura=".$advID." AND autore=".$_SESSION[user_id];
					$result=mysql_query($query);
					if(mysql_num_rows($result)>0){
						while($row=mysql_fetch_assoc($result)){
							$myPG=$row[id_personaggio];
						}
					}else $myPG=NULL;
					if($_SESSION[user_id]!=$GM&&is_null($myPG)){
						echo 'NO PG SELECTED';
					}else{
						$text=$_POST[post];
						// not allowed
						$text=str_replace("[roll-q]","&#91;roll-q&#93;",$text);
						$text=str_replace("[/roll-q]","&#91;/roll-q&#93;",$text);
						$text=str_replace("[roll-c]","&#91;roll-c&#93;",$text);
						$text=str_replace("[/roll-c]","&#91;/roll-c&#93;",$text);
						// start roll
						$roll_regexp="/\[roll\]([0-9d\(\)\+\-\*\/]*)\[\/roll\]/m";
						preg_match_all($roll_regexp,$text,$out);
						$rolls_original=$out[1];
						if(count($rolls_original)>0){
							$rolls=$rolls_original;
							$dices=array();
							foreach($rolls_original as $roll){
								preg_match_all("/[0-9]+d[0-9]+/",$roll,$out);
								foreach($out[0] as $dd){
									$d=explode("d",$dd);
									for($i=0;$i<$d[0];$i++){
										$dices[]=$d[1];
									}
								}
							}
							$dices_results=quanticRoll($dices);
							$i=0;
							foreach($rolls as $k=>$roll){
								preg_match_all("/[0-9]+d[0-9]+/",$roll,$out);
								foreach($out[0] as $dd){
									$d=explode("d",$dd);
									$results=array();
									for($j=0;$j<$d[0];$j++,$i++){
										$results[]=$dices_results[result][$i];
									}
									$rolls[$k]=preg_replace("/[0-9]+d[0-9]+/","(".implode("+",$results).")",$rolls[$k],1);
								}
								$rr='';
								eval("\$r=".$rolls[$k].";");
								if($dices_results[quantic]){
									$rr.='[roll-q]';
									$rr.=$r.' = '.$rolls_original[$k].' = '.$rolls[$k];
									$rr.='[/roll-q]';
								}else{
									$rr.='[roll-n]';
									$rr.=$r.' = '.$rolls_original[$k].' = '.$rolls[$k];
									$rr.='[/roll-n]';
								}
								$text=preg_replace($roll_regexp,$rr,$text,1);
							}
						}
						// end roll
						$d=date("Y-m-d H:i:s");
						$query2="INSERT INTO mephit_avventura_forum (data_upd,data_ins,text,fk_avventura,fk_giocatore,fk_personaggio,tipo) VALUES ("
						."'".$d."'".","
						."'".$d."'".","
						."'".$text."',"
						.$advID.","
						.$_SESSION[user_id].","
						.(is_null($myPG)?'NULL':$myPG).","
						."'pbf'"
						.")";
						mysql_query($query2);
					}
				
			break;
		}
	break;
	case"public":
		switch($_POST[act]){
			case"note-public":
				if($isGM){
					$query="UPDATE mephit_avventura SET note_pubbliche='".$_POST[text]."' WHERE id_avventura=".$advID;
				}else{
					$query="UPDATE mephit_giocatore_avventura SET note_pubbliche='".$_POST[text]."' WHERE fk_avventura=".$advID." AND fk_giocatore=".$_SESSION[user_id];
				}
				$result=mysql_query($query);
			break;
		}
	break;
	case"private":
		switch($_POST[act]){
			case"note-private":
				if($isGM){
					$query="UPDATE mephit_avventura SET note_private='".$_POST[text]."' WHERE id_avventura=".$advID;
				}else{
					$query="UPDATE mephit_giocatore_avventura SET note_private='".$_POST[text]."' WHERE fk_avventura=".$advID." AND fk_giocatore=".$_SESSION[user_id];
				}
				$result=mysql_query($query);
			break;
		}
	break;
}
torna($advID,$luogo);
?>

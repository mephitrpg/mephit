<?php
require_once("include/config.php");
$classID=$_POST[id]*1;

function torna($id){
	$location="classe.php";
	$location.="?id=".$id;
	header("location: ".$location);
	exit;
}

// azioni del master

if($avv[fk_master]==$_SESSION[user_id]||$_SESSION[user]=="jure"){
	switch($_POST[what]){
		case"crea":
			$user_max_class=$_MEPHIT[user][permission][$_SESSION[user_type]][max_class];
			
			if($user_max_class<0){
				$continue=true;
			}else{
				$query="SELECT * FROM mephit_class WHERE fk_giocatore=".$_SESSION[user_id];
				$result=mysql_query($query);
				$continue=mysql_num_rows($result)<$user_max_class;
			}
			
			if(!$continue){
				$BODY.=$_LANG[too_many_classes];
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

torna($classIDID);
?>

<?php
require_once("include/config.php");
require_once("include/dress.php");

$BODY="";

if($_SESSION[user_id]!=$_GET[id]){
	switch($_GET[what]){
		case"amico":
			$smarty->assign('title',$_LANG[friends]);
			$nick=htmlspecialchars(getNick($_GET[from]));
			$PATH='<a href="giocatori.php">'.$_LANG[players].'</a> &raquo; <a href="giocatori.php?id='.$_GET[id].'">'.$nick.'</a>';
			$TAB1='community';

			$query="
				SELECT * FROM mephit_community_request
				WHERE 1
				AND fk_mitt=".$_SESSION[user_id]."
				AND fk_dest=".$_GET[id]."
				AND fk_app=0
				AND tipo='amico'
			";
			$result=mysql_query($query);
			if(mysql_num_rows($result)==0){
				$amici=getFriends();
				if(!in_array($_GET[id],$amici)){
					$query="INSERT INTO mephit_community_request (fk_mitt,fk_dest,fk_app,tipo) VALUES (".$_SESSION[user_id].",".$_GET[id].",0,'amico')";
					$result=mysql_query($query);
					if($result)$BODY.="Richiesta inviata";
					else $BODY.="ERRORE: Richiesta non inviata";
				}else{
					$BODY="Sei gi&agrave; amico di questo utente";
				}
			}else{
				$BODY="Hai gi&agrave; chiesto l'amicizia a questo utente.";
			}
			$BODY.='<br><br>';
			$BODY.=navButton("Vai al profilo di ".$nick,"giocatori.php?id=".$_GET[id]);
		break;
		case"gruppo":
			$smarty->assign('title',$_LANG[groups]);
			$groupName=htmlspecialchars(getGuildName($_GET[id]));
			$PATH='<a href="gruppi.php">'.$_LANG[gruppi].'</a> &raquo; <a href="gruppi.php?id='.$_GET[id].'">'.$groupName.'</a>';
			$TAB1='community';
			
			$query="
				SELECT * FROM mephit_community_request
				WHERE 1
				AND fk_mitt=".$_SESSION[user_id]."
				AND fk_dest=".$_GET[id]."
				AND fk_app=0
				AND tipo='".$_GET[what]."'
			";
			$result=mysql_query($query);
			if(mysql_num_rows($result)==0){
				$gruppi=array_keys(getGroups());
				if(!in_array($_GET[id],$gruppi)){
					$query="INSERT INTO mephit_community_request (fk_mitt,fk_dest,fk_app,tipo) VALUES (".$_SESSION[user_id].",".$_GET[id].",0,'".$_GET[what]."')";
					$result=mysql_query($query);
					if($result)$BODY.="Richiesta inviata";
					else $BODY.="ERRORE: Richiesta non inviata";
				}else{
					$BODY="Sei gi&agrave; iscritto a questo gruppo";
				}
			}else{
				$BODY="Hai gi&agrave; chiesto l'iscrizione a questo gruppo.";
			}
			$BODY.='<br><br>';
			$BODY.=navButton("Vai al gruppo ".$groupName,"gruppi.php?id=".$_GET[id]);
		break;
		case"gilda":
			$smarty->assign('title',$_LANG[guilds]);
			$groupName=htmlspecialchars(getGuildName($_GET[id]));
			$PATH='<a href="gilda.php">'.$_LANG[guilds].'</a> &raquo; <a href="gilde.php?id='.$_GET[id].'">'.$groupName.'</a>';
			$TAB1='community';
			
			$query="
				SELECT * FROM mephit_community_request
				WHERE 1
				AND fk_mitt=".$_SESSION[user_id]."
				AND fk_dest=".$_GET[id]."
				AND fk_app=0
				AND tipo='".$_GET[what]."'
			";
			$result=mysql_query($query);
			if(mysql_num_rows($result)==0){
				$gruppi=array_keys(getGuilds());
				if(!in_array($_GET[id],$gruppi)){
					$query="INSERT INTO mephit_community_request (fk_mitt,fk_dest,fk_app,tipo) VALUES (".$_SESSION[user_id].",".$_GET[id].",0,'".$_GET[what]."')";
					$result=mysql_query($query);
					if($result)$BODY.="Richiesta inviata";
					else $BODY.="ERRORE: Richiesta non inviata";
				}else{
					$BODY="Sei gi&agrave; iscritto a questa gilda";
				}
			}else{
				$BODY="Hai gi&agrave; chiesto l'iscrizione a questa gilda.";
			}
			$BODY.='<br><br>';
			$BODY.=navButton("Vai alla gilda ".$groupName,"gilde.php?id=".$_GET[id]);
		break;
		default:
			$BODY="ERRORE: Richiesta non valida.";
		break;
		case"avventura":
			$smarty->assign('title',$_LANG[adventures]);
			$adventureName=htmlspecialchars(getAdventureName($_GET[app]*1));
			$PATH='<a href="avventura.php">'.$_LANG[adventures].'</a> &raquo; <a href="avventura.php?id='.$_GET[id].'">'.$adventureName.'</a>';
			$TAB1='risorse';
			
			$app=is_numeric($_GET[app])?$_GET[app]:0;
			$query="
				SELECT * FROM mephit_community_request
				WHERE 1
				AND fk_mitt=".$_SESSION[user_id]."
				AND fk_dest=".$_GET[id]."
				AND fk_app=".$app."
				AND tipo='".$_GET[what]."'
			";
			$result=mysql_query($query);
			if(mysql_num_rows($result)==0){
				$avventure=array_keys(getAdventuresAsAdmin());
				if(in_array($_GET[app],$avventure)){
					$query="INSERT INTO mephit_community_request (fk_mitt,fk_dest,fk_app,tipo) VALUES (".$_SESSION[user_id].",".$_GET[id].",".$_GET[app].",'".$_GET[what]."')";
					$result=mysql_query($query);
					if($result)$BODY.="Richiesta inviata";
					else $BODY.="ERRORE: Richiesta non inviata";
				}else{
					$BODY="Non puoi madare inviti per questa avventura";
				}
			}else{
				$BODY='Hai gi&agrave; chiesto a <a href="giocatori.php?id='.$_GET[id].'">'.htmlspecialchars(getNick($_GET[id])).'</a> di iscriversi a questa avventura.';
			}
			$BODY.='<br><br>';
			$BODY.=navButton("Vai all'avventura ".$adventureName,"avventura.php?id=".($_GET[app]*1));
		break;
	}
}else{
	$BODY="ERRORE: Richiesta non valida.";
}

require_once("include/dress_dynamic.php");
?>

<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG[notices]);

$BODY="";

switch($_GET[what]){
	case"amico":
		$nick=htmlspecialchars(getNick($_GET[from]));
		$PATH='<a href="giocatori.php">'.$_LANG[players].'</a> &raquo; <a href="giocatori.php?id='.$_GET[id].'">'.$nick.'</a>';
		$smarty->assign('title',$_LANG[friends]);
		$TAB1='community';
		
		$amici=getFriends();
		if(!in_array($_GET[id],$amici)){
			$BODY.='Non sei amico di <a href="giocatori.php?id='.$_GET[id].'">'.$nick.'</a>';
		}else{
			$query2="
			DELETE FROM mephit_giocatore_amico WHERE 
			   (fk_giocatore1=".$_SESSION[user_id]." AND fk_giocatore2=".$_GET[id].")
			OR (fk_giocatore1=".$_GET[id]." AND fk_giocatore2=".$_SESSION[user_id].")
			";
			$result2=mysql_query($query2);
			if($result2)$BODY.='Non sei pi&ugrave; amico di <a href="giocatori.php?id='.$_GET[id].'">'.$nick.'</a>';
			else $BODY.='ERRORE: Richiesta non inviata';
		}
		
		$BODY.='<br><br>';
		$BODY.=navButton("Vai al profilo di ".$nick,"giocatori.php?id=".$_GET[id]);
	break;
	case"gruppo":
		$smarty->assign('title',$_LANG[groups]);
		$groupName=htmlspecialchars(getGroupName($_GET[id]));
		$PATH='<a href="gruppi.php">'.$_LANG[groups].'</a> &raquo; <a href="gruppi.php?id='.$_GET[id].'">'.$groupName.'</a>';
		$TAB1='community';
		
		$gruppi=getGroupsAsMember();
		if(in_array($_GET[id],array_keys($gruppi))){
			$query2="
			DELETE FROM mephit_giocatore_gruppo WHERE 
				fk_giocatore=".$_SESSION[user_id]."
				AND fk_gruppo=".$_GET[id]."
			";
			$result2=mysql_query($query2);
			if($result2)$BODY.='Sei uscito dal gruppo <a href="gruppi.php?id='.$_GET[id].'">'.$groupName.'</a>';
			else $BODY.='ERRORE: Richiesta non inviata';
		}else{
			$BODY.='Non sei membro del gruppo <a href="gruppi.php?id='.$_GET[id].'">'.$groupName.'</a>';
		}
		
		$BODY.='<br><br>';
		$BODY.=navButton("Vai al gruppo ".$groupName,"gruppi.php?id=".$_GET[id]);
	break;
	case"gilda":
		$smarty->assign('title',$_LANG[guilds]);
		$guildName=htmlspecialchars(getGuildName($_GET[id]));
		$PATH='<a href="gilde.php">'.$_LANG[guilds].'</a> &raquo; <a href="gilde.php?id='.$_GET[id].'">'.$groupName.'</a>';
		$TAB1='community';
		
		$gilde=getGuildsAsMember();
		if(in_array($_GET[id],array_keys($gilde))){
			$query2="
			DELETE FROM mephit_giocatore_gilda WHERE 
				fk_giocatore=".$_SESSION[user_id]."
				AND fk_gilda=".$_GET[id]."
			";
			$result2=mysql_query($query2);
			if($result2)$BODY.='Sei uscito dalla gilda <a href="gilde.php?id='.$_GET[id].'">'.$guildName.'</a>';
			else $BODY.='ERRORE: Richiesta non inviata';
		}else{
			$BODY.='Non sei membro della gilda <a href="gilde.php?id='.$_GET[id].'">'.$guildName.'</a>';
		}
		
		$BODY.='<br><br>';
		$BODY.=navButton("Vai alla gilda ".$guildName,"gilde.php?id=".$_GET[id]);
	break;
	case"avventura":
		$smarty->assign('title',$_LANG[adventures]);
		$adventureName=htmlspecialchars(getAdventureName($_GET[id]));
		$PATH='<a href="avventura.php">'.$_LANG[adventures].'</a> &raquo; <a href="avventura.php?id='.$_GET[id].'">'.$adventureName.'</a>';
		$TAB1='risorse';
		
		$avventure=getAdventuresAsMember();
		if(in_array($_GET[id],array_keys($avventure))){
			$query2="
			DELETE FROM mephit_giocatore_avventura WHERE 
				fk_giocatore=".$_SESSION[user_id]."
				AND fk_avventura=".$_GET[id]."
			";
			$result2=mysql_query($query2);
			if($result2)$BODY.='Sei uscito dall\'avventura <a href="avventura.php?id='.$_GET[id].'">'.$adventureName.'</a>';
			else $BODY.='ERRORE: Richiesta non inviata';
		}else{
			$BODY.='Non sei membro dell\'avventura <a href="avventura.php?id='.$_GET[id].'">'.$adventureName.'</a>';
		}
		
		$BODY.='<br><br>';
		$BODY.=navButton("Vai all\'avventura ".$adventureName,"avventura.php?id=".$_GET[id]);
	break;
	default:
		$BODY.="ERRORE: Richiesta non valida";
	break;
}

require_once("include/dress_dynamic.php");
?>

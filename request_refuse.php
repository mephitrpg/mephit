<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG[notices]);

$BODY="";

$PATH='<a href="my_mephit.php">'.$_LANG[my_mephit].'</a> &raquo; <a href="my_notices.php">'.$_LANG[notices].'</a>';
$TAB1='my';

$nick=htmlspecialchars(getNick($_GET[from]));

switch($_GET[what]){
	case"amico":
		$query="
			SELECT * FROM mephit_community_request
			WHERE 1
			AND fk_mitt=".$_GET[from]."
			AND fk_dest=".$_SESSION[user_id]."
			AND fk_app=0
			AND tipo='".$_GET[what]."'
		";
		$result=mysql_query($query);
		
		if(mysql_num_rows($result)==1){
			$query3="
				DELETE FROM mephit_community_request
				WHERE 1
				AND fk_mitt=".$_GET[from]."
				AND fk_dest=".$_SESSION[user_id]."
				AND fk_app=0
				AND tipo='".$_GET[what]."'
			";
			$result3=mysql_query($query3);
			if($result3){
				$BODY.="Richiesta rifiutata";
			}else{
				$BODY.="ERRORE: Operazione non eseguita";
			}
		}else{
			$BODY.="ERRORE: Richiesta non valida";
		}
		
		$BODY.='<br><br>';
		$BODY.=navButton($_LANG[back],"my_notices.php");
		$BODY.=' ';
		$BODY.=navButton('Vai al profilo di '.$nick,"giocatori.php?id=".$_GET[from]);
	break;
	case"gruppo":
	case"gilda":
	case"avventura":
		$app=is_numeric($_GET[app])?$_GET[app]:0;
		$query="
			SELECT * FROM mephit_community_request
			WHERE 1
			AND fk_mitt=".$_GET[from]."
			AND fk_dest=".$_GET[to]."
			AND fk_app=".$app."
			AND tipo='".$_GET[what]."'
		";
		$result=mysql_query($query);
		
		if(mysql_num_rows($result)==1){
			$query3="
				DELETE FROM mephit_community_request
				WHERE 1
				AND fk_mitt=".$_GET[from]."
				AND fk_dest=".$_GET[to]."
				AND fk_app=".$app."
				AND tipo='".$_GET[what]."'
			";
			$result3=mysql_query($query3);
			if($result3){
				$BODY.="Richiesta rifiutata";
			}else{
				$BODY.="ERRORE: Operazione non eseguita";
			}
		}else{
			$BODY.="ERRORE: Richiesta non valida";
		}
		
		$BODY.='<br><br>';
		$BODY.=navButton($_LANG[back],"my_notices.php");
		$BODY.=' ';
		$BODY.=navButton('Vai al profilo di '.$nick,"giocatori.php?id=".$_GET[from]);
	break;
	default:
		$BODY.="ERRORE: Richiesta non valida";
		$BODY.='<br><br>';
		$BODY.=navButton($_LANG[back],"my_notices.php");
	break;
}
require_once("include/dress_dynamic.php");
?>

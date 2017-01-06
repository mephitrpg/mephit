<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG[notices]);

$BODY="";

$PATH='<a href="my_mephit.php">'.$_LANG[my_mephit].'</a> &raquo; <a href="my_notices.php">'.$_LANG[notices].'</a>';
$TAB1='my';

$nick=htmlspecialchars(getNick($_GET[from]));
$app=is_numeric($_GET[app])?$_GET[app]:0;
$from=(int)$_GET[from];
$to=(int)$_GET[to];

// controllo se la richiesta esiste
$query="
	SELECT * FROM mephit_community_request
	WHERE 1
	AND fk_mitt=".$from."
	AND fk_dest=".$to."
	AND fk_app=".$app."
	AND tipo='".$_GET[what]."'
";
$result=mysql_query($query);

// se la richiesta esiste, continuo
if(mysql_num_rows($result)==1){
	
	switch($_GET[what]){
		case"amico":
			
			if($to==$_SESSION[user_id]){
				
				$valid=false;
				$query2="INSERT INTO mephit_giocatore_amico (fk_giocatore1,fk_giocatore2) VALUES (".$_SESSION[user_id].",".$from.")";
				$result2=mysql_query($query2);
				if($result2){
					$query3="
						DELETE FROM mephit_community_request
						WHERE 1
						AND fk_mitt=".$from."
						AND fk_dest=".$_SESSION[user_id]."
						AND fk_app=".$app."
						AND tipo='".$_GET[what]."'
					";
					$result3=mysql_query($query3);
					if($result3)$valid=true;
				}
				if($valid){
					$BODY.="Richiesta accettata";
				}else{
					$BODY.="ERRORE: Operazione non eseguita";
				}
				
				$BODY.='<br><br>';
				$BODY.=navButton($_LANG[back],"my_notices.php");
				$BODY.=' ';
				$BODY.=navButton('Vai al profilo di '.$nick,"giocatori.php?id=".$from);
				
			}else{
				$BODY.="ERRORE: Richiesta non valida";
			}
				
		break;
		case"gruppo":
		case"gilda":
		case"avventura":
			
			$valid=false;
			switch($_GET[what]){
				case"gruppo":
					$query2="INSERT INTO mephit_giocatore_gruppo (fk_gruppo,fk_giocatore) VALUES (".$to.",".$from.")";
				break;
				case"gilda":
					$query2="INSERT INTO mephit_giocatore_gilda (fk_gilda,fk_giocatore) VALUES (".$to.",".$from.")";
				break;
				case"avventura":
					$query2="INSERT INTO mephit_giocatore_avventura (fk_avventura,fk_giocatore,note_pubbliche,note_private) VALUES (".$app.",".$to.",'','')";
				break;
			}
			$result2=mysql_query($query2);
			if($result2){
				$query3="
					DELETE FROM mephit_community_request
					WHERE 1
					AND fk_mitt=".$from."
					AND fk_dest=".$to."
					AND fk_app=".$app."
					AND tipo='".$_GET[what]."'
				";
				$result3=mysql_query($query3);
				if($result3)$valid=true;
			}
			if($valid){
				$BODY.="Richiesta accettata";
			}else{
				$BODY.="ERRORE: Operazione non eseguita";
			}
			
			$BODY.='<br><br>';
			$BODY.=navButton($_LANG[back],"my_notices.php");
			$BODY.=' ';
			switch($_GET[what]){
				case"gruppo":
					$BODY.=navButton('Vai al profilo di '.$nick,"giocatori.php?id=".$from);
				break;
				case"gilda":
					$BODY.=navButton('Vai al profilo di '.$nick,"giocatori.php?id=".$from);
				break;
				case"avventura":
					$BODY.=navButton('Vai all\'avvetura '.getAdventureName($app),"avventura.php?id=".$app);
				break;
			}
		break;
		default:
			$BODY.="ERRORE: Richiesta non valida";
			$BODY.='<br><br>';
			$BODY.=navButton($_LANG[back],"my_notices.php");
		break;
	}

}else{
	$BODY.="ERRORE: Richiesta non valida";
}
require_once("include/dress_dynamic.php");
?>

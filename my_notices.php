<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG[notices]);

$BODY='';

$PATH='<a href="my_notices.php">'.$_LANG[notices].'</a>';
$TAB1='my';

require("include/menu_personal.php");

$all_users_id=array();
$names=array();

// trovo tutto ciò che amministro

$groupsAsAdmin=getGroupsAsAdmin();
$guildsAsAdmin=getGuildsAsAdmin();
$adventuresAsAdmin=getAdventuresAsAdmin();

$gr=array_filter(array_merge(array_keys($groupsAsAdmin),array($_SESSION[user_id])));
$gu=array_filter(array_merge(array_keys($guildsAsAdmin),array($_SESSION[user_id])));
$ad=array_filter(array_merge(array_keys($adventuresAsAdmin),array($_SESSION[user_id])));

// trovo tutte le richieste che mi riguardano

$query="SELECT *
FROM mephit_community_request
WHERE 0
OR(
	tipo='amico' AND
	fk_dest=".$_SESSION[user_id]."
)OR(
	tipo='gruppo' AND
	fk_dest IN (".implode(",",$gr).")
)OR(
	tipo='gilda' AND
	fk_dest IN (".implode(",",$gu).")
)OR(
	tipo='avventura' AND
	fk_dest IN (".implode(",",$ad).")
)";

$result=mysql_query($query);

// suddivido le richieste in entrata
$richieste_da=array();					// richieste dirette a me
$richieste_da_a_destinatario=array();	// richieste x elementi che amministro

$richieste_da_count=0;
while($row=mysql_fetch_array($result)){
	$richieste_da[$row[tipo]][]=$row[fk_mitt];
	$all_users_id[amico][]=$row[fk_mitt];
	switch($row[tipo]){
		case"amico":
		break;
		case"gruppo":
		case"gilda":
			$all_users_id[$row[tipo]][]=$row[fk_dest];
			$richieste_da_a_destinatario[$row[tipo]][]=$row[fk_dest];
		break;
		case"avventura":
			$all_users_id[$row[tipo]][]=$row[fk_dest];
			$richieste_da_a_destinatario[$row[tipo]][]=$row[fk_dest];
			$richieste_da_app[$row[tipo]][]=$row[fk_app];
		break;
	}
	$richieste_da_count++;
}

$query="SELECT *
FROM mephit_community_request
WHERE fk_mitt=".$_SESSION[user_id]."
";
$result=mysql_query($query);

// suddivido le richieste in uscita
$richieste_a=array();

$richieste_a_count=0;
while($row=mysql_fetch_array($result)){
	$id=$row[fk_dest];
	$richieste_a[$row[tipo]][]=$id;
	$apps[$row[tipo]][$row[fk_app]][]=$id;
	$all_users_id[$row[tipo]][]=$id;
	$richieste_a_count++;
}

foreach($all_users_id as $tipo=>$chi){
	switch($tipo){
		case"amico":
			$query="
				SELECT *
				FROM mephit_giocatore
				WHERE id_giocatore IN (".implode(",",$all_users_id[$tipo]).")
			";
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				$names[$tipo][$row[id_giocatore]]=$row[nick];
			}
		break;
		case"gruppo":
			$names[$tipo]=$groupsAsAdmin;
		break;
		case"gilda":
			$names[$tipo]=$guildsAsAdmin;
		break;
		case"avventura":
			$names[$tipo]=$adventuresAsAdmin;
		break;
	}
}

$BODY.='<h3>'.$_LANG["received"].'</h3>';

$BODY.='<ul>';
if($richieste_da_count>0){
	foreach($richieste_da as $tipo=>$richieste){
		switch($tipo){
			case"amico":
				foreach($richieste AS $id){
					$BODY.='<li><a href="request_accept.php?from='.$id.'&what=amico">'.$_LANG[accept].'</a> o <a href="request_refuse.php?from='.$id.'&what=amico">'.$_LANG[refuse].'</a> l\'amicizia di <a href="giocatori.php?id='.$id.'">'.htmlspecialchars($names[$tipo][$id]).'</a></li>';
				}
			break;
			case"gruppo":
				foreach($richieste AS $i=>$id){
					$from=$id;
					$to=$richieste_da_a_destinatario[$tipo][$i];
					$BODY.='<li><a href="request_accept.php?from='.$id.'&to='.$to.'&what='.$tipo.'">'.$_LANG[accept].'</a> o <a href="request_refuse.php?from='.$id.'&to='.$to.'&what='.$tipo.'">'.$_LANG[refuse].'</a> l\'iscrzione al gruppo <a href="gruppi.php?id='.$to.'">'.htmlspecialchars($names[gruppo][$to]).'</a> richiesta da <a href="giocatori.php?id='.$from.'">'.$names[amico][$from].'</a></li>';
				}
			break;
			case"gilda":
				foreach($richieste AS $i=>$id){
					$from=$id;
					$to=$richieste_da_a_destinatario[$tipo][$i];
					$BODY.='<li><a href="request_accept.php?from='.$id.'&to='.$to.'&what='.$tipo.'">'.$_LANG[accept].'</a> o <a href="request_refuse.php?from='.$id.'&to='.$to.'&what='.$tipo.'">'.$_LANG[refuse].'</a> l\'iscrzione alla gilda <a href="gilde.php?id='.$to.'">'.htmlspecialchars($names[gilda][$to]).'</a> da parte di <a href="giocatori.php?id='.$from.'">'.$names[amico][$from].'</a></li>';
				}
			break;
			case"avventura":
				foreach($richieste AS $i=>$id){
					$from=$id;
					$to=$richieste_da_a_destinatario[$tipo][$i];
					$app=$richieste_da_app[$tipo][$i];
					if(isset($names[$tipo][$app])){
						$appName=!empty($names[$tipo][$app])?$names[$tipo][$app]:getAdventureName($app);
					}else{
						$appName=getAdventureName($app);
					}
					$BODY.='<li><a href="request_accept.php?from='.$id.'&to='.$to.'&what='.$tipo.'&app='.$app.'">'.$_LANG[accept].'</a> o <a href="request_refuse.php?from='.$id.'&to='.$to.'&what='.$tipo.'&app='.$app.'">'.$_LANG[refuse].'</a> l\'invito ad iscriverti all\'avventura <a href="avventura.php?id='.$app.'">'.htmlspecialchars($appName).'</a> inviato da <a href="giocatori.php?id='.$from.'">'.$names[amico][$from].'</a></li>';
				}
			break;
		}
	}
}else{
	$BODY.='<li>'.$_LANG["no_items"].'</li>';
}
$BODY.='</ul>';

$BODY.='<h3>'.$_LANG["waiting"].'</h3>';

$BODY.='<ul>';
if($richieste_a_count>0){
	foreach($apps as $tipo=>$richieste){
		switch($tipo){
			case"amico":
				foreach($richieste AS $app=>$IDs){foreach($IDs as $id){
					$BODY.='<li>Hai chiesto l\'amicizia a <a href="giocatori.php?id='.$id.'">'.htmlspecialchars(getNick($id)).'</a></li>';
				}}
			break;
			case"gruppo":
				foreach($richieste AS $app=>$IDs){foreach($IDs as $id){
					$BODY.='<li>Hai chiesto l\'iscrizione al gruppo <a href="gruppi.php?id='.$id.'">'.htmlspecialchars(getGroupName($id)).'</a></li>';
				}}
			break;
			case"gilda":
				foreach($richieste AS $app=>$IDs){foreach($IDs as $id){
					$BODY.='<li>Hai chiesto l\'iscrizione alla gilda <a href="gilde.php?id='.$id.'">'.htmlspecialchars(getGuildName($id)).'</a></li>';
				}}
			break;
			case"avventura":
				foreach($richieste AS $app=>$IDs){foreach($IDs as $id){
					$BODY.='<li>Hai invitato <a href="giocatori.php?id='.$id.'">'.htmlspecialchars(getNick($id)).'</a> ad iscriversi all\'avventura <a href="avventura.php?id='.$app.'">'.htmlspecialchars(getAdventureName($app)).'</a></li>';
				}}
			break;
		}
	}
}else{
	$BODY.='<li>'.$_LANG["no_items"].'</li>';
}
$BODY.='</ul>';


require_once("include/dress_dynamic.php");
?>
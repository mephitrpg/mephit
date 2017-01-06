<?php
$ALERTS='';

$groupsAsAdmin=getGroupsAsAdmin();
$guildsAsAdmin=getGuildsAsAdmin();
$adventuresAsAdmin=getAdventuresAsAdmin();

$gr=array_filter(array_merge(array_keys($groupsAsAdmin),array($_SESSION[user_id])));
$gu=array_filter(array_merge(array_keys($guildsAsAdmin),array($_SESSION[user_id])));
$ad=array_filter(array_merge(array_keys($adventuresAsAdmin),array($_SESSION[user_id])));

// trovo tutte le richieste che mi riguardano

$query="SELECT COUNT(*)
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
$q=0;
if($result)while($row=mysql_fetch_row($result))$q=$row[0];

$ALERTS.='<a href="my_notices.php">'.$_LANG[notices].' ('.$q.')</a>';
$q=0;
$ALERTS.='&nbsp;';
$ALERTS.='<a href="my_mail.php">'.$_LANG[mail].' ('.$q.')</a>';
?>
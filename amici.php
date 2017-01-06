<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG[friends]);

$BODY="";

$PATH='<a href="amici.php">'.$_LANG[friends].'</a>';
$TAB1='community';

$amici=getFriends();
if(count($amici)!=0){
	$query="SELECT *
	FROM mephit_giocatore
	WHERE id_giocatore IN (".implode(",",$amici).")
	";
	$result=mysql_query($query);
	if($result){
		if(mysql_num_rows($result)>0){
			$BODY.='<ul style="list-style:none;margin:0;padding:0;" class="row">';
			while($row=mysql_fetch_array($result)){
				$BODY.='<li class="col" style="width:'.($_MEPHIT[avatar_maxWidth]+20).'px;height:'.($_MEPHIT[avatar_maxHeight]+20).'px;">';
				$BODY.=getAvatarBox(array("row"=>$row));
				$BODY.='</li>';
			}
			$BODY.='</ul>';
		}else{
			$BODY.="Nessun amico";
		}
	}else{
		$BODY.="ERRORE DEL SERVER: IMPOSSIBILE LEGGERE IL DATABASE";
	}
}else{
	$BODY.="Nessun amico";
}


require_once("include/dress_dynamic.php");
?>

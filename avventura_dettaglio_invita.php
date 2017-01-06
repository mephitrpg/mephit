<?php
if($avv[fk_master]==$_SESSION[user_id]){
	
	if(!is_null($avv[fk_gilda])){
		
		$query="SELECT * FROM mephit_gilda WHERE id_gilda=".$avv[fk_gilda];
		$result=mysql_query($query);
		if(mysql_num_rows($result)>0){
			while($row=mysql_fetch_assoc($result)){
				$gilda=$row;
			}
			if($gilda[exclusive]){
				$invitabili=array_keys(getGuildMembers($avv[fk_gilda]));
			}else{
				$invitabili=getFriends();
			}
		}else{
			$invitabili=getFriends();
		}
		
	}else{
		$invitabili=getFriends();
	}
	
	$nonInvitabili=array_keys(getAdventureMembers($avv[id_avventura]));
	$nonInvitabili[]=$avv[fk_master];
		
	$query_nomi="SELECT id_giocatore,nick FROM mephit_giocatore WHERE id_giocatore IN (".implode(",",array_merge($invitabili,$nonInvitabili)).") ORDER BY nick";
	$result_nomi=mysql_query($query_nomi);
	$nomi=array();
	$keys=array();
	while($row_nomi=mysql_fetch_assoc($result_nomi)){
		$nomi[]=$row_nomi[nick];
		$keys[]=$row_nomi[id_giocatore];
	}
	
	if($_SESSION[user_id]==$avv[fk_master]){
		if(count($invitabili)>0){
			$BODY.='<h3>Invita giocatori</h3>';
			$BODY.='<form action="request.php" method="get">';
			$BODY.='<input type="hidden" name="app" value="'.$avv[id_avventura].'">';
			$BODY.='<input type="hidden" name="what" value="avventura">';
			foreach($nomi as $i=>$nome){
				$id=$keys[$i];
				if(in_array($id,$invitabili)&&!in_array($id,$nonInvitabili)){
					$BODY.='<div><input type="radio" name="id" value="'.$id.'"> <a href="giocatori.php?id='.$id.'">'.$nome.'</a></div>';
				}
			}
			$BODY.='<br>';
			$BODY.='<input type="submit" class="btn" value="'.$_LANG[invite].'">';
			$BODY.='</form>';
		}else{
			$BODY.='Non puoi invitare altri utenti';
		}
	}
	
}
?>
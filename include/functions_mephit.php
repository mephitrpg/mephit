<?php
function mephit_roll(){
	$c=roll("4d6");
	for($i=0;$i<count($c);$i++){
		while($c[$i]==1){
			$c[$i]=D(6);
		}
	}
	sort($c);
	return array_sum(array_splice($c,1-count($c)));
}
function quanticRoll($dices){
	$content=array();
	if($content=@file("http://www.random.org/integers/?num=".count($dices)."&min=1&max=100&col=1&base=10&format=plain&rnd=new")){
		$quantic=true;
		foreach($content AS $k=>$v){
			$content[$k]=$v%$dices[$k]+1;
		}
	}else{
		$quantic=false;
		$myDices=explode(",",$dices);
		foreach($myDices AS $d){
			$content[]=mt_rand(1,$d);
		}
	}
	return array("error"=>false,"quantic"=>$quantic,"result"=>$content);
}
function bbcode($str){
	$BB=array("b"=>"strong","i"=>"em");
	foreach($BB as $bb=>$html){
		$str=str_replace("[".$bb."]",'<'.$html.'>',$str);
		$str=str_replace("[/".$bb."]",'</'.$html.'>',$str);
	}
	// spoiler
	$str=preg_replace("/\[spoiler\](.*)\[\/spoiler\]/Us",'<form>Spoiler: <input type="button" onclick="$(this).next().toggle();" onkeypress="this.onclick();" value="Mostra"><div style="display:none;border:1px solid #ccc;background:#eee;padding:6px;margin:1em 0;">$1</div></form>',$str);
	//roll
	$roll_regexp="/\[roll\-([cq])\]([0-9d.\s\(\)\+\-\*\/\=]*)\[\/roll\-([cq])\]/m";
	preg_match_all($roll_regexp,$str,$out);
	$pattern=array();
	$replacement=array();
	foreach($out[0] as $k=>$v){
		$type1=$out[1][$k];
		$type2=$out[3][$k];
		if($type1==$type2){
			$x=explode(" = ",$out[2][$k]);
			$rr='';
			$rr.='<a href="javascript:;" onclick="$(this).down(\'span\').toggle();" onkeypress="this.onclick();" class="roll-'.($type1=="q"?"quantic":"normal").'" title="'.($type1=="q"?"Dadi quantici":"Dadi normali").'">';
			$rr.=$x[0];
			$rr.='<span style="display:none;">';
			$rr.=' = '.$x[1].' = '.$x[2];
			$rr.='</span>';
			$rr.='</a>';
		}else{
			$rr='[ROLL ERROR]';
		}
		$pattern[]=$roll_regexp;
		$replacement[]=$rr;
	}
	$str=preg_replace($pattern,$replacement,$str,1);
	//return
	return $str;
}
# ------------ USER ------------ #
function getNick($q){
	$nick="";
	$query="SELECT nick FROM mephit_giocatore WHERE id_giocatore=".$q;
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		$nick=$row[nick];
	}
	return $nick;
}
function getAvatar(){
	$_MEPHIT=$GLOBALS[_MEPHIT];
	if(func_num_args()==0){
		$user_id=$_SESSION[user_id];
		$avatar_type=$_SESSION[avatar_type];
		$avatar_size=$_SESSION[avatar_size];
		$avatar_link=$_SESSION[avatar_link];
		$avatar_link_x=$_SESSION[avatar_link_x];
		$avatar_link_y=$_SESSION[avatar_link_y];
	}else if(is_array(func_get_arg(0))){
		$row=func_get_arg(0);
		$user_id=$row[id_giocatore];
		$avatar_type=$row[avatar_type];
		$avatar_size=$row[avatar_size];
		$avatar_link=$row[avatar_link];
		$avatar_link_x=$row[avatar_link_x];
		$avatar_link_y=$row[avatar_link_y];
	}else{
		$user_id=func_get_arg(0);
		$query_avatar="SELECT * FROM mephit_giocatore WHERE id_giocatore=".$user_id;
		$result_avatar=mysql_query($query_avatar);
		while($row=mysql_fetch_array($result_avatar)){
			$avatar_type=$row[avatar_type];
			$avatar_size=$row[avatar_size];
			$avatar_link=$row[avatar_link];
			$avatar_link_x=$row[avatar_link_x];
			$avatar_link_y=$row[avatar_link_y];
		}
	}
	switch($avatar_type){
		case 0:	// default
			return '<img src="'.$_MEPHIT[avatar_default].'" border="0">';
		break;
		case 1:	// upload
			$avatar_folder=dirname(__FILE__)."/../public/users/".$user_id.$_MEPHIT["user"]["folders"]["avatar"];
			$avatar_folder_http="public/users/".$user_id.$_MEPHIT["user"]["folders"]["avatar"];
			$avatar_uploaded="";
			$handle=opendir($avatar_folder);
			while($file = readdir($handle)){if(!is_dir($file)){
				//$avatar_folder_http."/".$file;
				$avatar_uploaded=$avatar_folder_http."/".$file;
				break;
			}}
			if( $avatar_size==0  || $avatar_size==2 ){
				return '<span style="background:url('.$avatar_uploaded.') 50% 50% no-repeat;width:'.$_MEPHIT[avatar_maxWidth].'px;height:'.$_MEPHIT[avatar_maxHeight].'px;display:block;"><span style="visibility:hidden;">&nbsp;</span></span>';
			}else if($avatar_size==1){
				return '<img src="'.$avatar_uploaded.'" border="0" width="'.$_MEPHIT[avatar_maxWidth].'" height="'.$_MEPHIT[avatar_maxHeight].'">';
			}
		break;
		case 2:	// link
			if( $_MEPHIT[gd_enabled] ){
				$size=@getimagesize($avatar_link);
				if( $size!==false ){
					$valid=$size[0]<=$_MEPHIT[avatar_maxWidth] && $size[1]<=$_MEPHIT[avatar_maxHeight];
					$exists=true;
				}else{
					$valid=false;
					$exists=false;
				}
			}else{
				$valid=false;
				$exists=true;
			}
			if($exists){
				if( $avatar_size==0 && $valid ){
					return '<div><img src="'.$avatar_link.'" border="0"></div>';
				}else if($avatar_size==0 || $avatar_size==1){
					return '<div><img src="'.$avatar_link.'" width="'.$_MEPHIT[avatar_maxWidth].'" height="'.$_MEPHIT[avatar_maxHeight].'" border="0"></div>';
				}else if($avatar_size==2){
					return '<div style="display:block;width:'.$_MEPHIT[avatar_maxWidth].';height:'.$_MEPHIT[avatar_maxHeight].'px;background: url('.$avatar_link.') no-repeat '.$avatar_link_x.'% '.$avatar_link_y.'%;"></div>';
				}
			}
		break;
	}
}
function getAvatarBox(){
	if(func_num_args()>0){
		$arg0=func_get_arg(0);
		if(is_numeric($arg0)){
			$query="SELECT * FROM mephit_giocatore WHERE id_giocatore=".$arg0;
			$result=mysql_query($query);
			while($row=mysql_fetch_assoc($result)){
				$avatar=getAvatar($row);
				$id_giocatore=$row[id_giocatore];
				$nick=$row[nick];
			}
		}else if(isset($arg0[row])){
			$avatar=getAvatar($arg0[row]);
			$id_giocatore=$arg0[row][id_giocatore];
			$nick=$arg0[row][nick];
		}else{
			$avatar=getAvatar();
			$id_giocatore=$_SESSION[user_id];
			$nick=$_SESSION[user_nick];
		}
	}else{
		$avatar=getAvatar();
		$id_giocatore=$_SESSION[user_id];
		$nick=$_SESSION[user_nick];
	}
	$box='';
	switch($opt[type]){
		case"select":
			$box.='<a title="'.htmlspecialchars($nick).'" href="javascript:;" onclick="$(this).select(\'input[type=checkbox]\').first().checked=$(this).select(\'input[type=checkbox]\').first().checked?0:1;">';
			$box.='<span style="display:block;width:'.$GLOBALS[_MEPHIT][avatar_maxWidth].'px;height:'.$GLOBALS[_MEPHIT][avatar_maxHeight].'px;">';
			$box.=$avatar;
			$box.='</span>';
			$box.='<input type="checkbox" name="players[]" value="'.$id_giocatore.'">';
			$box.=htmlspecialchars($nick);
			$box.='</a>';
		break;
		case"link":
		default:
			$box.='<a title="'.htmlspecialchars($nick).'" href="giocatori.php?id='.$id_giocatore.'">';
			$box.='<span style="display:block;width:'.$GLOBALS[_MEPHIT][avatar_maxWidth].'px;height:'.$GLOBALS[_MEPHIT][avatar_maxHeight].'px;">';
			$box.=$avatar;
			$box.='</span>';
			$box.=htmlspecialchars($nick);
			$box.='</a>';
		break;
	}
	return $box;
}
function getPGs(){
	$query="
		SELECT id_personaggio AS id,nome AS nome
		FROM mephit_personaggio
		WHERE autore=".$_SESSION[user_id]."
		ORDER BY nome
	";
	$result=mysql_query($query);
	$list=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$list[$row[id]]=$row[nome];
		}
	}
	return $list;
}
function getUserClass($user_id){
	$arguments=func_get_args();
	if(isset($arguments[1])){
		if(is_numeric($arguments[1])){
			$pg_id=$arguments[1];
		}else{
			$pg_id=-1;
		}
	}else{
		$pg_id=-1;
	}
	if($pg_id==-1){
		$query="
			SELECT id AS id,name_".$GLOBALS[_MEPHIT][lang]." AS nome
			FROM srd35_class
			ORDER BY nome
		";
	}else{
		$query="
			SELECT id AS id,name_".$_MEPHIT[lang]." AS nome
			FROM mephit_classi
			WHERE autore=".$_SESSION[user_id]."
			ORDER BY nome
		";
	}
	$result=mysql_query($query);
	$list=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$list[$row[id]]=$row[nome];
		}
	}
	return $list;
}
# ------------ FRIENDS ------------ #
function getFriends(){
	$query="SELECT
	*
	FROM mephit_giocatore_amico
	WHERE 0
	OR fk_giocatore1=".$_SESSION[user_id]."
	OR fk_giocatore2=".$_SESSION[user_id]."
	";
	$result=mysql_query($query);
	$amici=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$amici[]=($row[fk_giocatore1]==$_SESSION[user_id])?$row[fk_giocatore2]:$row[fk_giocatore1];
		}
	}
	return $amici;
}
# ------------ GROUPS ------------ #
function getGroupName($q){
	$query="SELECT nome FROM mephit_gruppo WHERE id_gruppo=".$q;
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result))return $row[nome];
	return "";
}
function getGroupsAsAdmin(){
	$query="
		SELECT id_gruppo,nome
		FROM mephit_gruppo
		WHERE fk_master=".$_SESSION[user_id]."
		ORDER BY nome
	";
	$result=mysql_query($query);
	$gruppi=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$gruppi[$row[id_gruppo]]=$row[nome];
		}
	}
	return $gruppi;
}
function getGroupsAsMember(){
	$query="
		SELECT id_gruppo,nome
		FROM mephit_giocatore_gruppo AS gg
		JOIN mephit_gruppo AS g ON fk_gruppo=id_gruppo
		WHERE fk_giocatore=".$_SESSION[user_id]."
		AND fk_master!=".$_SESSION[user_id]."
		ORDER BY nome
	";
	$result=mysql_query($query);
	$gruppi=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$gruppi[$row[id_gruppo]]=$row[nome];
		}
	}
	return $gruppi;
}
function getGroupMembers($q){
	//
}
function getGroups(){
	$result=getGroupsAsMember();
	foreach(getGroupsAsAdmin() as $k=>$v){
		$result[$k]=$v;
	}
	return $result;
}
# ------------ GILDE ------------ #
function getGuildName($q){
	$query="SELECT nome FROM mephit_gilda WHERE id_gilda=".$q;
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result))return $row[nome];
	return "";
}
function getGuildsAsAdmin(){
	$query="
		SELECT id_gilda,nome
		FROM mephit_gilda
		WHERE fk_master=".$_SESSION[user_id]."
		ORDER BY nome
	";
	$result=mysql_query($query);
	$gruppi=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$gruppi[$row[id_gilda]]=$row[nome];
		}
	}
	return $gruppi;
}
function getGuildsAsMember(){
	$query="
		SELECT id_gilda,nome
		FROM mephit_giocatore_gilda AS gg
		JOIN mephit_gilda AS g ON fk_gilda=id_gilda
		WHERE fk_giocatore=".$_SESSION[user_id]."
		AND fk_master!=".$_SESSION[user_id]."
		ORDER BY nome
	";
	$result=mysql_query($query);
	$gruppi=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$gruppi[$row[id_gilda]]=$row[nome];
		}
	}
	return $gruppi;
}
function getGuildMembers($q){
	$query="SELECT *
		FROM mephit_giocatore_gilda AS p
		JOIN mephit_giocatore       AS g ON id_giocatore=fk_giocatore
		WHERE fk_gilda=".$q."
		ORDER BY nome
	";
	$result=mysql_query($query);
	$membri=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$membri[$row[id_giocatore]]=$row[nick];
		}
	}
	return $membri;
}
function getGuilds(){
	$result=getGuildsAsMember();
	foreach(getGuildsAsAdmin() as $k=>$v){
		$result[$k]=$v;
	}
	return $result;
}
# ------------ AVVENTURE ------------ #
function getAdventureName($q){
	$query="SELECT nome FROM mephit_avventura WHERE id_avventura=".$q;
	$result=mysql_query($query);
	echo mysql_error();
	while($row=mysql_fetch_assoc($result))return $row[nome];
	return "";
}
function getAdventuresAsAdmin(){
	$query="
		SELECT id_avventura,nome
		FROM mephit_avventura
		WHERE fk_master=".$_SESSION[user_id]."
		ORDER BY nome
	";
	$result=mysql_query($query);
	$avventure=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$avventure[$row[id_avventura]]=$row[nome];
		}
	}
	return $avventure;
}
function getAdventuresAsMember(){
	$query="
		SELECT id_avventura,nome
		FROM mephit_giocatore_avventura
		JOIN mephit_avventura ON fk_avventura=id_avventura
		WHERE fk_giocatore=".$_SESSION[user_id]."
		AND fk_master!=".$_SESSION[user_id]."
		ORDER BY nome
	";
	$result=mysql_query($query);
	$avventure=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$avventure[$row[id_avventura]]=$row[nome];
		}
	}
	return $avventure;
}
function getAdventureMembers($q){
	$query="SELECT *
		FROM mephit_giocatore_avventura AS p
		JOIN mephit_giocatore       AS g ON id_giocatore=fk_giocatore
		WHERE fk_avventura=".$q."
		ORDER BY nick
	";
	$result=mysql_query($query);
	$membri=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$membri[$row[id_giocatore]]=$row[nick];
		}
	}
	return $membri;
}
function getAdventurePGs($q){
	$query="SELECT *
		FROM mephit_personaggio
		WHERE fk_avventura=".$q."
		ORDER BY nome
	";
	$result=mysql_query($query);
	$membri=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$membri[$row[id_personaggio]]=$row[nome];
		}
	}
	return $membri;
}
function getAdventures(){
	$result=getAdventuresAsMember();
	foreach(getAdventuresAsAdmin() as $k=>$v){
		$result[$k]=$v;
	}
	return $result;
}
function getAdventuresMasteredBy($q){
	$query="SELECT id_avventura,nome FROM mephit_avventura WHERE fk_master=".$q;
	$result=mysql_query($query);
	$avventure=array();
	if($result){
		while($row=mysql_fetch_array($result)){
			$avventure[$row[id_avventura]]=$row[nome];
		}
	}
	return $avventure;
}
?>
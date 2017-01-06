<?php
$Z=array("FOR","DES","COS","INT","SAG","CAR");


$carico_l=array();
$carico_m=array();
$carico_p=array();

$carico_l[0]=0;			$carico_m[0]=0;			$carico_p[0]=0;
$carico_l[1]=3;			$carico_m[1]=6;			$carico_p[1]=10;
$carico_l[2]=6;			$carico_m[2]=13;		$carico_p[2]=20;
$carico_l[3]=10;		$carico_m[3]=20;		$carico_p[3]=30;
$carico_l[4]=13;		$carico_m[4]=26;		$carico_p[4]=40;
$carico_l[5]=16;		$carico_m[5]=33;		$carico_p[5]=50;
$carico_l[6]=20;		$carico_m[6]=40;		$carico_p[6]=60;
$carico_l[7]=23;		$carico_m[7]=46;		$carico_p[7]=70;
$carico_l[8]=26;		$carico_m[8]=53;		$carico_p[8]=80;
$carico_l[9]=30;		$carico_m[9]=60;		$carico_p[9]=90;
$carico_l[10]=33;		$carico_m[10]=66;		$carico_p[10]=100;
$carico_l[11]=38;		$carico_m[11]=76;		$carico_p[11]=115;
$carico_l[12]=43;		$carico_m[12]=86;		$carico_p[12]=130;
$carico_l[13]=50;		$carico_m[13]=100;		$carico_p[13]=150;
$carico_l[14]=58;		$carico_m[14]=116;		$carico_p[14]=175;
$carico_l[15]=66;		$carico_m[15]=133;		$carico_p[15]=200;
$carico_l[16]=76;		$carico_m[16]=153;		$carico_p[16]=230;
$carico_l[17]=86;		$carico_m[17]=173;		$carico_p[17]=260;
$carico_l[18]=100;		$carico_m[18]=200;		$carico_p[18]=300;
$carico_l[19]=116;		$carico_m[19]=233;		$carico_p[19]=350;
$carico_l[20]=133;		$carico_m[20]=266;		$carico_p[20]=400;
$carico_l[21]=153;		$carico_m[21]=306;		$carico_p[21]=460;
$carico_l[22]=173;		$carico_m[22]=346;		$carico_p[22]=520;
$carico_l[23]=200;		$carico_m[23]=400;		$carico_p[23]=600;
$carico_l[24]=233;		$carico_m[24]=466;		$carico_p[24]=700;
$carico_l[25]=266;		$carico_m[25]=533;		$carico_p[25]=800;
$carico_l[26]=306;		$carico_m[26]=613;		$carico_p[26]=920;
$carico_l[27]=346;		$carico_m[27]=693;		$carico_p[27]=1040;
$carico_l[28]=400;		$carico_m[28]=800;		$carico_p[28]=1200;
$carico_l[29]=466;		$carico_m[29]=933;		$carico_p[29]=1400;

$caricoTagliaBipede=array(1/8,1/4,1/2,3/4,1,2,4,8,16);
$caricoTagliaQuadrupede=array(1/4,1/2,3/4,1,1.5,3,6,12,24);

function D($x){
	return mt_rand(1,$x);
}
function roll($x){
	$t=explode("d",$x);
	$q=$t[0];
	$d=$t[1];
	$r=array();
	for($i=0;$i<$q;$i++){
		$r[]=D($d);
	}
	return $r;
}
function M($x){
	$x=floor(($x-10)/2);
	return (($x>0)?"+":"").$x;
}
function rollAndDiscardLower($x,$q){
	$c=roll($x);
	sort($c);
	return array_sum(array_splice($c,$q-count($c)));
}
function translatePrice($q,$l){
	if($q=="special")return $q;
	switch($l){
		case"it":
			$q=str_replace("gp","mo",$q);
			$q=str_replace("cp","mr",$q);
			$q=str_replace("sp","ma",$q);
			$q=str_replace("pp","mp",$q);
			$q=str_replace(",",".",$q);
			return $q;
		break;
		default:	return $q;	break;
	}
}
function translateWeight($w,$l){
	if($w=="special")return $w;
	preg_match_all("/[\\d\.]+/",$w."",$out);
	if(count($out[0])>0){
		switch($l){
			case"it":
				$w=str_replace(".",",",$out[0][0]*0.5)." kg";
				return $w;
			case"en":
				$w=$out[0][0]." lb";
				return $w;
			break;
			default:
				return $w;
			break;
		}
	}
}
function translateNumber($n,$l){
	$w=(string)$n;
	switch($l){
		case"it":
			$w=str_replace(".",",",$w);
			return $w;
		break;
		default:
			return $w;
		break;
	}
	return $n;
}
function convertWeight($n,$l){
	$w=(string)$n;
	preg_match_all("/[\\d\.]+/",$w."",$out);
	if(count($out[0])>0){
		switch($l){
			case"it":
				$w=$out[0][0]*0.5;
				return $w;
			break;
			default:
				$w=$out[0][0];
				return $w;
			break;
		}
	}
	return $n;
}
function getSkills(){
	$query_a="
		SELECT
		*,
		id AS skill_id,
		code AS skill_code,
		name_".$GLOBALS[_MEPHIT][lang]." AS skill_name,
		subtype_".$GLOBALS[_MEPHIT][lang]." AS skill_subtype
		
		FROM srd35_skill
		WHERE psionic=0
		ORDER BY name_".$GLOBALS[_MEPHIT][lang]."
	";
	$result_a=mysql_query($query_a);
	$skills=array();
	while($row=mysql_fetch_assoc($result_a)){
		$skills[]=array(
			"id"=>$row[skill_id],
			"code"=>$row[skill_code],
			"name"=>$row[skill_name],
			"ability"=>$row[key_ability],
			"ability_id"=>$row[fk_ability],
			"psionic"=>$row[psionic]*1,
			"train"=>$row[trained]*1,
			"armor"=>$row[armor_check]*1,
			"subtype"=>$row[skill_subtype],
		);
	}
	return $skills;
}
function babFromLevel($tipo,$livello){
	switch($tipo){
		case"alto":		return $livello;							break;
		case"medio":	return $livello-1-floor(($livello-1)/4);	break;
		case"basso":	return floor($livello/2);					break;
	}		
}
function tsFromLevel($tipo,$livello){
	switch(tipo){
		case"alto":		return floor($livello/2)+2;				break;
		case"basso":	return floor($livello/3);				break;
	}		
}
?>
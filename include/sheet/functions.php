<?php
function mod($q){
	return floor(($q-10)/2);
}

function sign($q){
	return ($q>0)?"+$q":$q;
}

function formatClasses($q){
	for($i=0;$i<count($q);$i++){
		switch($q[$i][0]){
			case $GLOBALS["_LANG"]["class_barbarian"]:		$c=$GLOBALS["_LANG"]["class_bbn"];			break;
			case $GLOBALS["_LANG"]["class_bard"]:			$c=$GLOBALS["_LANG"]["class_brd"];			break;
			case $GLOBALS["_LANG"]["class_cleric"]:			$c=$GLOBALS["_LANG"]["class_clr"];			break;
			case $GLOBALS["_LANG"]["class_wizard"]:			$c=$GLOBALS["_LANG"]["class_wiz"];			break;
			case $GLOBALS["_LANG"]["class_fighter"]:		$c=$GLOBALS["_LANG"]["class_ftr"];			break;
			case $GLOBALS["_LANG"]["class_sorcerer"]:		$c=$GLOBALS["_LANG"]["class_sor"];			break;
			case $GLOBALS["_LANG"]["class_rouge"]:			$c=$GLOBALS["_LANG"]["class_rog"];			break;
			case $GLOBALS["_LANG"]["class_druid"]:			$c=$GLOBALS["_LANG"]["class_drd"];			break;
			case $GLOBALS["_LANG"]["class_monk"]:			$c=$GLOBALS["_LANG"]["class_mnk"];			break;
			case $GLOBALS["_LANG"]["class_paladin"]:		$c=$GLOBALS["_LANG"]["class_pal"];			break;
			case $GLOBALS["_LANG"]["class_ranger"]:			$c=$GLOBALS["_LANG"]["class_rgr"];			break;
			default:										$c=$q[$i][0];								break;
		}
		$q[$i]=$c." ".$q[$i][1];
	}
	return implode("/",$q);
}

function formatSize($CA){
	switch($CA){
		case -8:	$t=$GLOBALS["_LANG"]["size_colossal"];		break;
		case -4:	$t=$GLOBALS["_LANG"]["size_gargantuan"];	break;
		case -2:	$t=$GLOBALS["_LANG"]["size_huge"];			break;
		case -1:	$t=$GLOBALS["_LANG"]["size_large"];			break;
		case 0:		$t=$GLOBALS["_LANG"]["size_medium"];		break;
		case 1:		$t=$GLOBALS["_LANG"]["size_small"];			break;
		case 2:		$t=$GLOBALS["_LANG"]["size_tiny"];			break;
		case 4:		$t=$GLOBALS["_LANG"]["size_diminutuve"];	break;
		case 8:		$t=$GLOBALS["_LANG"]["size_fine"];			break;
	}
	return $t;
}

function formatAlignment($q){
	switch($q){
		case 1:			$t=$GLOBALS["_LANG"]["LB"];		break;
		case 2:			$t=$GLOBALS["_LANG"]["LN"];		break;
		case 3:			$t=$GLOBALS["_LANG"]["LE"];		break;
		case 4:			$t=$GLOBALS["_LANG"]["NB"];		break;
		case 5:			$t=$GLOBALS["_LANG"]["NN"];		break;
		case 6:			$t=$GLOBALS["_LANG"]["NE"];		break;
		case 7:			$t=$GLOBALS["_LANG"]["CB"];		break;
		case 8:			$t=$GLOBALS["_LANG"]["CN"];		break;
		case 9:			$t=$GLOBALS["_LANG"]["CE"];		break;
		case 0:default:	$t=$GLOBALS["_LANG"]["CN"];		break;
	}
	return $t;
}
?>
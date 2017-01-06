<?php
$BODY.='<img src="'.$_MEPHIT[WWW_ROOT].'/public/Dark-Forest.jpg"><br>';

$BODY.='<br>';

$BODY.='<img src="'.$_MEPHIT[WWW_ROOT].'/images/addThisButton.gif"><br><br>';

$BODY.='<div>';
if(is_null($avv[fk_gilda])){
	$BODY.='Questa avventura &egrave; aperta a tutti gli amici di <a href="giocatori.php?id='.$avv[fk_master].'">'.getNick($avv[fk_master]).'</a>';
}else{
	$BODY.='Questa avventura &egrave; aperta ai membri della gilda <a href="gilde.php?id='.$avv[fk_gilda].'">'.getGuildName($avv[fk_gilda]).'</a>';
}
$BODY.='</div>';
$BODY.='<br>';
$BODY.='<strong>Data:</strong> giorno Marittimo 26, mese Seminativo, stagione Bassa Estate, anno 591, calendario CY'; 
$BODY.='</div>';
?>
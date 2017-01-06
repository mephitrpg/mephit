<?php
$BODY.="<b>Risultati:</b> ".$for." (".M($for)."), ".$des." (".M($des)."), ".$cos." (".M($cos)."), ".$int." (".M($int)."), ".$sag." (".M($sag)."), ".$car." (".M($car).")<br /><br />";

$higher=max(array($for,$des,$cos,$int,$sag,$car));
$modifiers=M($for)+M($des)+M($cos)+M($int)+M($sag)+M($car);

if( $modifiers<=2 || $higher<15 ){
	if($modifiers<=2)$BODY.="La somma dei modificatori è minore di 2.<br />";
	if($higher<15)$BODY.="Il più alto punteggio è inferiore a 15.<br />";
	$BODY.='<br />Vuoi rilanciare i dadi?<br /><br />';
	$BODY.='<form name="f" action="'.$_SERVER["PHP_SELF"].'?'.$_SERVER["QUERY_STRING"].'" method="post">';
	$BODY.='<input type="submit" name="ripeti" value="Rilancia i dadi" class="btn">';
	$BODY.='</form>';
	$BODY.=' ';
}
$BODY.='<form name="f" action="'.$_SERVER[PHP_SELF].'?dndtool='.$_GET["dndtool"].'&step=3" method="post">';
$BODY.='<input type="hidden" name="for" value="'.$for.'">';
$BODY.='<input type="hidden" name="des" value="'.$des.'">';
$BODY.='<input type="hidden" name="cos" value="'.$cos.'">';
$BODY.='<input type="hidden" name="int" value="'.$int.'">';
$BODY.='<input type="hidden" name="sag" value="'.$sag.'">';
$BODY.='<input type="hidden" name="car" value="'.$car.'">';
$BODY.='<input type="submit" value="Accetta i risultati" class="btn">';
$BODY.='</form>';
?>
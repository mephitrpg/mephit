<?php
$BODY.='<script src="js/dndtools/dndcharsgen_elite.js"></script>
<form name="f" action="'.$_SERVER[PHP_SELF].'?dndtool='.$_GET["dndtool"].'&step=3" method="post">
<input type="hidden" name="metodo" value="rilancio">
<table border=0 cellpadding=4 cellspacing=0 id="tableCAR">
<tr>
<th>Scegli</th>
<th>Rilanci<br />possibili</th>
<th>Risultati<br />dei lanci</th>
<th>Punt senza<br />rilancio</th>
<th>Mod senza<br />rilancio</th>
</tr>';


$c=$for;
sort($c);
$t=array_sum(array_splice($c,1-count($c)));
$BODY.='<tr align=center>
<td><input type="radio" name="rilancio" value="for"></td>
<td align="left">Rilancia "'.$c[0].'"</td>
<td>'.$for[0].', '.$for[1].', '.$for[2].', '.$for[3].'</td>
<td>'.$t.'</td>
<td>'.M($t).'</td>
</tr>';

$c=$des;
sort($c);
$t=array_sum(array_splice($c,1-count($c)));
$BODY.='<tr align=center>
<td><input type="radio" name="rilancio" value="des"></td>
<td align="left">Rilancia "'.$c[0].'"</td>
<td>'.$des[0].', '.$des[1].', '.$des[2].', '.$des[3].'</td>
<td>'.$t.'</td>
<td>'.M($t).'</td>
</tr>';

$c=$cos;
sort($c);
$t=array_sum(array_splice($c,1-count($c)));
$BODY.='<tr align=center>
<td><input type="radio" name="rilancio" value="cos"></td>
<td align="left">Rilancia "'.$c[0].'"</td>
<td>'.$cos[0].', '.$cos[1].', '.$cos[2].', '.$cos[3].'</td>
<td>'.$t.'</td>
<td>'.M($t).'</td>
</tr>';

$c=$int;
sort($c);
$t=array_sum(array_splice($c,1-count($c)));
$BODY.='<tr align=center>
<td><input type="radio" name="rilancio" value="int"></td>
<td align="left">Rilancia "'.$c[0].'"</td>
<td>'.$int[0].', '.$int[1].', '.$int[2].', '.$int[3].'</td>
<td>'.$t.'</td>
<td>'.M($t).'</td>
</tr>';

$c=$sag;
sort($c);
$t=array_sum(array_splice($c,1-count($c)));
$BODY.='<tr align=center>
<td><input type="radio" name="rilancio" value="sag"></td>
<td align="left">Rilancia "'.$c[0].'"</td>
<td>'.$sag[0].', '.$sag[1].', '.$sag[2].', '.$sag[3].'</td>
<td>'.$t.'</td>
<td>'.M($t).'</td>
</tr>';

$c=$car;
sort($c);
$t=array_sum(array_splice($c,1-count($c)));
$BODY.='<tr align=center>
<td><input type="radio" name="rilancio" value="car"></td>
<td align="left">Rilancia "'.$c[0].'"</td>
<td>'.$car[0].', '.$car[1].', '.$car[2].', '.$car[3].'</td>
<td>'.$t.'</td>
<td>'.M($t).'</td>
</tr>';

$BODY.='<tr align=center>
<td><input type="radio" name="rilancio" value="none" checked></td>
<td colspan="4" align="left">Accetta i risultati</td>
</tr>
</table><br />
<input type="hidden" name="for" value="'.htmlspecialchars(serialize($for)).'">
<input type="hidden" name="des" value="'.htmlspecialchars(serialize($des)).'">
<input type="hidden" name="cos" value="'.htmlspecialchars(serialize($cos)).'">
<input type="hidden" name="int" value="'.htmlspecialchars(serialize($int)).'">
<input type="hidden" name="sag" value="'.htmlspecialchars(serialize($sag)).'">
<input type="hidden" name="car" value="'.htmlspecialchars(serialize($car)).'">
<input type="submit" value="Avanti" class="btn">
</form>';
?>
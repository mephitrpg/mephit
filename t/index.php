<script src="mathcontext.js"></script>
<script src="bigdecimal.js"></script>
<script>
//http://www.php.net/manual/en/ref.bc.php
function deg2rad(q){return new BigDecimal(q/180+"").multiply(new BigDecimal("3.141592653589793238462643383279502884197169399375"));}
</script>
<div style="font:16pt courier new;">
<table>
<?
for($i=0;$i<3600;$i+=5){
	$a=$i/10;
	$rad=deg2rad($a);
	$tan[$a]=tan($rad);
	$sin[$a]=sin($rad);
	$cos[$a]=cos($rad);
	echo '<tr><td>PHP tan('.sprintf("%.1f",$a).')</td><td>= tan('.$rad.')</td><td></td><td>= '. tan($rad).'</td></tr>';
	echo "\n";
	echo '<tr><td>JS&nbsp; tan('.sprintf("%.1f",$a).')</td><td>= <script>document.write("tan("+('.$a.'/180*Math.PI)+")</td><td></td><td>= "+Math.tan('.$a.'/180*Math.PI));</script></td></tr>';
	echo "\n";
	echo '<tr><td>JS2 tan('.sprintf("%.1f",$a).')</td><td>= <script>document.write("tan("+deg2rad('.$a.')+")</td><td>= "+Math.tan(deg2rad('.$a.'))+"</td><td>= "+(Math.tan(deg2rad('.$a.'))*1));</script></td></tr>';
	echo "\n";
	echo '<tr><td>'.'<br>'.'</td></tr>';
	echo "\n";
}
?>
</table>
</div>
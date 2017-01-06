<?php

$BODY.='		</div>
';
$BODY.='		</td>
';

require(dirname(__FILE__)."/dndcharsgen35_tabsContent.php");

$BODY.='		</tr><tr><td colspan="3">
';

/*
$BODY.='	</div>
</div>
';
*/
/*
$BODY.='<br />

<div style="padding:4px;background-color:#C00000;" align="center">';
if($_SESSION[logged]){
	$BODY.='<script>';
	$BODY.='document.write("<input type=submit class=btn value=\"Salva\">");';
	$BODY.='</script><noscript><b style="color:#fff;">NON PUOI USARE I DNDTOOLS CON JAVASCRIPT DISABILITATO!!!</b></noscript></div>';
}else{
	$BODY.='<b style="color:#fff;">PER SALVARE IL PERSONAGGIO DEVI ESSERE LOGGATO!!!</b>';
}*/

$BODY.='


		</td></tr><tr><td colspan="3"><br />
<div style="background-color:#C00000;">
	
	<table border="0" cellpadding="0" cellspacing="4" width="100%"><tr>
	<td><b style="color:#fff;">
		POTRAI MODIFICARE I TUOI DATI ANCHE DOPO AVER SALVATO
	</b>
	</td>
	<td align="right">
		<input type=submit class=btn value="Salva">
	</td>
	</tr></table>
		
</div>

</td></tr>
</table>

';

$BODY.='</form>';
?>
<?php
$url="http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$mephit_root=str_replace("\\","/",substr(dirname(__FILE__),strlen($_SERVER[DOCUMENT_ROOT])));
?>
<!DOCTYPE html>
<html lang="it"><head>
	<title>Errore 404</title>
	<style>
		HTML,BODY{height:100%;}
		BODY{margin:0;background:#fff;}
		TD{font-size:16px;font-family:Palatino Linotype, Book Antiqua3, Palatino, serif;}
		A{color:#000;}
	</style>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-27181692-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</head><body>
	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%"><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" align="center"><tr>
		<td><img src="<?=$mephit_root?>/images/404.gif" width="128" height="128"></td>
		<td>
			<strong style="font-size:36px;">Fallimento critico</strong><br>
			mentre facevi una prova di <em>Cercare</em><br>
			
			<span style="font-size:10px;"><?=$url;?></span><br>
			
			<a href="javascript:;" onclick="location.reload();">Ritenta</a> - <a href="<?=$mephit_root?>/">Ricomincia</a><br>
			<br>
		</td>
	</tr></table>
	</td></tr></table>
</body></html>
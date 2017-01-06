<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Apri MEPHIT</title>
<script>
function apri(q){
	switch(q){
		case"frame":
			opener.location.href="inframe.php";
		break;
		case"stessa":
			opener.location.href="../index.php";
		break;
		case"nuova":
			window.open("../index.php")
		break;
	}
	window.close();
}
</script>
<link rel=stylesheet href="../css/mephit_admin.css" type=text/css>
</head>

<body style="margin:0px;" bgcolor="#cccccc">

<table summary="." border="0" cellpadding="0" cellspacing="0" width="100%" height="100"><form><tr><td align="center"><b>Dove vuoi aprire MEPHIT?</b><br><br><br>
<input type=button value="in frame" onclick="apri('frame')">
<input type=button value="nuova finestra" onclick="apri('nuova')">
<input type=button value="stessa finestra" onclick="apri('stessa')">
<input type=button value="annulla" onclick="apri('annulla')">
</td></form></tr></table>

</body>
</html>

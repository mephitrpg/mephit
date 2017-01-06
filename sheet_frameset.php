<?php
# Permessi
require_once("include/login/permessi.php");

# Configuration (language)
require_once("include/sheet/config.php");

# Language Selection
require_once("include/languages/sheet/".$_COOKIE["mephit_lang"].".php");
?>
<html><head><title>Scheda del Personaggio 3.5</title>
</head>
<frameset  rows="22,*" border="0" frameborder="0" framespacing="0">
    <frame name="menu" src="sheet_menu.php?id=<?=$_GET["id"]?>" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" noresize>
    <frame name="sheet" src="" marginwidth="0" marginheight="0" frameborder="0">
</frameset>
</html>
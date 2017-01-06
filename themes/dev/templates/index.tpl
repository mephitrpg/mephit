<html><head>
<title>Prototype</title>
<title>{$website_title}</title>
<script src="js/tooltip.js"></script>
<link rel=stylesheet href="css/mephit.css">
<link rel=stylesheet href="themes/{$theme_dir}/css/theme.css">
</head><body bgcolor=ffffff topmargin=0 marginheight=0 leftmargin=0 marginwidth=0 rightmargin=0 bottommargin=0>
<!-- giocatori -->
<!-- /giocatori -->
<table border=0 cellpadding=0 cellspacing=0><tr valign="top"><td>
<!-- menusx -->
<a href="index.php">'.$_LANG["home"].'</a><br><br>
<a href="crea.php">{$_LANG.create}</a><br><br>
<a href="creazioni.php">{$_LANG.creations}</a><br><br>
<a href="dndtools.php">{$_LANG.dndtools}</a><br><br>
<a href="links.php">{$_LANG.links}</a><br><br>
<a href="community.php">{$_LANG.community}</a><br><br>
<!-- /menusx -->
</td><td width="20">
</td><td>
<b>{$title}</b><br>
{$body}
</td><td id="devLogin">{$login}</td></tr></table>
<script src="themes/{$theme_dir}/js/theme.js"></script>
</body></html>
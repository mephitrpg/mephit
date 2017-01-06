<html><head><title>{$website_title}</title>
<script src="js/tooltip.js"></script>
<script src="js/common.js"></script>
<link rel=stylesheet href="css/mephit.css">
<link rel=stylesheet href="themes/{$theme_dir}/css/theme.css">
</head><body bgcolor=ffffff topmargin=0 marginheight=0 leftmargin=0 marginwidth=0 rightmargin=0 bottommargin=0>
<table border=0 cellpadding=0 cellspacing=0 width="100%" height="100%"><tr class=bg-dark>
<td colspan=2 rowspan=2 width=200 height=89><a href="index.php"><img src="themes/{$theme_dir}/images/logo.gif" width="200" height="89" border=0></a></td>
<td colspan=2 width="100%" height=42 align=right>HOME</td>
</tr><tr class=bg-light>
<td colspan=2 height=47>
<!-- giocatori -->
<form name="nav" action="index.php" method="get">
{$gruppi}
{$gruppi_options}
</form>
<!-- /giocatori -->
</td></tr>
<tr valign=top>
<!-- menusx -->
<td width=41 class=bg-dark align=center><br>
<a href="index.php"><img src="themes/{$theme_dir}/images/d4.gif" width=32 height=32 border=0></a><br><br>
<a href="personaggi.php"><img src="themes/{$theme_dir}/images/d6.gif" width=32 height=32 border=0></a><br><br>
<a href="giocatori.php"><img src="themes/{$theme_dir}/images/d8.gif" width=32 height=32 border=0></a><br><br>
<a href="links.php"><img src="themes/{$theme_dir}/images/d10.gif" width=32 height=32 border=0></a><br><br>
<a href="dndtools.php"><img src="themes/{$theme_dir}/images/d12.gif" width=32 height=32 border=0></a><br><br>
<a href="altro.php"><img src="themes/{$theme_dir}/images/d20.gif" width=32 height=32 border=0></a><br><br>
</td><td width=154 id=menusx class=bg-light style="padding:0px 6px;"><br>
<a href="index.php">'.$_LANG["home"].'</a><br><br>
<a href="personaggi.php">{$_LANG.characters}</a><br><br>
<a href="giocatori.php">{$_LANG.players}</a><br><br>
<a href="dndtools.php">{$_LANG.dndtools}</a><br><br>
<a href="links.php">{$_LANG.links}</a><br><br>
<a href="altro.php">{$_LANG.other}</a>
</td>
<!-- /menusx -->
<td style="padding:20px;" width="100%"><div align="justify">
<h1>{$title}</h1>
{$body}
</div></td><td width="152" nowrap id=coldx align="center"><br>
<!-- dx -->
<h3>{$_LANG.user}</h3>
<a href="#" style="font:bold 10px 'Trebuchet MS';"><img src="images/avatar/firefox.gif" width=64 height=64 border=0><br>
firefox</a><br><br>
<h3>{$_LANG.calendar}</h3>
<table border=0 cellpadding=0 cellspacing=0 align="center"><tr><td class="bg-dark" style="padding:4px;">{$calendarSx1}

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 ID=CALMENU><TR>
<TD style=font-size:10pt;>&laquo;</TD>
<TD ALIGN=CENTER WIDTH="100%"><a href=#>Agenda</a></TD>
<TD style=font-size:10pt;>&raquo;</TD></TD>
</TR></TABLE>

</td></tr></table><br>
<a href="http://mephit.sourceforge.net/" target="_blank"><img src="themes/{$theme_dir}/images/ad_mephit_120x60.gif" width="120" height="60" border="0"></a>
<!-- /dx -->
</td></tr></table>
</body></html>
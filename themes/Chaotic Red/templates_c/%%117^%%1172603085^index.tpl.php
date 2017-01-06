<?php /* Smarty version 2.6.2, created on 2009-11-08 16:12:47
         compiled from index.tpl */ ?>
<html><head><title><?php echo $this->_tpl_vars['website_title']; ?>
</title>
<!-- 
< !--[if lt IE 7]><script src="js/ie7/ie7-standard-p.js" type="text/javascript"></script><![endif]-- >
-->
<script src="js/common.js"></script>
<link rel=stylesheet href="css/mephit.css">
<link rel=stylesheet href="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/css/theme.css">
</head><body>
<table border=0 cellpadding=0 cellspacing=0 width="100%" height="100%"><tr class=bg-dark valign="top">

<td height="89"><a href="index.php"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/logo.gif" width="200" height="89" border=0></a></td>
<td colspan=2 background="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/header_bg.gif"><img src="images/acualpixelnightbanner_01.jpg" style="margin:4 0 0 20px;"><br />
<marquee behavior="scroll" scrollamount="2" scrolldelay="6" style="color:#fff;padding:3px 0;"><b>TITOLO:</b> Incredibile! MEPHIT sbarca in Messico!</marquee>
</td>

</tr>
<tr valign=top>
<!-- menusx -->
<td class=bg-sx>
<div id=menusx>
<div><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d4.gif" width=32 height=32 align="absmiddle">Home</div>
<a href="index.php"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d4.gif" width=32 height=32 align="absmiddle">Home</a>
<span>&nbsp;</span>
<div><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d6.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['create']; ?>
</div>
<a href="crea.php"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d6.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['create']; ?>
</a>
<span>&nbsp;</span>
<div><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d8.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['creations']; ?>
</div>
<a href="creazioni.php"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d8.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['creations']; ?>
</a>
<span>&nbsp;</span>
<div><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d10.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['dndtools']; ?>
</div>
<span style="text-decoration:line-through;"><a href="dndtools.php"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d10.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['dndtools']; ?>
</a></span>
<span>&nbsp;</span>
<div><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d12.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['links']; ?>
</div>
<a href="links.php"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d12.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['links']; ?>
</a>
<span>&nbsp;</span>
<div><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d20.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['community']; ?>
</div>
<a href="community.php"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/d20.gif" width=32 height=32 align="absmiddle"><?php echo $this->_tpl_vars['_LANG']['community']; ?>
</a>
<span>&nbsp;</span>
</div>
<br>
<div id="roller" title="Scrivi un lancio di dadi e premi INVIO. Esempio: (3d6+4)*2">
<b>Fast Roller</b>
<div id="rollerControls">
<form name="fastRoll" action="javascript:return false;" onSubmit="fastRollExec();">
<input type="submit" value="&gt;" class="btn"><input name="esp" class="exp">
</form>
</div>
</div>
</td>
<!-- /menusx -->
<td style="padding:20px;" width="100%"><div id="path"><?php echo $this->_tpl_vars['path']; ?>
<br /><br /></div><div align="justify">
<table summary="." border="0" cellpadding="0" cellspacing="0" width="100%"><tr>
<td><h1><?php echo $this->_tpl_vars['title']; ?>
</h1></td>
<td align="right"><?php echo $this->_tpl_vars['buttons']; ?>
</td>
</tr></table>


<?php echo $this->_tpl_vars['body']; ?>

</div></td><td width="152" nowrap id=coldx align="center"><br>
<!-- dx -->
<?php echo $this->_tpl_vars['login']; ?>

<br>
<h3><?php echo $this->_tpl_vars['_LANG']['calendar']; ?>
</h3>
<table border=0 cellpadding=0 cellspacing=0 align="center"><tr><td class="bg-dark" style="padding:4px;"><?php echo $this->_tpl_vars['calendarSx1']; ?>


<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 ID=CALMENU><TR>
<TD style=font-size:10pt;>&laquo;</TD>
<TD ALIGN=CENTER WIDTH="100%"><a href="agenda.php">Agenda</a></TD>
<TD style=font-size:10pt;>&raquo;</TD></TD>
</TR></TABLE>

</td></tr></table><br>
<a href="http://mephit.sourceforge.net/" target="_blank"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/ad_mephit_120x60.gif" width="120" height="60" border="0"></a><br>
<a href="ogl.php"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/ad_ogl_120x15.gif" width="120" height="15" border="0" vspace="4"></a><br>
<a href="ogl.php#software"><img src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/ad_oglSoftware_120x15.gif" width="120" height="15" border="0"></a><br><br>
<!-- /dx -->
</td></tr></table>
</body></html>
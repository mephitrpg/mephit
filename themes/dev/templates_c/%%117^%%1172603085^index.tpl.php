<?php /* Smarty version 2.6.2, created on 2008-08-08 09:45:06
         compiled from index.tpl */ ?>
<html><head>
<title>Prototype</title>
<title><?php echo $this->_tpl_vars['website_title']; ?>
</title>
<script src="js/tooltip.js"></script>
<link rel=stylesheet href="css/mephit.css">
<link rel=stylesheet href="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/css/theme.css">
</head><body bgcolor=ffffff topmargin=0 marginheight=0 leftmargin=0 marginwidth=0 rightmargin=0 bottommargin=0>
<!-- giocatori -->
<!-- /giocatori -->
<table border=0 cellpadding=0 cellspacing=0><tr valign="top"><td>
<!-- menusx -->
<a href="index.php">'.$_LANG["home"].'</a><br><br>
<a href="crea.php"><?php echo $this->_tpl_vars['_LANG']['create']; ?>
</a><br><br>
<a href="creazioni.php"><?php echo $this->_tpl_vars['_LANG']['creations']; ?>
</a><br><br>
<a href="dndtools.php"><?php echo $this->_tpl_vars['_LANG']['dndtools']; ?>
</a><br><br>
<a href="links.php"><?php echo $this->_tpl_vars['_LANG']['links']; ?>
</a><br><br>
<a href="community.php"><?php echo $this->_tpl_vars['_LANG']['community']; ?>
</a><br><br>
<!-- /menusx -->
</td><td width="20">
</td><td>
<b><?php echo $this->_tpl_vars['title']; ?>
</b><br>
<?php echo $this->_tpl_vars['body']; ?>

</td><td id="devLogin"><?php echo $this->_tpl_vars['login']; ?>
</td></tr></table>
<script src="themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/js/theme.js"></script>
</body></html>
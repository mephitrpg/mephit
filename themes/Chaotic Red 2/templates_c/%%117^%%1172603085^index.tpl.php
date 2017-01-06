<?php /* Smarty version 2.6.2, created on 2014-03-15 01:09:44
         compiled from index.tpl */ ?>
<html><head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Test</title>
<title><?php echo $this->_tpl_vars['website_title']; ?>
</title>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/js/lightwindow/lightwindow.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/css/mephit.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/css/theme.css">

<?php echo $this->_tpl_vars['js']; ?>

</head><body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td height="80" style="background:url('<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/topbg.gif') 0 bottom repeat-x;" valign="bottom">

<div style="float:right;margin:8px;">
	<!--
	<script type="text/javascript"><!--
	google_ad_client = "pub-1761876681942419";
	/* 468x60, creato 15/05/08 */
	google_ad_slot = "0552705198";
	google_ad_width = 468;
	google_ad_height = 60;
	//-->
	</script>
	-->
	<!--
	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
	-->
	ADS QUI
</div>
<div id="topmenutabs">
		<?php if ($this->_tpl_vars['tab1'] == 'crea'): ?>
			<a href="crea.php" class="sel">crea</a>
		<?php else: ?>
			<a href="crea.php">crea</a>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['tab1'] == 'risorse'): ?>
			<a href="risorse.php" class="sel">risorse</a>
		<?php else: ?>
			<a href="risorse.php">risorse</a>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['tab1'] == 'community'): ?>
			<a href="community.php" class="sel">community</a>
		<?php else: ?>
			<a href="community.php">community</a>
		<?php endif; ?>
		<a href="http://www.mephit.it/blog/">blog</a>
<!--
		<a href="http://project.mephit.it/">project</a>
		<a href="http://www.mephit.it/dndtools/">dndtools</a>
		<a href="http://project.mephit.it/ita/shots.php">preview</a>
-->
</div>

</td></tr>
</table>

<div id="menuBar" class="row">
	
	<div style="float:right;width:42%;text-align:right;"><?php echo $this->_tpl_vars['login']; ?>
</div>
	
	<div class="col" style="width:42%;">
		<div class="col" style="padding-top:0.1em;padding-right:0.5em;">
			<a href="http://www.mephit.it/blog/index.php/cos-e-mephit/" class="last"><img src="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/tm_info_1.gif" border="0"></a>
			<a href="http://www.mephit.it/blog/index.php/contatti/"><img src="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/tm_contacts_1.gif" border="0"></a>
			<a href="/index.php"><img src="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/tm_home_1.gif" border="0"></a>
		</div>
		<?php echo $this->_tpl_vars['path']; ?>

	</div>
	
	<div class="col" style="width:16%;text-align:center;"><?php echo $this->_tpl_vars['alerts']; ?>
</div>
	
</div>
<div class="content">
	<div>
		<div style="float:right;"><br><?php echo $this->_tpl_vars['buttons']; ?>
</div>
		<div style="float:left;"><h1><?php echo $this->_tpl_vars['title']; ?>
</h1></div>
		<br clear="all">
	</div>
	<?php echo $this->_tpl_vars['body']; ?>

</div>

<!--
<div>
	<a href="crea.php"><?php echo $this->_tpl_vars['_LANG']['create']; ?>
</a> &nbsp; | &nbsp;
	<a href="creazioni.php"><?php echo $this->_tpl_vars['_LANG']['creations']; ?>
RISORSE (+link)</a> &nbsp; | &nbsp;
	<a href="dndtools.php"><?php echo $this->_tpl_vars['_LANG']['dndtools']; ?>
</a> &nbsp; | &nbsp;
	<a href="links.php"><?php echo $this->_tpl_vars['_LANG']['links']; ?>
</a> &nbsp; | &nbsp;
	<a href="community.php"><?php echo $this->_tpl_vars['_LANG']['community']; ?>
</a> &nbsp; | &nbsp;
</div>
-->

<br>
</body></html>
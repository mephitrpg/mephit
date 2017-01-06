<?php /* Smarty version 2.6.2, created on 2014-03-15 17:39:02
         compiled from index.tpl */ ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Test</title>
	<title><?php echo $this->_tpl_vars['website_title']; ?>
</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/css/normalize.css">
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/css/main.css">
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/css/theme-bordeaux.css">
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/css/theme-chaotic-red-2.css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,700,700italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/js/lightwindow/lightwindow.css">
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/css/mephit.css">
	
	<script src="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/js/vendor/modernizr-2.6.2.min.js"></script>

	<?php echo $this->_tpl_vars['js']; ?>

</head>
<body>
<div id="bodyPadding">
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	
	<a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/"><img src="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/themes/<?php echo $this->_tpl_vars['theme_dir']; ?>
/images/logo-header.png"></a><br><br>
	
	<nav id="mainmenu">
		<ul class="clearfix">
			<?php if ($this->_tpl_vars['tab1'] == 'home'): ?>
				<li class="sel"><a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/">Home</a></li>
			<?php else: ?>
				<li><a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/">Home</a></li>
			<?php endif; ?>
			<li class="sep">
				<div class="a">&nbsp;</div>
				<div class="b">&nbsp;</div>
				<div class="a">&nbsp;</div>
			</li>
			<?php if ($this->_tpl_vars['tab1'] == 'crea'): ?>
				<li class="sel"><a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/crea.php">Crea!</a></li>
			<?php else: ?>
				<li><a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/crea.php">Crea!</a></li>
			<?php endif; ?>
			<li class="sep">
				<div class="a">&nbsp;</div>
				<div class="b">&nbsp;</div>
				<div class="a">&nbsp;</div>
			</li>
			<?php if ($this->_tpl_vars['tab1'] == 'risorse'): ?>
				<li class="sel"><a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/risorse.php">Risorse</a></li>
			<?php else: ?>
				<li><a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/risorse.php">Risorse</a></li>
			<?php endif; ?>
			<li class="sep">
				<div class="a">&nbsp;</div>
				<div class="b">&nbsp;</div>
				<div class="a">&nbsp;</div>
			</li>
			<?php if ($this->_tpl_vars['tab1'] == 'community'): ?>
				<li class="sel"><a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/community.php">Community</a></li>
			<?php else: ?>
				<li><a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/community.php">Community</a></li>
			<?php endif; ?>
			<li class="sep">
				<div class="a">&nbsp;</div>
				<div class="b">&nbsp;</div>
				<div class="a">&nbsp;</div>
			</li>
			<li><a href="http://www.mephit.it/blog/">Blog</a></li>
			<li class="sep">
				<div class="a">&nbsp;</div>
				<div class="b">&nbsp;</div>
				<div class="a">&nbsp;</div>
			</li>
			<li><a href="http://www.mephit.it/blog/index.php/cos-e-mephit/">About</a></li>
			<li class="sep">
				<div class="a">&nbsp;</div>
				<div class="b">&nbsp;</div>
				<div class="a">&nbsp;</div>
			</li>
			<li><a href="http://www.mephit.it/blog/contatti/">Contatti</a></li>
		</ul>
	</nav>
	<div id="contentShadow" class="border-radious">
		<div id="contentGradientTop1" class="border-radious"></div>
		<div id="contentGradientTop2"></div>
		<div id="contentContainer" class="border-radious">
			<div id="contentPadding">
				<div id="content">
					
					<div id="menuBar" class="row">
						
						<div style="float:right;width:42%;text-align:right;"><?php echo $this->_tpl_vars['login']; ?>
</div>
						
						<div class="col" style="width:42%;">
							<div class="col" style="padding-top:0.1em;padding-right:0.5em;">
								<a href="<?php echo $this->_tpl_vars['mephit_dir']; ?>
/"><img src="<?php echo $this->_tpl_vars['mephit_dir']; ?>
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
					
					
				</div>
			</div>
		</div>
	</div>
	
</div>
</body>
</html>
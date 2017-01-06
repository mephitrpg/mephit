<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Test</title>
	<title>{$website_title}</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="{$mephit_dir}/themes/{$theme_dir}/css/normalize.css">
	<link rel="stylesheet" href="{$mephit_dir}/themes/{$theme_dir}/css/main.css">
	<link rel="stylesheet" href="{$mephit_dir}/themes/{$theme_dir}/css/theme-bordeaux.css">
	<link rel="stylesheet" href="{$mephit_dir}/themes/{$theme_dir}/css/theme-chaotic-red-2.css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,700,700italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="{$mephit_dir}/js/lightwindow/lightwindow.css">
	<link rel="stylesheet" href="{$mephit_dir}/css/mephit.css">
	
	<script src="{$mephit_dir}/themes/{$theme_dir}/js/vendor/modernizr-2.6.2.min.js"></script>

	{$js}
</head>
<body>
<div id="bodyPadding">
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	
	<a href="{$mephit_dir}/"><img src="{$mephit_dir}/themes/{$theme_dir}/images/logo-header.png"></a><br><br>
	
	<nav id="mainmenu">
		<ul class="clearfix">
			{if $tab1 == "home" }
				<li class="sel"><a href="{$mephit_dir}/">Home</a></li>
			{else}
				<li><a href="{$mephit_dir}/">Home</a></li>
			{/if}
			<li class="sep">
				<div class="a">&nbsp;</div>
				<div class="b">&nbsp;</div>
				<div class="a">&nbsp;</div>
			</li>
			{if $tab1 == "crea" }
				<li class="sel"><a href="{$mephit_dir}/crea.php">Crea!</a></li>
			{else}
				<li><a href="{$mephit_dir}/crea.php">Crea!</a></li>
			{/if}
			<li class="sep">
				<div class="a">&nbsp;</div>
				<div class="b">&nbsp;</div>
				<div class="a">&nbsp;</div>
			</li>
			{if $tab1 == "risorse" }
				<li class="sel"><a href="{$mephit_dir}/risorse.php">Risorse</a></li>
			{else}
				<li><a href="{$mephit_dir}/risorse.php">Risorse</a></li>
			{/if}
			<li class="sep">
				<div class="a">&nbsp;</div>
				<div class="b">&nbsp;</div>
				<div class="a">&nbsp;</div>
			</li>
			{if $tab1 == "community" }
				<li class="sel"><a href="{$mephit_dir}/community.php">Community</a></li>
			{else}
				<li><a href="{$mephit_dir}/community.php">Community</a></li>
			{/if}
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
						
						<div style="float:right;width:42%;text-align:right;">{$login}</div>
						
						<div class="col" style="width:42%;">
							<div class="col" style="padding-top:0.1em;padding-right:0.5em;">
								<a href="{$mephit_dir}/"><img src="{$mephit_dir}/themes/{$theme_dir}/images/tm_home_1.gif" border="0"></a>
							</div>
							{$path}
						</div>
						
						<div class="col" style="width:16%;text-align:center;">{$alerts}</div>
						
					</div>
					<div class="content">
						<div>
							<div style="float:right;"><br>{$buttons}</div>
							<div style="float:left;"><h1>{$title}</h1></div>
							<br clear="all">
						</div>
						{$body}
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
	
</div>
</body>
</html>

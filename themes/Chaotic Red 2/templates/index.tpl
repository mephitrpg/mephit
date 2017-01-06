<html><head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Test</title>
<title>{$website_title}</title>
<link rel="stylesheet" href="{$mephit_dir}/js/lightwindow/lightwindow.css">
<link rel="stylesheet" href="{$mephit_dir}/css/mephit.css">
<link rel="stylesheet" href="{$mephit_dir}/themes/{$theme_dir}/css/theme.css">

{$js}
</head><body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td height="80" style="background:url('{$mephit_dir}/themes/{$theme_dir}/images/topbg.gif') 0 bottom repeat-x;" valign="bottom">

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
		{if $tab1 == "crea" }
			<a href="crea.php" class="sel">crea</a>
		{else}
			<a href="crea.php">crea</a>
		{/if}
		{if $tab1 == "risorse" }
			<a href="risorse.php" class="sel">risorse</a>
		{else}
			<a href="risorse.php">risorse</a>
		{/if}
		{if $tab1 == "community" }
			<a href="community.php" class="sel">community</a>
		{else}
			<a href="community.php">community</a>
		{/if}
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
	
	<div style="float:right;width:42%;text-align:right;">{$login}</div>
	
	<div class="col" style="width:42%;">
		<div class="col" style="padding-top:0.1em;padding-right:0.5em;">
			<a href="http://www.mephit.it/blog/index.php/cos-e-mephit/" class="last"><img src="{$mephit_dir}/themes/{$theme_dir}/images/tm_info_1.gif" border="0"></a>
			<a href="http://www.mephit.it/blog/index.php/contatti/"><img src="{$mephit_dir}/themes/{$theme_dir}/images/tm_contacts_1.gif" border="0"></a>
			<a href="/index.php"><img src="{$mephit_dir}/themes/{$theme_dir}/images/tm_home_1.gif" border="0"></a>
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

<!--
<div>
	<a href="crea.php">{$_LANG.create}</a> &nbsp; | &nbsp;
	<a href="creazioni.php">{$_LANG.creations}RISORSE (+link)</a> &nbsp; | &nbsp;
	<a href="dndtools.php">{$_LANG.dndtools}</a> &nbsp; | &nbsp;
	<a href="links.php">{$_LANG.links}</a> &nbsp; | &nbsp;
	<a href="community.php">{$_LANG.community}</a> &nbsp; | &nbsp;
</div>
-->

<br>
</body></html>

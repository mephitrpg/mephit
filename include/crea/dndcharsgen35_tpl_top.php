<?php
$BODY.='<script src="js/dndtools/dndcharsgen35_common.js"></script>
<style>
/* start customization */
/* FONT                     */	#tabForm #tabs, #tabForm #tabs A{font:bold 10px tahoma;color:#000;text-decoration:none;}
/* BACKGROUND               */	#tabForm #content, #tabForm #tabs A.sel, #tabForm #tabs A.sel:hover {background-color:#fff;}
/* BACKGROUND               */	#tabForm #tabs A.sel {border-bottom-color:#fff;}
/* BORDERS                  */	#tabForm, #tabForm #tabs A, #tabForm #content {border:1px solid #000;}
/* TABS PADDING             */	#tabForm #tabs A, #tabForm #tabs #tabSpacer, #tabForm #content {padding:6px;}
/* TABS PADDING             */	#tabForm #tabs #tabSpacer {padding-bottom:7px;} /* = TABS PADDING + BORDERS WIDTH */
/* UNSELECTED TABS          */	#tabForm #tabs A {background-color:#999;}
/* UNSELECTED TABS ROLLOVER */	#tabForm #tabs A:hover {background-color:#ccc;}
/* SELECTED TABS ROLLOVER   */	#tabForm #tabs A.sel:hover {color:#f00;}
/* end customization */

#tabForm {border-top-width:0px;border-right-width:0px;}
#tabForm #tabs A {border-left-width:0px;}
#tabForm #content {border-bottom-width:0px;border-left-width:0px;}
#tabForm #tabs A {display:block;float:left;}
#tabForm #content .h{display:none;}
</style>
<script>/*
menuItems=["caratteristiche_tab","razza_tab","nome_tab"];
contentItems=["caratteristiche_content","razza_content","nome_content"];

function showTab(q){
	for(i=0;i<menuItems.length;i++){
		byId( menuItems[i], "blur()");
		byId( menuItems[i], "className", (menuItems[i]==q)?"sel":"" );
		byId( contentItems[i], "style.display", (menuItems[i]==q)?"block":"none" );
	}
}*/
</script>

<form name=f action="'.$_SERVER[PHP_SELF].'?dndtool='.$_GET["dndtool"].'&step=4" method="post">

';
/*
$BODY.='
<div id="tabForm">
	<div id="tabs">
		<a id="caratteristiche_tab" href="#" onclick="showTab(this.id)" class="sel">Caratteristiche</a>
		<a id="razza_tab" href="#" onclick="showTab(this.id)">Razza</a>
		<a id="nome_tab" href="#" onclick="showTab(this.id)">Nome</a>
		<div id="tabSpacer"><br /></div>
	</div>
	<div id="content">
';
*/
$BODY.='<table border="0" cellpadding="0" cellspacing="0" align="center">

';

/*
$BODY.='	</div>
</div>
';
*/
$BODY.='

<tr>
<td><h2>Caratteristiche</h2></td><td></td>
<td><h2>Nome</h2></td>
</tr>
<tr>
<td>
';
$BODY.='
		<div id="caratteristiche_content">
';
?>
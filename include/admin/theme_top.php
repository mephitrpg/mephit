<?php
$isSet=array();
$isSet["gruppo"]=mysql_num_rows(mysql_query("SELECT * FROM mephit_gruppo LIMIT 0,1"));
$isSet["campagna"]=mysql_num_rows(mysql_query("SELECT * FROM mephit_campagna LIMIT 0,1"));
$isSet["giocatore"]=mysql_num_rows(mysql_query("SELECT * FROM mephit_giocatore LIMIT 0,1"));
$isSet["avventura"]=mysql_num_rows(mysql_query("SELECT * FROM mephit_avventura LIMIT 0,1"));
$isSet["personaggio"]=mysql_num_rows(mysql_query("SELECT * FROM mephit_personaggio LIMIT 0,1"));
$isSet["sessione"]=mysql_num_rows(mysql_query("SELECT * FROM mephit_sessione LIMIT 0,1"));
$relPath=($sezione!="home"&&$sezione!="apri")?"../":"";
?>
<html><head><title>MEPHIT - Administration Tool</title>
<link rel=stylesheet href="<?=$relPath?>../css/mephit_admin.css" type=text/css>
<script>
var win_aprimephit;
s=4;m0=new Array(0);m1=new Array(0);f=new Array(<?php
$sezioni=array("gruppo","campagna","giocatore","avventura","personaggio","sessione","diario","opzioni","apri","home","foto","help");
$preload=array();
foreach($sezioni as $t){
	$preload[]=($sezione==$t)?"\"$t"."_selected\"":"\"$t\"";
}
echo implode(",",$preload);
?>)
//preload
for(i=0;i<f.length;i++){
	m0[i]=new Image();
	m0[i].src="<?=$relPath?>i/m_"+f[i]+"_0.gif";
	m1[i]=new Image();
	m1[i].src="<?=$relPath?>i/m_"+f[i]+"_1.gif";
}

function roll(q,o){
	if(document.images["b"+q])document.images["b"+q].src=(o==0)?m0[q].src:m1[q].src;
}

function apriMephit(){
	w=440;
	h=100;
	t=(screen.height-h)/2;
	l=(screen.width-w)/2;
	win_aprimephit=window.open("<?=$relPath?>popup_aprimephit.php","","width="+w+",height="+h+",left="+l+",top="+t);
	if(win_aprimephit==undefined)alert("L'apertura della popup è stata bloccata")
}
</script>
</head><body bgcolor="#ffffff" style="margin:0px" onunload="if(win_aprimephit!=undefined)win_aprimephit.close();">
<table border=0 cellpadding=6 cellspacing=0 width="100%" height="100%"><tr valign=top><td>
<br>
<table border=0 cellpadding=0 cellspacing=0>
	<tr align=center valign=top>
		<td><?php
		if($sezione=="giocatore")echo"<a href=\"".$relPath."giocatore/index.php\" onmouseover=\"roll(2,1)\" onmouseout=\"roll(2,0)\" class=menu1><img src=\"".$relPath."i/m_giocatore_selected_0.gif\" name=b2 width=48 height=48 border=0><br>Giocatore</a>";
		else /*if($isSet["gruppo"])*/echo"<a href=\"".$relPath."giocatore/index.php\" onmouseover=\"roll(2,1)\" onmouseout=\"roll(2,0)\" class=menu1><img src=\"".$relPath."i/m_giocatore_0.gif\" name=b2 width=48 height=48 border=0><br>Giocatore</a>";
		/*else echo"<img src=\"".$relPath."i/m_giocatore_disabled.gif\" width=48 height=48><div class=menu0>Giocatore</div>";*/
		?></td>
		<td width=10 nowrap></td>
		<td><?php
		if($sezione=="gruppo")echo"<a href=\"".$relPath."gruppo/index.php\" onmouseover=\"roll(0,1)\" onmouseout=\"roll(0,0)\" class=menu1><img src=\"".$relPath."i/m_gruppo_selected_0.gif\" name=b0 width=48 height=48 border=0><br>Gruppo</a>";
		else echo"<a href=\"".$relPath."gruppo/index.php\" onmouseover=\"roll(0,1)\" onmouseout=\"roll(0,0)\" class=menu1><img src=\"".$relPath."i/m_gruppo_0.gif\" name=b0 width=48 height=48 border=0><br>Gruppo</a>";
		?></td>
	</tr>
	<tr>
		<td colspan=3 height=10></td>
	</tr>
	<tr align=center valign=top>
		<td><?php
		if($sezione=="personaggio")echo"<a href=\"".$relPath."personaggio/index.php\" onmouseover=\"roll(4,1)\" onmouseout=\"roll(4,0)\" class=menu1><img src=\"".$relPath."i/m_personaggio_selected_0.gif\" name=b4 width=48 height=48 border=0><br>Personaggio</a>";
		else if($isSet["giocatore"]&&$isSet["campagna"])echo"<a href=\"".$relPath."personaggio/index.php\" onmouseover=\"roll(4,1)\" onmouseout=\"roll(4,0)\" class=menu1><img src=\"".$relPath."i/m_personaggio_0.gif\" name=b4 width=48 height=48 border=0><br>Personaggio</a>";
		else echo"<img src=\"".$relPath."i/m_personaggio_disabled.gif\" width=48 height=48><div class=menu0>Personaggio</div>";
		?></td>
		<td width=10 nowrap></td>
		<td><?php
		if($sezione=="avventura")echo"<a href=\"".$relPath."avventura/index.php\" onmouseover=\"roll(3,1)\" onmouseout=\"roll(3,0)\" class=menu1><img src=\"".$relPath."i/m_avventura_selected_0.gif\" name=b3 width=48 height=48 border=0><br>Avventura</a>";
		else if($isSet["campagna"])echo"<a href=\"".$relPath."avventura/index.php\" onmouseover=\"roll(3,1)\" onmouseout=\"roll(3,0)\" class=menu1><img src=\"".$relPath."i/m_avventura_0.gif\" name=b3 width=48 height=48 border=0><br>Avventura</a>";
		else echo"<img src=\"".$relPath."i/m_avventura_disabled.gif\" width=48 height=48><div class=menu0>Avventura</div>";
		?></td>
	</tr>
	<tr>
		<td colspan=3 height=10></td>
	</tr>
	<tr align=center valign=top>
		<td><?php
		if($sezione=="campagna")echo"<a href=\"".$relPath."campagna/index.php\" onmouseover=\"roll(1,1)\" onmouseout=\"roll(1,0)\" class=menu1><img src=\"".$relPath."i/m_campagna_selected_0.gif\" name=b1 width=48 height=48 border=0><br>Campagna</a>";
		else if($isSet["gruppo"])echo"<a href=\"".$relPath."campagna/index.php\" onmouseover=\"roll(1,1)\" onmouseout=\"roll(1,0)\" class=menu1><img src=\"".$relPath."i/m_campagna_0.gif\" name=b1 width=48 height=48 border=0><br>Campagna</a>";
		else echo"<img src=\"".$relPath."i/m_campagna_disabled.gif\" width=48 height=48><div class=menu0>Campagna</div>";
		?></td>
		<td width=10 nowrap></td>
		<td><?php
		if($sezione=="sessione")echo"<a href=\"".$relPath."sessione/index.php\" onmouseover=\"roll(5,1)\" onmouseout=\"roll(5,0)\" class=menu1><img src=\"".$relPath."i/m_sessione_selected_0.gif\" name=b5 width=48 height=48 border=0><br>Sessione</a>";
		else if($isSet["avventura"])echo"<a href=\"".$relPath."sessione/index.php\" onmouseover=\"roll(5,1)\" onmouseout=\"roll(5,0)\" class=menu1><img src=\"".$relPath."i/m_sessione_0.gif\" name=b5 width=48 height=48 border=0><br>Sessione</a>";
		else echo"<img src=\"".$relPath."i/m_sessione_disabled.gif\" width=48 height=48><div class=menu0>Sessione</div>";
		?></td>
	</tr>
	<tr>
		<td colspan=3 height=10></td>
	</tr>
<?/*
	<tr align=center valign=top>
		<td>< ?
		if($sezione=="diario")echo"<a href=\"".$relPath."diario/index.php\" onmouseover=\"roll(6,1)\" onmouseout=\"roll(6,0)\" class=menu1><img src=\"".$relPath."i/m_diario_selected_0.gif\" name=b6 width=48 height=48 border=0><br>Diario</a>";
		else if($isSet["sessione"])echo"<a href=\"".$relPath."diario/index.php\" onmouseover=\"roll(6,1)\" onmouseout=\"roll(6,0)\" class=menu1><img src=\"".$relPath."i/m_diario_0.gif\" name=b6 width=48 height=48 border=0><br>Diario</a>";
		else echo"<img src=\"".$relPath."i/m_diario_disabled.gif\" width=48 height=48><div class=menu0>Diario</div>";
		? ></td>
		<td width=10 nowrap></td>
		<td>< ?
		if($sezione=="foto")echo"<a href=\"".$relPath."foto/index.php\" onmouseover=\"roll(10,1)\" onmouseout=\"roll(10,0)\" class=menu1><img src=\"".$relPath."i/m_foto_selected_0.gif\" name=b10 width=48 height=48 border=0><br>Foto</a>";
		else if($isSet["sessione"])echo"<a href=\"".$relPath."foto/index.php\" onmouseover=\"roll(10,1)\" onmouseout=\"roll(10,0)\" class=menu1><img src=\"".$relPath."i/m_foto_0.gif\" name=b10 width=48 height=48 border=0><br>Foto</a>";
		else echo"<img src=\"".$relPath."i/m_foto_disabled.gif\" width=48 height=48><div class=menu0>Foto</div>";
		? ></td>
	</tr>
	<tr>
		<td colspan=3 height=10></td>
	</tr>
*/?>
	<tr align=center valign=top>
		<td><?php
		if($sezione=="opzioni")echo"<a href=\"".$relPath."opzioni/index.php\" onmouseover=\"roll(7,1)\" onmouseout=\"roll(7,0)\" class=menu2><img src=\"".$relPath."i/m_opzioni_selected_0.gif\" name=b7 width=48 height=48 border=0><br>Opzioni MEPHIT</a>";
		else echo"<a href=\"".$relPath."opzioni/index.php\" onmouseover=\"roll(7,1)\" onmouseout=\"roll(7,0)\" class=menu2><img src=\"".$relPath."i/m_opzioni_0.gif\" name=b7 width=48 height=48 border=0><br>Opzioni MEPHIT</a>";
		?></td>
		<td width=10 nowrap></td>
		<td><?php
		switch($_COOKIE["mephit_adm_target"]){
			case"ask":
				if($sezione=="apri")echo"<a href=\"javascript:;\" onclick=\"apriMephit();return false;\" onmouseover=\"roll(8,1)\" onmouseout=\"roll(8,0)\" class=menu2><img src=\"".$relPath."i/m_apri_selected_0.gif\" name=b8 width=48 height=48 border=0><br>Apri MEPHIT</a>";
				else echo"<a href=\"javascript:;\" onclick=\"apriMephit();return false;\" onmouseover=\"roll(8,1)\" onmouseout=\"roll(8,0)\" class=menu2><img src=\"".$relPath."i/m_apri_0.gif\" name=b8 width=48 height=48 border=0><br>Apri MEPHIT</a>";
			break;
			case"new":
				if($sezione=="apri")echo"<a href=\"".$relPath."../index.php\" target=\"_blank\" onmouseover=\"roll(8,1)\" onmouseout=\"roll(8,0)\" class=menu2><img src=\"".$relPath."i/m_apri_selected_0.gif\" name=b8 width=48 height=48 border=0><br>Apri MEPHIT</a>";
				else echo"<a href=\"".$relPath."../index.php\" target=\"_blank\" onmouseover=\"roll(8,1)\" onmouseout=\"roll(8,0)\" class=menu2><img src=\"".$relPath."i/m_apri_0.gif\" name=b8 width=48 height=48 border=0><br>Apri MEPHIT</a>";
			break;
			case"same":
				if($sezione=="apri")echo"<a href=\"".$relPath."../index.php\" onmouseover=\"roll(8,1)\" onmouseout=\"roll(8,0)\" class=menu2><img src=\"".$relPath."i/m_apri_selected_0.gif\" name=b8 width=48 height=48 border=0><br>Apri MEPHIT</a>";
				else echo"<a href=\"".$relPath."../index.php\" onmouseover=\"roll(8,1)\" onmouseout=\"roll(8,0)\" class=menu2><img src=\"".$relPath."i/m_apri_0.gif\" name=b8 width=48 height=48 border=0><br>Apri MEPHIT</a>";
			break;
			case"frame":
				if($sezione=="apri")echo"<a href=\"".$relPath."inframe.php\" onmouseover=\"roll(8,1)\" onmouseout=\"roll(8,0)\" class=menu2><img src=\"".$relPath."i/m_apri_selected_0.gif\" name=b8 width=48 height=48 border=0><br>Apri MEPHIT</a>";
				else echo"<a href=\"".$relPath."inframe.php\" onmouseover=\"roll(8,1)\" onmouseout=\"roll(8,0)\" class=menu2><img src=\"".$relPath."i/m_apri_0.gif\" name=b8 width=48 height=48 border=0><br>Apri MEPHIT</a>";
			break;
		}
		?></td>
	</tr>
	<tr>
		<td colspan=3 height=10></td>
	</tr>
	<tr align=center valign=top>
		<td><?php
		if($sezione=="home")echo"<a href=\"".$relPath."index.php\" onmouseover=\"roll(9,1)\" onmouseout=\"roll(9,0)\" class=menu2><img src=\"".$relPath."i/m_home_selected_0.gif\" name=b9 width=48 height=48 border=0><br>Home</a>";
		else echo"<a href=\"".$relPath."index.php\" onmouseover=\"roll(9,1)\" onmouseout=\"roll(9,0)\" class=menu2><img src=\"".$relPath."i/m_home_0.gif\" name=b9 width=48 height=48 border=0><br>Home</a>";
		?></td>
		<td width=10 nowrap></td>
		<td><?php
		if($sezione=="help")echo"<a href=\"".$relPath."help/index.php\" onmouseover=\"roll(11,1)\" onmouseout=\"roll(11,0)\" class=menu2><img src=\"".$relPath."i/m_help_selected_0.gif\" name=b11 width=48 height=48 border=0><br>Help</a>";
		else echo"<a href=\"".$relPath."help/index.php\" onmouseover=\"roll(11,1)\" onmouseout=\"roll(11,0)\" class=menu2><img src=\"".$relPath."i/m_help_0.gif\" name=b11 width=48 height=48 border=0><br>Help</a>";
		?></td>
	</tr>
</table>

</td><td bgcolor="#aaaaaa"></td><td width="100%" bgcolor="#eeeeee" <?=($sezione=="apri")?"style=\"padding:0px;\"":""?>>


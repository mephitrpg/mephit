<?php
$classe=array();

$query="SELECT * FROM srd35_class WHERE id=".$_GET[id];
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$classe['nome']=$row["name_".$_MEPHIT['lang']];
	$classe['arcane']=$row['arcane'];
	$classe['divine']=$row['divine'];
	$classe['psion']=$row['psion'];
	$classe['key_ability']=$row['key_ability'];
	$classe['livelli']=array();
}

$query="
	SELECT *
	FROM srd35_class_level
	WHERE fk_classe=".$_GET[id]."
	AND level < 21
	ORDER BY level
";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$classe['livelli'][]=$row;
}


$query="
	SELECT *
	FROM srd35_class_feature_level as fl
	JOIN srd35_class_feature as cf
	WHERE fl.fk_classe=".$_GET[id]."
	AND cf.id=fl.fk_privilegio
	AND fl.fk_livello < 21
	ORDER BY fl.fk_livello, cf.name_".$_MEPHIT['lang']."
";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){

	$l = $row['fk_livello'] - 1;
	if (!isset($classe['livelli'][$l]['special'])) {
		$classe[livelli][$l]['special'] = array();
	}
	$classe[livelli][$l]['special'][] = $row;
}

$classe[martial]=!$classe[arcane]&&!$classe[divine]&&!$classe[psion]?1:0;
$showSpells=!$classe[martial];

$smarty->assign('title',$classe[nome]);

$pagPos=array();
if(isset($_GET[pag]))$pagPos[pag]="pag=".$_GET[pag];
if(isset($_GET[orderby]))$pagPos[orderby]="orderby=".$_GET[orderby];
if(count($pagPos)>0){
	$pagPos_classi="&".implode("&",$pagPos);
	$pagPos_path="?".implode("&",$pagPos);
}
$PATH='<a href="classi.php'.$pagPos_path.'">'.$_LANG["classes"].'</a> &raquo; <a href="classi.php?id='.$_GET[id].$pagPos_classi.'">'.htmlspecialchars($classe[nome])."</a>";
$TAB1='risorse';

$BODY.='<style>
#optTabs{margin:0;padding:0;list-style:none;background:#c00000;}
#optTabs LI{float:left;}
#optTabs A{display:block;line-height:2em;text-decoration:none;color:#fff;padding: 0 1em;}
#optTabs .sel A{background:#fff;color:#c00000;}
</style>';

$BODY.='<script>
function beforeSave(){
	var THs=document.getElementById("tabellaClasse").getElementsByTagName("THEAD")[0].getElementsByTagName("TR")[0].getElementsByTagName("TH"),l=THs.length;
	var headers=[];
	for(var i=0;i<l;i++){
		headers.push(THs[i].id);
	}
	var FORM=document.getElementById("form-dndtool");
	var TRs=document.getElementById("tabellaClasse").getElementsByTagName("TBODY")[0].getElementsByTagName("TR"),l=TRs.length;
	for(var i=0;i<l;i++){
		var FIELDs=$(TRs[i]).select(".v"),f=FIELDs.length,level=i+1;
		for(var j=0;j<f;j++){
//			try{
				var INPUT=document.createElement("INPUT");
				INPUT.type="hidden";
				INPUT.name="levels["+level+"]["+headers[j]+"]";
				INPUT.value=FIELDs[j].innerHTML.replace("\"","&quot;").replace("\n","").replace("\r","");
				FORM.appendChild(INPUT);
//			}catch(e){}
		}
	}
}
</script>';

$BODY.='<form id="form-dndtool" action="classi_save.php" method="post" onsubmit="beforeSave();">';
$BODY.='<input type="hidden" name="what" value="modifica">';
$BODY.='<input type="hidden" name="id" value="'.$_GET[id].'">';

$BODY.='<ul id="optTabs" class="row">
	<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[class_table].'</a></li>
	<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[class_skills].'</a></li>
	<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[proficiencies].'</a></li>
	<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[class_features].'</a></li>
	<li class="tab"><a href="javascript:;" onclick="this.blur();">'.$_LANG[other].'</a></li>
</ul>';

$BODY.='<div id="optCnt">';
	$BODY.='<div class="tabContent" style="display:none;">';
		
		require("classi_dettaglio_tabella.php");
		
	$BODY.='</div>';
	$BODY.='<div class="tabContent" style="display:none;">';
		
		require("classi_dettaglio_abilitadiclasse.php");
		
	$BODY.='</div>';
	$BODY.='<div class="tabContent" style="display:none;">';
		
		require("classi_dettaglio_competenze.php");
		
	$BODY.='</div>';
	$BODY.='<div class="tabContent" style="display:none;">';
		
		require("classi_dettaglio_privilegidiclasse.php");
		
	$BODY.='</div>';
	$BODY.='<div class="tabContent" style="display:none;">';
		
		require("classi_dettaglio_altro.php");
		
	$BODY.='</div>';
$BODY.='</div>';
$BODY.='<script>new jTab("optTabs","optCnt");</script>';

$BODY.='<br><input type="button" class="btn" value="'.$_LANG[back].'" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();"> <input type="submit" class="btn" value="'.$_LANG[save].'"><br>';

$BODY.='</form><br>';
?>
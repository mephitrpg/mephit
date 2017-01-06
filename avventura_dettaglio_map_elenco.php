<?php

$cellSize=100;

$query="SELECT * FROM mephit_map_group WHERE fk_avventura=".$_GET[id]." ORDER BY nome";
$result=mysql_query($query);
$groups_rows=array();
$groups_parents=array();
$groups_tree=array();

while($row=mysql_fetch_assoc($result)){
	$groups_rows[$row[id]]=$row;
	if(is_null($row[parent_id])){
		$groups_tree[$row[id]]=array();
	}else{
		$groups_parents[$row[parent_id]][]=$row[id];
	}
}

function walkTree(&$siblings,&$parents){
	foreach(array_keys($siblings) AS $s){
		if(isset($parents[$s])){
			foreach($parents[$s] as $c)$siblings[$s][$c]=array();
			unset($parents[$s]);
			walkTree($siblings[$s],$parents);
		}
	}
}
walkTree($groups_tree,$groups_parents);

unset($groups_parents);

$images_rows=array();
$images_grids=array();

if(count($groups_rows)>0){
	$groups_id=array_keys($groups_tree);
	$luogo=in_array($_GET[luogo],$groups_id)?$_GET[luogo]:$groups_id[0];
	$zone=array_keys($groups_tree[$luogo]);
	if(count($zone)){
		$query="SELECT *
		FROM mephit_map_image
		WHERE fk_map_group IN (".implode(",",$zone).")
		ORDER BY nome";
		$result=mysql_query($query);
		while($row=mysql_fetch_assoc($result)){
			$images_rows[$row[id]]=$row;
			$images_grids[$row[fk_map_group]][$row[x]][$row[y]]=$row;
		}
	}
}

$BODY.='
<script>
var adventure_id="'.$_GET[id].'";
var user_id="'.$_SESSION[user_id].'";
var lang_delete="'.addslashes($_LANG[delete]).'";
var lang_edit="'.addslashes($_LANG[edit]).'";
</script>
<script src="js/map_elenco_hcontrol.js"></script>
<script src="js/map_elenco_vcontrol.js"></script>
<script src="js/map_elenco.js"></script>

<style>
#luoghi {padding-bottom:10px;}
#luoghi UL{list-style:none;margin:0;padding:0;}
#luoghi A{text-decoration:none;color:#fff;display:block;*width:100%;}
#luoghi A.sel{color:#C00000;background:#fff;}
#luoghi .del:hover,#luoghi .edit:hover,#luoghi .name:hover{text-decoration:underline;}
#luoghi SPAN{padding:4px;line-height:26px;}
</style>';

$BODY.='
<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
<td width="10%" bgcolor="#C00000">
	<form action="avventura_save.php" method="post" id="delluogo-form" style="display:none;">
		<input type="hidden" name="what" value="'.$_GET[what].'">
		<input type="hidden" name="id" value="'.$_GET[id].'">
		<input type="hidden" name="luogo" value="'.$luogo.'">
		<input type="hidden" name="act" value="delluogo">
		<input type="hidden" name="idDel" id="delluogo-id">
	</form>
	<form action="avventura_save.php" method="post" id="editluogo-form" style="display:none;">
		<input type="hidden" name="what" value="'.$_GET[what].'">
		<input type="hidden" name="id" value="'.$_GET[id].'">
		<input type="hidden" name="luogo" value="'.$luogo.'">
		<input type="hidden" name="act" value="editluogo">
		<input type="hidden" name="idEdit" id="editluogo-id">
		<input type="hidden" name="nameEdit" id="editluogo-name">
	</form>
	<div id="luoghi">
	<ul>';

$i=0;
foreach($groups_tree as $id=>$childs){
	$g=$_GET;
	$g[luogo]=$id;
	$BODY.='<li>';
		$BODY.='<a href="?'.http_build_query($g).'" id="luogo-'.$id.'"'.($luogo==$id?' class="sel"':'').'>';
			$BODY.='<span class="del" id="luogo-del-'.$id.'" title="'.$_LANG[delete].'">&times;</span>';
			$BODY.='<span class="name" id="luogo-name-'.$id.'" title="'.$_LANG[select].'">'.htmlspecialchars($groups_rows[$id][nome]).'</span>';
		$BODY.='</a>';
	$BODY.='</li>';
	$i++;
}
	
$BODY.='
		<li>
			<a href="javascript:;" onclick="aggiungiLuogo();" style="color:#c00000;background:#fff;text-align:center;margin:0 20px;line-height:2em;">Aggiungi luogo</a>
			<div id="aggiungiLuogo" style="display:none;padding:4px;">
				<form action="avventura_save.php" method="post">
					<input type="hidden" name="what" value="'.$_GET[what].'">
					<input type="hidden" name="id" value="'.$_GET[id].'">
					<input type="hidden" name="luogo" value="'.$luogo.'">
					<input type="hidden" name="act" value="addluogo">
					<input id="addluogo-name" name="name">
					<input type="submit" value="'.$_LANG[add].'" />
					<a href="javascript:annullaAggiungiLuogo();" style="display:inline;">'.$_LANG[cancel].'</a>
				</form>
			</div>
		</li>
	</ul>
	</div>
</td>
<td width="90%"><div style="padding:10px 10px 10px 20px;">

<style>
.place_menu{
	background:#c00000;line-height:26px;
}
.place_menu H3{
	font-size:16px;
	margin:0 0 1px 0;float:left;
	padding:0 1em;
	color:#000;background:#fff;
}
.place_menu UL{
	float:left;padding:0;list-style:none;
	margin:0 0 0 2px;
	font-size:13px;
}
.place_menu LI{
	float:left;padding-top:2px;
}
.place_menu A {
	display:block;
	padding:0 1em;
	text-decoration:none;color:#fff;font-weight:normal !important;
}
.place_menu .sel A{
	background:#fff;color:#c00000;
}
.group-save{
	float:right;
}
.group-save a{
	display:block;float:left;
	text-decoration:underline;color:#fff;
}

.mapTab{font:bold 15px arial;}
.mapTab A{text-decoration:none;color:#fff;text-align:center;}

.hcontrol{height:19px;line-height:15px;margin-left:19px;}
.hcontrol A{display:block;float:left;height:15px;margin:2px 0;}
.hcontrol A:hover{opacity:0.5;-moz-opacity:0.5;filter: alpha(opacity=50);zoom:1;}
.hcontrol .add{width:40px;background:#080;}
.hcontrol .del{width:68px;background:#f00;}
.hcontrol .first{width:20px !important;}
.hcontrol .last{width:20px !important;}

.vcontrol{width:19px;}
.vcontrol A{display:block;width:15px;margin:0 2px;}
.vcontrol A:hover{opacity:0.5;-moz-opacity:0.5;filter: alpha(opacity=50);zoom:1;}
.vcontrol .add{height:40px;line-height:40px;background:#080;}
.vcontrol .del{height:68px;line-height:68px;background:#f00;}
.vcontrol .first{height:20px !important;line-height:20px !important;}
.vcontrol .last{height:20px !important;line-height:20px !important;}

.mapcell{width:108px;height:108px;}
.mapcell IMG{border:2px solid #fff;padding:2px;}

.addTop{border-top-color:#080 !important;}
.addBottom{border-bottom-color:#080 !important;}
.addLeft{border-left-color:#080 !important;}
.addRight{border-right-color:#080 !important;}
.delCell{background:#f00;}
.delCell IMG{opacity:0.5;-moz-opacity:0.5;filter: alpha(opacity=50);zoom:1;padding:0;border-width:4px;}
</style>
';

$i=0;
foreach($groups_tree as $id=>$childs){if($luogo==$id){
	$BODY.='<div  class="mapcontent'.($luogo==$id?'sel':'').'" id="content'.$id.'">';
	$BODY.='<div style="float:right;">';
		$BODY.='<a href="javascript:;" class="edit" id="luogo-edit-'.$id.'" title="'.$_LANG[edit].'">Modifica</a>';
		$BODY.='&nbsp;&nbsp;&nbsp;&nbsp;';
		$BODY.='<a href="javascript:;">Aggiungi area</a>';
	$BODY.='</div>';
	$BODY.='<script>
		$("luogo-edit-'.$id.'").observe("click",observeLuoghi);
	</script>';
	$BODY.='<h2 id="group-'.$id.'-title" style="margin-top:0;">'.$groups_rows[$id][nome].'</h2>';
	$BODY.='<p>'.$groups_rows[$id][note].'</p>';
	foreach(array_keys($childs) as $M){
		$BODY.='<div class="mapblock">';
			$BODY.='<div style="margin:20px 0;text-align:left;">';
				$BODY.='<div class="place_menu row">';
				$BODY.='<div class="group-save">';
					$BODY.='<a href="javascript:salvaGruppo('.$_GET[id].','.$M.','.$luogo.');">Salva</a>';
					$BODY.=' ';
					$BODY.='<a href="javascript:eliminaGruppo('.$M.');">Elimina</a>';
				$BODY.='</div>';
				$BODY.='<h3 id="group-'.$M.'-title">'.$groups_rows[$M][nome].'</h3>';
				$BODY.='<ul id="optTabs-'.$M.'">';
				$BODY.='<li class="tab sel"><a href="javascript:;">Mappa</a></li>';
				$BODY.='<li class="tab"><a href="javascript:;">Descrizione</a></li>';
				$BODY.='</ul>';
				$BODY.='</div>';
			$BODY.='</div>';
		
			$BODY.='<div id="optCnt-'.$M.'">';
				
				$BODY.='<div class="tabContent">';
					$BODY.='<div class="mapTab">';
						
						// inizio header
						$BODY.='<div class="row hcontrol">';
							for($i=0;$i<$groups_rows[$M][width];$i++){
								if($i==0){
									$BODY.='<a class="add first" href="javascript:;">+</a>';
								}else{
									$BODY.='<a class="add" href="javascript:;">+</a>';
								}
									$BODY.='<a class="del" href="javascript:;">-</a>';
								if($i==$groups_rows[$M][width]-1){
									$BODY.='<a class="add last" href="javascript:;">+</a>';
								}
							}
						$BODY.='</div>';
						// fine header
						
						// inizio body
						$BODY.='<div class="row">';
							
							// inizio sx
							$BODY.='<div class="col vcontrol">';
								for($i=0;$i<$groups_rows[$M][height];$i++){
									if($i==0){
										$BODY.='<a class="add first" href="javascript:;">+</a>';
									}else{
										$BODY.='<a class="add" href="javascript:;">+</a>';
									}
										$BODY.='<a class="del" href="javascript:;">-</a>';
									if($i==$groups_rows[$M][height]-1){
										$BODY.='<a class="add last" href="javascript:;">+</a>';
									}
								}
							$BODY.='</div>';
							// fine sx
							
							// inizio cx
							$grid_rows=$groups_rows[$M][height];
							$grid_cols=$groups_rows[$M][width];
							$BODY.='<div class="col mapgrid" id="mapgrid-'.$M.'" style="width:'.(108*$grid_cols).'px;">';
							for($r=0;$r<$grid_rows;$r++){
								$BODY.='<div class="row">';
									for($c=0;$c<$grid_cols;$c++){
										$img=$images_grids[$M][$c][$r];
										if($img["filename"]=="")$src=$GLOBALS[_MEPHIT][WWW_ROOT]."/images/mapcell_empty.jpg";
										else $src=$_MEPHIT[WWW_ROOT].'/include/phpThumb/phpThumb.php?src='.rawurlencode($mapFolder.'/'.$img[filename]).'&w='.$cellSize.'&h='.$cellSize.'&far=1&bg=ffffff';
										$BODY.='<div class="col mapcell">';
											$BODY.='<a href="?id='.$avv[id_avventura].'&what=map&luogo='.$luogo.'&item='.$img[id].'">';
												$BODY.='<img id="map-'.$img[id].'" src="'.$src.'" class="col'.$c.' row'.$r.'">';
											$BODY.='</a>';
										$BODY.='</div>';
									}
								$BODY.='</div>';
							}
							$BODY.='</div>';
							// fine cx
							
							// inizio dx
							$BODY.='<div class="col vcontrol">';
								for($i=0;$i<$groups_rows[$M][height];$i++){
									if($i==0){
										$BODY.='<a class="add first" href="javascript:;">+</a>';
									}else{
										$BODY.='<a class="add" href="javascript:;">+</a>';
									}
										$BODY.='<a class="del" href="javascript:;">-</a>';
									if($i==$groups_rows[$M][height]-1){
										$BODY.='<a class="add last" href="javascript:;">+</a>';
									}
								}
							$BODY.='</div>';
							// fine dx
							
						$BODY.='</div>';
						// fine body
						
						// inizio footer
						$BODY.='<div class="row hcontrol">';
							for($i=0;$i<$groups_rows[$M][width];$i++){
								if($i==0){
									$BODY.='<a class="add first" href="javascript:;">+</a>';
								}else{
									$BODY.='<a class="add" href="javascript:;">+</a>';
								}
									$BODY.='<a class="del" href="javascript:;">-</a>';
								if($i==$groups_rows[$M][width]-1){
									$BODY.='<a class="add last" href="javascript:;">+</a>';
								}
							}
						$BODY.='</div>';
						// fine footer
					
					
					$BODY.='</div>';
				$BODY.='</div>';
				$BODY.='<div class="tabContent" style="display:none;">';
					$BODY.=$groups_rows[$M][note];
				$BODY.='</div>';
				
			$BODY.='</div>';
		
		$BODY.='</div>';
		
		$BODY.='<script>new jTab("optTabs-'.$M.'","optCnt-'.$M.'");</script>';
		
		$i++;
	}
}}

$BODY.='</div></td></tr></table>';

?>
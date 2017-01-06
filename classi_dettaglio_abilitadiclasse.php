<?php
$BODY.='<style>
.legendina{font-style:italic;font-weight:normal;font-size:0.6em;}

@media all and (min-width: 480px) and (max-width: 800px) {
	.columns{
		-webkit-column-count: 2;
		-webkit-column-gap:   10px;  
		-moz-column-count:    2;
		-moz-column-gap:      10px;
		column-count:         2;
		column-gap:           10px;
	}
}
@media all and (min-width: 800px) and (max-width: 1024px) {
	.columns{
		-webkit-column-count: 3;
		-webkit-column-gap:   10px;  
		-moz-column-count:    3;
		-moz-column-gap:      10px;
		column-count:         3;
		column-gap:           10px;
	}
}
@media all and (min-width: 1024px) {
	.columns{
		-webkit-column-count: 4;
		-webkit-column-gap:   10px;  
		-moz-column-count:    4;
		-moz-column-gap:      10px;
		column-count:         4;
		column-gap:           10px;
	}
}

#theSkills UL{
	margin:0 0 0 2em;padding:0 0 0 1em;list-style:none;
}
#theSkills LABEL{
	display:block;
	text-indent:-1.8em;
}
#theSkills h3{
	margin-left:0em;
}
#theSkills LI:hover{background:#eee;}
#theSkills .psionic,H2	.psionic{}
</style>';
$BODY.='<script>
function toggleCheckboxes(cb){
	var id=cb.id.split("-")[1];
	var check=cb.checked;
	var INPUTs=document.getElementById("list-"+id).getElementsByTagName("INPUT"),i=INPUTs.length;
	while(i--)INPUTs[i].checked=check;
}
function togglerInit(id){
	var cb=document.getElementById("toggler-"+id);
	if(cb){
		var INPUTs=document.getElementById("list-"+id).getElementsByTagName("INPUT"),i=INPUTs.length;
		var check=true;
		while(i--)check=check&&INPUTs[i].checked;
		cb.checked=check;
	}
}
</script>';

$query="SELECT fk_abilita FROM srd35_class_skill WHERE fk_classe=".$_GET[id];
$result=mysql_query($query);
$classSkills=array();
while($row=mysql_fetch_row($result)){
	$classSkills[]=$row[0];
}

$BODY.='<div><br><em style="color:#999;">NOTA: Le abilità indicate con <sup><em>psi</em></sup> sono psioniche.</span></em><br><br></div>';

$query="
	SELECT skillgroup_id AS id,skillgroup_name_".$_MEPHIT[lang]." AS nome
	FROM srd35_skillgroup
";
$result=mysql_query($query);
$groupSkills=array();
$groupSkills[0]=null;
while($row=mysql_fetch_assoc($result)){
	$groupSkills[$row[id]]=$row[nome];
}
$query="
	SELECT t1.id,t1.name_".$_MEPHIT[lang]." AS nome,t1.subtype_".$_MEPHIT[lang]." AS sottotipo,t1.psionic,t1.fk_skillgroup,t2.short_".$_MEPHIT[lang]." AS caratteristica
	FROM srd35_skill AS t1
	JOIN srd35_ability AS t2 ON t1.fk_ability=t2.id
	ORDER BY nome,sottotipo
";
$result=mysql_query($query);
$theLIs=array();
while($row=mysql_fetch_assoc($result)){
	$LI='';
	$LI.='<li'.($row[psionic]?' class="psionic"':'').'>';
		$LI.='<label>';
			$LI.='<input type="checkbox" name="skills[]" value="'.$row[id].'"'.(in_array($row[id],$classSkills)?' checked':'').'>';
			$LI.=' ';
			$LI.='<span>';
				if(!is_null($row[sottotipo])){
					$LI.=$row[sottotipo];
				}else{
					$LI.=$row[nome];
				}
				if($row[psionic])$LI.=' <sup><em>psi</em></sup>';
			$LI.=' ';
			$LI.='('.$row[caratteristica].')';
			$LI.='</span>';
		$LI.='</label>';
	$LI.='</li>';
	$g=is_null($row[fk_skillgroup])?0:$row[fk_skillgroup];
	$theLIs[$g][]=$LI;
}

$BODY.='<div id="theSkills">';
foreach($groupSkills as $gid=>$group){
	if(count($theLIs[$gid])){
		if($gid!=0)$BODY.='<h3>'.'<input type="checkbox" onchange="toggleCheckboxes(this)" id="toggler-'.$gid.'"> '.$group.'</h3>';
		$BODY.='<div class="columns">';
			$BODY.='<ul id="list-'.$gid.'">';
			foreach($theLIs[$gid] as $li){
				$BODY.=$li;
			}
			$BODY.='</ul>';
		$BODY.='</div>';
		$BODY.='<script>togglerInit('.$gid.')</script>';
	}
}
$BODY.='</div>';
?>